
<?php
namespace App\Domain\Catalog\Entities;

final class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public string $slug,
        public int $priceCents,
        public int $stock,
        public ?string $image = null,
    ){}
}
