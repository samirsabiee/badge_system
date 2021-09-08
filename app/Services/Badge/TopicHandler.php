<?php


namespace App\Services\Badge;


use App\Models\Badge;
use App\Models\UserStat;

class TopicHandler extends AbstractHandler
{
    public function handle(UserStat $userStat)
    {
        if ($userStat->isDirty('topic_count')) $this->applyBadge($userStat);
        return parent::handle($userStat);
    }

    function getAvailableBadge(UserStat $userStat)
    {
        return Badge::topic()->where('required_number', '<=', $userStat->topic_count)->get();
    }
}
