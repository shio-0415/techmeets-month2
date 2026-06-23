<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // hasManyThrough の例: Project → Task → Comment
    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Task::class);
    }
}
