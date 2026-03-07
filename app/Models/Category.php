<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $slug
 * @property int $parent_id
 * @property int $sort
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'sort'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
}
