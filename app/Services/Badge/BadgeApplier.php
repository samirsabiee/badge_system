<?php


namespace App\Services\Badge;


use App\Models\UserStat;
use Exception;

class BadgeApplier
{
    /**
     * @throws Exception
     */
    public function apply(UserStat $userStat)
    {
        $xpHandler = resolve(XPHandler::class);
        $xpHandler->handle($userStat);
    }
}
