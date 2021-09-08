<?php


namespace App\Services\Badge;


use App\Models\Badge;
use App\Models\UserStat;

class ReplyHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('reply_count')) $this->applyBadge($userStat);
        return parent::handle($userStat);
    }

    function getAvailableBadge(UserStat $userStat)
    {
        return Badge::reply()->where('required_number', '<=', $userStat->reply_count)->get();
    }
}
