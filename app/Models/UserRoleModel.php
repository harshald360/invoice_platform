<?php

namespace App\Models;
use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_role', 'is_active', 'created_at'];
}
