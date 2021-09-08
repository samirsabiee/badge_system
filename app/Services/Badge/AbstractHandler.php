<?php


namespace App\Services\Badge;


use App\Models\Badge;
use App\Models\UserStat;

abstract class AbstractHandler implements Handler
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

    public function applyBadge(UserStat $userStat)
    {
        $availableBadges = $this->getAvailableBadge($userStat);
        $userBadges = $userStat->user->badges;
        $notReceiveBadges = $availableBadges->diff($userBadges);
        if($notReceiveBadges->isEmpty()) return;
        $userStat->user->badges()->attach($notReceiveBadges);
    }

    abstract function getAvailableBadge(UserStat $userStat);
}
