<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'task_id';

    protected $fillable = ['title','description','user_id'];

    protected $hidden = ['created_at','updated_at'];
}
