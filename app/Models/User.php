<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function userStat(): HasOne
    {
        return $this->hasOne(UserStat::class);
    }

    public function incrementXp(int $number)
    {
        $this->userStat->xp += $number;
        $this->userStat->save();
    }

    public function incrementTopicCount()
    {
        $this->userStat->topic_count++;
        $this->userStat->save();
    }

    public function incrementReplyCount()
    {
        $this->userStat->reply_count++;
        $this->userStat->save();
    }
}
