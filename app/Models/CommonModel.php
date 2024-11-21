<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ConfigurationModel;

class CommonModel extends Model
{
    public function prepareToasterData()
    {

        if (!isset($_COOKIE['device_id'])) {
            $deviceId = bin2hex(random_bytes(16));
            setcookie('device_id', $deviceId, 0, '/');
        }
        
        return [
            'toaster' => [
                'code' => session()->getFlashdata('status') ?? '',
                'message' => session()->getFlashdata('message') ?? ''
            ],
            'panel' => 'boards',
            'sub-panel' => '',
        ];
    }
}
