<?php

namespace App\Infrastructure\Slim\Controller\Front;

use App\Application\ApplicationInterface;
use App\Application\Slim\Factory\LoggerFactory;
use App\Infrastructure\Support\Config;
use Exception;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;

class IndexController
{
    private LoggerInterface $logger;


    public function __construct(private readonly ApplicationInterface $application) {

        $this->logger = $application->getLogger()->addFileHandler('home_frondend_action.log')->createLogger();
    }

    /**
     * @throws Exception
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
   {

       try {
           //todo add post validation logic and proper messaging
           // Log success
           $this->logger->info(sprintf('UserEntity created: %s', 123));
           $flash = $this->application->getSession()->getFlash();
           $this->application->getFlash()->addMessage('success', 'Hi there!');
           $viewData = [
               'name' => 'World',
               'notifications' => [
                   'message' => 'You are good!'
               ],
           ];

           $messages = $this->application->getFlash()->getMessages();

           //print_r($messages);

           return $this->application->getTwig()->render($response, 'frontend\index\index.twig', $viewData);

       } catch (Exception $exception) {
           // Log error message
           $this->logger->error($exception->getMessage());

           throw $exception;
       }
   }
}