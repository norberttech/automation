<?php

declare(strict_types=1);

namespace Aeon\Automation\Tests\Integration\Console;

use Aeon\Automation\Tests\Http\HttpRequestStub;
use Aeon\Automation\Tests\Mother\ResponseMother;
use Coduo\PHPMatcher\PHPMatcher;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

abstract class CommandTestCase extends TestCase
{
    /**
     * @return ClientInterface
     */
    public function httpClient(HttpRequestStub ...$stubs) : MockObject
    {
        $httpClient = $this->createMock(ClientInterface::class);

        $httpClient
            ->expects($this->exactly(\count($stubs)))
            ->method('sendRequest')
            ->will(
                $this->returnCallback(function (Request $request) use ($stubs) : Response {
                    foreach ($stubs as $stub) {
                        if ((new PHPMatcher())->match(\strtolower($request->getUri()->getPath()), $stub->pathPattern())
                            && \strtolower($stub->method()) === \strtolower($request->getMethod())
                        ) {
                            return $stub->response();
                        }
                    }

                    return ResponseMother::json404('Invalid Path: ' . $request->getUri()->getPath());
                })
            );

        return $httpClient;
    }
}
