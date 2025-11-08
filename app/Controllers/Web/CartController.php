
<?php
namespace App\Controllers\Web;

use App\Controllers\BaseController;
use Config\Services;

final class CartController extends BaseController
{
    public function index()
    {
        $userId = (int) (session('user_id') ?? 1); // demo user
        $cart = Services::cartService()->getCart($userId);
        return view('web/cart', ['cart' => $cart]);
    }

    public function add()
    {
        $userId = (int) (session('user_id') ?? 1);
        $productId = (int) $this->request->getPost('product_id');
        $qty = max(1, (int) $this->request->getPost('qty'));
        Services::cartService()->addItem($userId, $productId, $qty);
        return redirect()->to('/cart');
    }

    public function remove()
    {
        $userId = (int) (session('user_id') ?? 1);
        $itemId = (int) $this->request->getPost('item_id');
        Services::cartService()->removeItem($userId, $itemId);
        return redirect()->to('/cart');
    }
}
