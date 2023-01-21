<?php

namespace App\Http\Services\Message\SMS;

use App\Http\Interfaces\MessageInterface;
use App\Http\Services\Message\SMS\MeliPayamakService;

class SmsService implements MessageInterface{

    private $from;
    private $text;
    private $to;
    private $isFlash = true;



    public function fire()
    {
        $meliPayamak = new MeliPayamakService();
        return $meliPayamak->sendSmsSoapClient($this->from, $this->to, $this->text, $this->isFlash);
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }


  public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }


public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getIsFlash()
    {
        return $this->to;
    }

    public function setIsFlash($flash)
    {
        $this->isFlash = $flash;
    }





}
