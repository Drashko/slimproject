<?php

namespace App\Action\Auth;

use App\Factory\LoggerFactory;
use App\Support\Config;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Monolog\Logger;
use Odan\Session\SessionInterface;
use Odan\Session\SessionManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Flash\Messages;
use Slim\Views\Twig;
use Twig\Loader\LoaderInterface;
use App\Domain\Entity\User;

class SignUpAction
{
    private LoggerInterface $logger;

    /**
     * @param Config $config
     * @param LoggerFactory $logger
     * @param SessionInterface $session
     * @param SessionManagerInterface $sessionManager
     * @param Twig $twig
     * @param Messages $flash
     */
    public function __construct(
        private readonly Config $config,
        LoggerFactory $logger,
        private readonly SessionInterface $session,
        private SessionManagerInterface $sessionManager,
        private readonly Twig $twig,
        private readonly Messages $flash,
        private readonly EntityManager $entityManager
    ) {

        $this->logger = $logger->addFileHandler('home_action.log')->createLogger();
    }

    /**
     * @throws Exception
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        try {
            // Log success
            $this->logger->info(sprintf('User created: %s', 123));
            //$flash = $this->session->getFlash();
            $this->flash->addMessage('success', 'Hi there!');

            $viewData = [
                'name' => 'World',
                'notifications' => [
                    'message' => 'You are good!'
                ],
            ];

            $messages = $this->flash->getMessages();

            $user = new User();
            $user->setName('test2');
            $user->setEmail('test2@gmail.com');
            $user->setCreatedAt(new \DateTime('now'));
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->twig->render($response, 'authentication\signup.twig', $viewData);

        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            throw $exception;
        }
    }
}