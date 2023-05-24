<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserRole;

class UserRole extends Model
{
    protected $table = 'user_roles';

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }
   

    public function getUsersByRole($userRoleId)
    {
        $userRole = UserRole::find($userRoleId);
        $users = $userRole->users;

        // Perform any additional operations or return the users to the view
    }


}
