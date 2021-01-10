<?php

declare(strict_types=1);

namespace Aeon\Automation;

use Aeon\Automation\Changes\ChangesDetector;
use Aeon\Automation\Changes\Detector\ConventionalCommitDetector;
use Aeon\Automation\Changes\Detector\DefaultDetector;
use Aeon\Automation\Changes\Detector\HTMLChangesDetector;
use Aeon\Automation\Changes\Detector\PrefixDetector;
use Aeon\Automation\Changes\Detector\PrioritizedDetector;

final class Configuration
{
    private string $rootDir;

    private array $defaultPaths;

    private ?string $path;

    private ?\DOMDocument $config;

    public function __construct(string $rootDir, array $defaultPaths, ?string $path = null)
    {
        $this->rootDir = $rootDir;
        $this->defaultPaths = $defaultPaths;
        $this->path = $path;
        $this->config = null;
    }

    public function rootDir() : string
    {
        return $this->rootDir;
    }

    public function project() : ?Project
    {
        if (\count($this->config()->getElementsByTagName('project'))) {
            return new Project($this->config()->getElementsByTagName('project')->item(0)->attributes->getNamedItem('name')->nodeValue);
        }

        return null;
    }

    public function changesDetector() : ChangesDetector
    {
        return new PrioritizedDetector(
            new HTMLChangesDetector(),
            new ConventionalCommitDetector(),
            new PrefixDetector(),
            new DefaultDetector()
        );
    }

    private function config() : \DOMDocument
    {
        if ($this->config !== null) {
            return $this->config;
        }

        $configFilePath = $this->path;

        if ($configFilePath === null) {
            foreach ($this->defaultPaths as $defaultPath) {
                $automationConfiguration = \realpath($defaultPath . '/automation.xml');

                if ($automationConfiguration !== false && \file_exists($automationConfiguration)) {
                    $configFilePath = $automationConfiguration;

                    break;
                }
            }
        }

        if ($configFilePath === null || !\file_exists($configFilePath)) {
            $this->config = new \DOMDocument();

            return $this->config;
        }

        $this->config = new \DOMDocument();
        $this->config->loadXML(\file_get_contents($configFilePath));

        return $this->config;
    }
}
