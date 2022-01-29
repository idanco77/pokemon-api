<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Pokemon extends Model
{
    protected $table = 'pokemon';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }
}
