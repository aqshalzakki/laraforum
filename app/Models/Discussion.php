<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded = [];

    public function getSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
