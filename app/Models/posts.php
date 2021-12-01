<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'sign',
        'thumb',
    ];

    protected $attributes = [
        'heartNums' => 0,
        'viewNums' => 0,
        'thumb' => null,
    ];
    /**
     * Get all of the comments for the posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(comments::class, 'id', 'id');
    }

}
