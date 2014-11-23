<?php

use Katzgrau\KLogger\Logger;

use Psr\Log\LogLevel;

class LoggerTest extends PHPUnit_Framework_TestCase
{
    private $logPath;
    private $logger;

    public function setUp()
    {
        $this->logPath = __DIR__.'/logs';
        $this->logger = new Logger($this->logPath);
    }

    public function testImplementsPsr3LoggerInterface()
    {
        $this->assertInstanceOf('Psr\Log\LoggerInterface', $this->logger);
    }

    public function testLogName() {
        $logger = new Logger($this->logPath, LogLevel::DEBUG, 'moose', false);
        $this->assertFileExists($this->logPath . DIRECTORY_SEPARATOR . 'moose.txt');
    }
}
