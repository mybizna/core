<?php

namespace Modules\Core\Events;

use Illuminate\Queue\SerializesModels;

class SendLengthy
{

    use SerializesModels;

    public $title;
    
    public $message;

    public $contact;

    public $attachments;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($title, $message, $contact, $attachments = [])
    {
        $this->title = $title;
        $this->message = $message;
        $this->contact = $contact;
        $this->attachments = $attachments;
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
