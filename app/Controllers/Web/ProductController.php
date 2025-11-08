
<?php
namespace App\Controllers\Web;

use App\Controllers\BaseController;
use Config\Services;

final class ProductController extends BaseController
{
    public function detail(string $slug)
    {
        $product = Services::productRepository()->findBySlug($slug);
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('web/product_detail', ['product' => $product]);
    }
}
