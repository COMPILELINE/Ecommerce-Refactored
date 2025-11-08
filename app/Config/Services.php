
<?php

namespace Config;

use CodeIgniter\Config\BaseService;

class Services extends BaseService
{
    public static function userRepository($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('userRepository');
        return new \App\Domain\User\Repositories\UserRepository(db_connect());
    }

    public static function authService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('authService');
        return new \App\Domain\User\Services\AuthService(static::userRepository(false));
    }

    public static function productRepository($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('productRepository');
        return new \App\Domain\Catalog\Repositories\ProductRepository(db_connect());
    }

    public static function cartRepository($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('cartRepository');
        return new \App\Domain\Cart\Repositories\CartRepository(db_connect());
    }

    public static function cartService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('cartService');
        return new \App\Domain\Cart\Services\CartService(static::productRepository(false), static::cartRepository(false));
    }

    public static function checkoutService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('checkoutService');
        return new \App\Domain\Checkout\Services\CheckoutService(
            db_connect(),
            static::cartRepository(false),
            static::productRepository(false)
        );
    }
}
