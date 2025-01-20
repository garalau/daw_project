<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'replies_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ForumReply::class, 'question_id')->whereNull('parent_id')->with('nestedReplies');
    }

    public function repliesIncludingNested()
    {
        return $this->hasMany(ForumReply::class, 'question_id');
    }

    public function countReplies()
    {
        return $this->repliesIncludingNested()->count();
    }

}
