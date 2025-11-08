
<?php
namespace App\Controllers\Api\v1;

use App\Controllers\BaseController;
use Config\Services;

final class CartApi extends BaseController
{
    public function add()
    {
        $userId = (int) (session('user_id') ?? 1);
        $productId = (int) $this->request->getPost('product_id');
        $qty = max(1, (int) $this->request->getPost('qty'));
        Services::cartService()->addItem($userId, $productId, $qty);
        return $this->response->setJSON(['success' => true]);
    }
}
