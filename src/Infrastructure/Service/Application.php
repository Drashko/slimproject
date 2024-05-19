<?php

namespace App\Infrastructure\Service;

use App\Application\ApplicationInterface;
use App\Infrastructure\Slim\Factory\LoggerFactory;
use App\Infrastructure\Support\Config;
use Odan\Session\SessionInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;

class Application implements ApplicationInterface
{
    public function __construct(
        public LoggerFactory $logger,
        private readonly SessionInterface $session,
        private readonly Twig $twig,
        private readonly Messages $flash,
        private readonly Config $config,
    )
    {}

    public function getTwig(): Twig
    {
        return $this->twig;
    }

    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    public function getLogger(): LoggerFactory
    {
        return $this->logger;
    }

    public function getFlash(): Messages
    {
        return $this->flash;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }
}