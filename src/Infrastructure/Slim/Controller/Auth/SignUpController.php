<?php

namespace App\Infrastructure\Slim\Controller\Auth;

use App\Application\Factory\LoggerFactory;
use App\Infrastructure\ORM\EntityManagerAdapterServiceInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;

class SignUpController
{
    private LoggerInterface $logger;

    /**
     * @param LoggerFactory $logger
     * @param Twig $twig
     * @param Messages $flash
     * @param EntityManagerAdapterServiceInterface $entityManager
     */
    public function __construct(
        LoggerFactory $logger,
        private readonly Twig $twig,
        private readonly Messages $flash,
        private readonly EntityManagerAdapterServiceInterface $entityManager
    ) {

        $this->logger = $logger->addFileHandler('home_action.log')->createLogger();
    }

    /**
     * @throws Exception
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ?ResponseInterface
    {

        try {

            dump($request->getParsedBody());

            //todo get user from data
            //todo validate the data
            //show messages on error
            //
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

//            $user = new UserEntity();
//            $user->setName('test2');
//            $user->setEmail('test2@gmail.com');
//            $user->setCreatedAt(new \DateTime('now'));
//            $this->entityManager->sync($user);

            return $this->twig->render($response, 'authentication\signup.twig', $viewData);



        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            //throw $exception;
        }
    }
}