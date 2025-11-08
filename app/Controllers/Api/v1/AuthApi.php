
<?php
namespace App\Controllers\Api\v1;

use App\Controllers\BaseController;
use Config\Services;

final class AuthApi extends BaseController
{
    public function login()
    {
        $email = (string) $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');
        $ok = Services::authService()->login($email, $password);
        return $this->response->setJSON(['success' => $ok]);
    }
}
