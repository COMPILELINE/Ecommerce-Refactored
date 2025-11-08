
<?php
namespace App\Controllers\Web;

use App\Controllers\BaseController;
use Config\Services;

final class CheckoutController extends BaseController
{
    public function index()
    {
        $userId = (int) (session('user_id') ?? 1);
        if ($this->request->getMethod() === 'post') {
            $result = Services::checkoutService()->placeOrder($userId);
            if ($result['success']) {
                return redirect()->to('/')->with('message', 'Order #' . $result['order_id'] . ' placed!');
            }
            return redirect()->back()->with('error', $result['message']);
        }
        $cart = Services::cartService()->getCart($userId);
        return view('web/checkout', ['cart' => $cart]);
    }
}
