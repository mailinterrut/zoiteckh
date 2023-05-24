<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add any other columns you want to fill
    ];

    // Relationships

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Other methods or scopes

    // ...
}

