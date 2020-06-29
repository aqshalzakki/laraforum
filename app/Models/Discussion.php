<?php

namespace App\Models;

use App\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'body'
    ];

    public function getSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->orderBy('created_at', 'desc');
    }

    public function getByIdAndAuthenticatedUser(int $id): Discussion
    {
        return $this->where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
    }
}
