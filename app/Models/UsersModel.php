<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_role', 'user_name', 'user_email', 'user_mobile', 'user_password', 'created_at', 'is_active'];
}
