<?php

namespace App\Repositories;

use App\Models\Confirmation;
use App\Repositories\Contracts\ConfirmationInterface;

class ConfirmationRepository extends BaseRepository implements ConfirmationInterface
{
    public function __construct(Confirmation $confirmation)
    {
        parent::__construct($confirmation);
    }

    public function createConfirm($input, $statusId)
    {
        $confirmation = $this->model->create($input);
        $confirmation->location->status_id = $statusId;
        $confirmation->location->save();

        return $confirmation;
    }

    public function updateConfirm($id, $input, $statusId)
    {
        $confirmation = $this->model->findOrFail($id);
        $confirmation->update($input);
        $confirmation->location->status_id = $statusId;
        $confirmation->location->save();
    }
}
