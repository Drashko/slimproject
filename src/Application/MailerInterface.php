<?php
declare(strict_types=1);

namespace App\Application;

interface MailerInterface
{
    public function send(\EmailInterface $email): void;
}