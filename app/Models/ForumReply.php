<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'question_id', 'parent_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(ForumQuestion::class, 'question_id');
    }

    public function nestedReplies()
    {
        return $this->hasMany(ForumReply::class, 'parent_id')->with('nestedReplies');
    }

    public function parent()
    {
        return $this->belongsTo(ForumReply::class, 'parent_id');
    }

}
