<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Confirmation;
use App\Models\User;

class NotificationOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $confirmation;
    public $user;
    public $channelId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Confirmation $confirmation, User $user, $channelId)
    {
        $this->confirmation = $confirmation;
        $this->user = $user;
        $this->channelId = $channelId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification-' . $this->channelId);
    }
}
