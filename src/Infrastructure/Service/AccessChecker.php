<?php

namespace App\Infrastructure\Service;

use AccessCheckerInterface;

class AccessChecker implements AccessCheckerInterface
{

    public function __construct()
    {
    }

    public function hasAccess(int $userId, $permissionName): bool
    {
        // TODO: Implement hasAccess() method.
    }
}