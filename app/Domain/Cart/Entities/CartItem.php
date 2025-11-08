
<?php
namespace App\Domain\Cart\Entities;

final class CartItem
{
    public function __construct(
        public int $id,
        public int $productId,
        public string $name,
        public int $priceCents,
        public int $qty
    ){}
}
