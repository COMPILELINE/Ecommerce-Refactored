
<?php
namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\User;
use CodeIgniter\Database\ConnectionInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function __construct(private ConnectionInterface $db) {}

    public function findById(int $id): ?User
    {
        $row = $this->db->table('users')->where('id', $id)->get()->getRowArray();
        return $row ? $this->map($row) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $row = $this->db->table('users')->where('email', $email)->get()->getRowArray();
        return $row ? $this->map($row) : null;
    }

    public function create(User $user): int
    {
        $this->db->table('users')->insert([
            'name' => $user->name,
            'email' => $user->email,
            'password_hash' => $user->passwordHash,
            'is_admin' => $user->isAdmin ? 1 : 0,
        ]);
        return (int)$this->db->insertID();
    }

    private function map(array $r): User
    {
        return new User((int)$r['id'], $r['name'], $r['email'], $r['password_hash'], (bool)$r['is_admin']);
    }
}
