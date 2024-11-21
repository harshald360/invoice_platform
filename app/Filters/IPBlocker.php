<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IPBlocker implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $ipAddress = $request->getIPAddress();
        $loginAttemptModel = new \App\Models\LoginAttemptModel();

        $attempt = $loginAttemptModel->where('ip_address', $ipAddress)->first();
        if ($attempt && $attempt['is_blocked'] && strtotime($attempt['blocked_until']) > time()) {
            return redirect()->to('/access-denied');
        }
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed after the response is sent
    }
}
