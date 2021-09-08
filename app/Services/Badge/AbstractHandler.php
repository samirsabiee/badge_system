<?php


namespace App\Services\Badge;


use App\Models\UserStat;

class AbstractHandler implements Handler
{
    private $handler;

    public function setNext(Handler $handler): Handler
    {
        $this->handler = $handler;
        return $handler;
    }

    public function handle(UserStat $userStat)
    {
        if ($this->handler) {
            $this->handler->handle($userStat);
        }
        return null;
    }
}
