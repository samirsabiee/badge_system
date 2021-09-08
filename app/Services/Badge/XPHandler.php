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

    function getAvailableBadge(UserStat $userStat)
    {
        return Badge::xp()->where('required_number', '<=', $userStat->xp)->get();
    }
}
