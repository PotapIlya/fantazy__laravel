<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function team()
    {
        return $this->hasOne(Teams::class, 'id', 'team_id');
    }
}
