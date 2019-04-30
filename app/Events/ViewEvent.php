<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ViewEvent extends Event
{
    use SerializesModels;

    public $articleId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($articleId)
    {
        $this->articleId = $articleId;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
