<?php


namespace App\Services\Badge;


use App\Models\Badge;
use App\Models\UserStat;

class XPHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('xp')) $this->applyBadge($userStat);
        return parent::handle($userStat);
    }

    private function applyBadge(UserStat $userStat)
    {
        $availableBadges = Badge::xp()->where('required_number', '<=', $userStat->xp)->get();
        $userBadges = $userStat->user->badges;
        $notReceiveBadges = $availableBadges->diff($userBadges);
        $userStat->user->badges()->attach($notReceiveBadges);
    }
}
