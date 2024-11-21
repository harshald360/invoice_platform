<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigurationModel extends Model
{
    protected $table = 'inv_configuration';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'max_accetpted_month',
        'min_acceepted_msrp',
        'file_upload_limit',
        'warranty_exp_reminder',
        'smtp_host',
        'smtp_user',
        'smtp_password',
        'email_protocol',
        'smtp_port',
        'smtp_crypto_type',
        'mail_from',
        'mail_to',
        'captcha_site_key',
        'captcha_secrete_key',
        'stripe_publishable_key',
        'stripe_secret_key',
        'sms_key',
        'chat_gpt_key',
        'is_active',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';
}
