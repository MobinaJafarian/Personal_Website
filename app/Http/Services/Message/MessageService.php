<?php

namespace App\Http\Services\Message;

use App\Http\Interfaces\MessageInterface;

class MessageService
{
    private $message;

    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    public function send(){
        return $this->message->fire();
    }
}
