<?php
declare(strict_types=1);

namespace App\Application;

interface AccessCheckerInterface
{
   public function hasAccess(int $userId, $permissionName): bool;
}