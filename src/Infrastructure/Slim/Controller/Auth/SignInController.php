<?php

namespace App\Infrastructure\Slim\Controller\Auth;

use App\Application\ApplicationInterface;
use App\Application\Dto\UserDto;
use App\Infrastructure\Slim\Form\UserFormType;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class SignInController
{
    private LoggerInterface $logger;

    public function __construct(
        private readonly ApplicationInterface $application,
    )
    {
        $this->logger = $this->application->getLogger()->addFileHandler('signin_action.log')->createLogger();
    }

    /**
     * @throws Exception
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        try {

            // Log success
           // $this->logger->info(sprintf('UserEntity created: %s', 123));
            //$flash = $this->session->getFlash();
            //$this->application->getFlash()->addMessage('success', 'Hi there!');
            //$userDto = UserDto::create('test', 'test', 'emaol@test.com');

            $userEntity = UserDto::create('test', 'test', 'emaol@test.com');

            $form = $this->application->getFromFactory()->create(UserFormType::class, $userEntity);

            $data = $request->getParsedBody();

            $form->handleRequest($data);

            if ($form->isSubmitted()) {

                $data = $form->getData();
                print_r($data);


            }

            //$messages = $this->application->getFlash()->getMessages();
            //print_r($messages);

            return $this->application->getTwig()->render(
                $response,
                'authentication\signin.twig',
                ['form' => $form->createView()]
        );

        } catch (Exception $exception) {
            // Log error message
            $this->logger->error($exception->getMessage());

            throw $exception;
        }
    }
}