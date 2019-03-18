<?php

namespace App\Repositories\Contracts;

interface PermissionInterface
{
    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @return Permission
     */
    public function findByName($name);
}
