<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraffic extends Model
{
    use HasFactory;
    protected $table = 'user_traffics';
    protected $fillable = [
        'spam_link',
        'target_link',
        'click_count'
    ];
}
