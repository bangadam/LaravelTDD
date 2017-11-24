<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
