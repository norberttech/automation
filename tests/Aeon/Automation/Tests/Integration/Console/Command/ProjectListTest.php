<?php

declare(strict_types=1);

namespace Aeon\Automation\Tests\Integration\Console\Command;

use Aeon\Automation\Console\AeonApplication;
use Aeon\Automation\Console\Command\ProjectList;
use Aeon\Automation\Tests\Integration\Console\CommandTestCase;
use Github\Client;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Tester\CommandTester;

final class ProjectListTest extends CommandTestCase
{
    public function test_project_list_without_configuration() : void
    {
        $client = Client::createWithHttpClient($httpClient = $this->httpClient());

        $command = new ProjectList();
        $command->setGithub($client);
        $application = new AeonApplication();
        $application->add($command);

        $commandTester = new CommandTester($application->get(ProjectList::getDefaultName()));

        $commandTester->execute(
            [],
            ['verbosity' => ConsoleOutput::VERBOSITY_VERBOSE]
        );

        $this->assertStringContainsString('Project - List', $commandTester->getDisplay());
        $this->assertSame(0, $commandTester->getStatusCode());
    }
}
