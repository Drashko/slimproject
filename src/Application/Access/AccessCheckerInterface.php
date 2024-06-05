<?php
declare(strict_types=1);

namespace App\Application\Access;

interface AccessCheckerInterface
{
   public function hasAccess(int $userId, $permissionName): bool;
}