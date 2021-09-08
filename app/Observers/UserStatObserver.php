<?php

namespace App\Observers;

use App\Models\UserStat;
use App\Services\Badge\BadgeApplier;
use Exception;

class UserStatObserver
{
    /**
     * Handle the UserStat "updated" event.
     *
     * @param UserStat $userStat
     * @return void
     * @throws Exception
     */
    public function updated(UserStat $userStat)
    {
        resolve(BadgeApplier::class)->apply($userStat);
    }
}
