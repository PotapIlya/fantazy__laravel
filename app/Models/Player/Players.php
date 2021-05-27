<?php

namespace App\Models\Player;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role_id', 'team_id'];

    public function team()
    {
        return $this->hasOne(Teams::class, 'id', 'team_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,
            'user_players',
            'player_id',
            'user_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }


}
