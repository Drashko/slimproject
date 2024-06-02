<?php

namespace App\Infrastructure\Slim\Controller\Auth;

use App\Application\Factory\LoggerFactory;
use App\Infrastructure\Support\Config;
use Exception;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;

class ForgotPasswordController
{
    private LoggerInterface $logger;

    /**
     * @param Config $config
     * @param LoggerFactory $logger
     * @param SessionInterface $session
     * @param SessionManagerInterface $sessionManager
     * @param Twig $twig
     */
    public function __construct(private readonly Config $config, LoggerFactory $logger, private readonly SessionInterface $session, private SessionManagerInterface $sessionManager, private readonly Twig $twig, private readonly Messages $flash) {

        $this->logger = $logger->addFileHandler('home_action.log')->createLogger();
    }

    /**
     * @throws Exception
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        try {
            // Log success
            $this->logger->info(sprintf('UserEntity created: %s', 123));
            //$flash = $this->session->getFlash();
            $this->flash->addMessage('success', 'Hi there!');
            $viewData = [
                'name' => 'World',
                'notifications' => [
                    'message' => 'You are good!'
                ],
            ];

            $messages = $this->flash->getMessages();

            //print_r($messages);

            return $this->twig->render($response, 'authentication\forgot_password.twig', $viewData);

        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            throw $exception;
        }
    }
}