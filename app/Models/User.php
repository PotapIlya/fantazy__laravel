<?php

namespace App\Models;

use App\Models\League\League;
use App\Models\Player\Players;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];






    public function players()
    {
        return $this->belongsToMany(Players::class,
            'user_players',
            'user_id',
            'player_id')->withPivot('player_id');
    }

    public function league()
    {
        return $this->hasMany(League::class, 'user_id', 'id');
    }








}
