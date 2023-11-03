<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'title',
        'parent_id',
        'user_id'
    ];
}
