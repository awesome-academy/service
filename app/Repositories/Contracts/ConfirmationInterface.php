<?php

namespace App\Repositories\Contracts;

interface ConfirmationInterface
{
    /**
     * create confirm and up date status location
     *
     * @param array $input
     * @param int $statusId
     */
    public function createConfirm($input, $statusId);

    /**
     * update new value status_id in location of old confirmation and new value status_id in location of modify confirmation
     *
     * @param int $id
     * @param array $input
     * @param int $statusId
     */
    public function updateConfirm($id, $input, $statusId);

    /**
     * restore status location before delete confirmation
     *
     * @param collection $confirmation
     * @return void
     */
    public function restoreStatusLocation($confirmation);
}
