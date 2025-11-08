
<?php
namespace App\Domain\User\Services;

use App\Domain\User\Repositories\UserRepositoryInterface;

final class AuthService
{
    public function __construct(private UserRepositoryInterface $users) {}

    public function login(string $email, string $password): bool
    {
        $user = $this->users->findByEmail($email);
        if (!$user) return false;
        if (password_verify($password, $user->passwordHash)) {
            session()->set(['user_id' => $user->id, 'is_admin' => $user->isAdmin]);
            session()->regenerate(true);
            return true;
        }
        return false;
    }
}
