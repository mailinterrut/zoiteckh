<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
 

class UserPrivilege extends Model
{
    protected $table = 'user_privileges';

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class, 'privilege_id');
    }
}
