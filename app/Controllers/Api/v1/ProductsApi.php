
<?php
namespace App\Controllers\Api\v1;

use App\Controllers\BaseController;
use Config\Services;

final class ProductsApi extends BaseController
{
    public function list()
    {
        return $this->response->setJSON(Services::productRepository()->latest(20));
    }
}
