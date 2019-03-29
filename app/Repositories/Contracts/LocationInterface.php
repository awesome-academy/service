<?php

namespace App\Repositories\Contracts;

interface LocationInterface
{
    /**
     * get all free locations and grep one location have status booking
     *
     * @param int $statusId
     * @param int $locationId
     * @param string $locationName
     */
    public function freeLocationAndFind($statusId, $locationId, $locationName);
}
