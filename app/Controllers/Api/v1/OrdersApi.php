
<?php
namespace App\Controllers\Api\v1;

use App\Controllers\BaseController;
use Config\Services;

final class OrdersApi extends BaseController
{
    public function create()
    {
        $userId = (int) (session('user_id') ?? 1);
        $result = Services::checkoutService()->placeOrder($userId);
        return $this->response->setJSON($result);
    }
}
