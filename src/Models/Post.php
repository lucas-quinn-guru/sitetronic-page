<?php

namespace LucasQuinnGuru\SitetronicPage\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'content'
    ];
}
