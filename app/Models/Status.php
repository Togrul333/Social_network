<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Status', 'parent_id');
    }

    public function scopeNotComment($query)
    {
        return $query->whereNull('parent_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like','likeable');
    }
}
