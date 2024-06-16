<?php

namespace App\Infrastructure\Slim\Controller\Admin;

use App\Application\ApplicationInterface;
use App\Application\User\UserServiceInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class UserController
{
    private LoggerInterface $logger;

    public function __construct(
        private readonly ApplicationInterface $application,
        private readonly UserServiceInterface $userService,

    )
    {
        $this->logger = $this->application->getLogger()->addFileHandler('home_action.log')->createLogger();
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

            dump($request->getQueryParams());

            $userList = $this->userService->list($request->getQueryParams());

            $messages = $this->application->getFlash()->getMessages();
            echo '<pre>';
            print_r($userList);
            echo '</pre>';

            return $this->application->getTwig()->render($response, 'admin\users\index.twig', $userList);

        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            throw $exception;
        }
    }

    public function create(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        //todo get request data
        //todo validate the data
        //sanitize the data
        //create DTO object
        //pass the DTO to service interface create method


    }
}