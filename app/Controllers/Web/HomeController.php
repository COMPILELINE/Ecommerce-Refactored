
<?php
namespace App\Controllers\Web;

use App\Controllers\BaseController;
use Config\Services;

final class HomeController extends BaseController
{
    public function index()
    {
        $products = Services::productRepository()->latest(12);
        return view('web/home', ['products' => $products]);
    }
}
