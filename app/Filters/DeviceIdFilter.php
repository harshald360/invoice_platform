<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DeviceIdFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the 'device_id' cookie is not set
        $deviceId = bin2hex(random_bytes(16));
        if (!isset($_COOKIE['device_id'])) {
            // Generate a unique device ID
            
            // Set the cookie (expire in 1 hour)
            setcookie('device_id', $deviceId, 0, '/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
