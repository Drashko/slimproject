<?php

namespace App\Infrastructure\Slim\Controller\Admin;

use App\Application\ApplicationInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class SettingsController
{
    private LoggerInterface $logger;

    /**
     * @param ApplicationInterface $application
     */
    public function __construct(
        private readonly ApplicationInterface $application
    ) {

        $this->logger = $application->getLogger()->addFileHandler('home_action.log')->createLogger();
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
            $this->application->getFlash()->addMessage('success', 'Hi there!');
            $viewData = [
                'name' => 'World',
                'notifications' => [
                    'message' => 'You are good!'
                ],
            ];

            $messages =$this->application->getFlash()->getMessages();

            //print_r($messages);

            return $this->application->getTwig()->render($response, 'admin\settings\index.twig', $viewData);

        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            throw $exception;
        }
    }
}