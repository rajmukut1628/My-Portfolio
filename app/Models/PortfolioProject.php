<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'image',
        'title',
        'type',
        'description',
        'tech_stack',
        'github_link',
        'live_link',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_active' => 'boolean',
    ];
}