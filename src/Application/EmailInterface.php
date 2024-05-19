<?php
declare(strict_types=1);

namespace App\Application;

interface EmailInterface
{
    public function recipient(): string;

    public function subject(): string;

    public function template(): string;

    /**
     * @return array<string,mixed>
     */
    public function templateVariables(): array;
}