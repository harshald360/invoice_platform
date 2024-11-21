<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'inv_companies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['company_name', 'address', 'company_gstin', 'city', 'state', 'zipcode', 'created_at', 'updated_at', 'is_active'];
}
