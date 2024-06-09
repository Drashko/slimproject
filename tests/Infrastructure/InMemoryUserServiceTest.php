<?php

namespace Infrastructure;

use App\Application\Dto\UserDto;
use App\Application\User\UserServiceInterface;
use App\Infrastructure\Service\UserService;
use Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Tests\TestCase;

class InMemoryUserServiceTest extends TestCase
{

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function testCreateUser()
    {

        $app = $this->getAppInstance();

        $container = $app->getContainer();

        $user = UserDto::create('test@gamil.com', '241235');



        $userService = $container->get(UserServiceInterface::class);

        $newUser = $userService->create($user);

        $this->assertEquals($newUser->getEmail(), $user->getEmail());
    }
}