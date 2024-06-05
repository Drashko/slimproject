<?php
declare(strict_types=1);

namespace App\Application;

use App\Infrastructure\Slim\Factory\LoggerFactory;
use App\Infrastructure\Support\Config;
use Odan\Session\SessionInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Symfony\Component\Form\FormFactoryInterface;

interface ApplicationInterface
{
    public function getTwig() : Twig;

    public function getSession() : SessionInterface;

    public function getLogger() : LoggerFactory;

    public function getFlash() : Messages;

    public function getConfig() : Config;

    public function getFromFactory() : FormFactoryInterface;

    //todo add validation

    //todo add translations

}