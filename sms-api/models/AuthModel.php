<?php

require_once __DIR__ . '/../config/db.php';

class AuthModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findUserByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT id, role, email, password_hash, class_id
             FROM users
             WHERE email = :email
             LIMIT 1"
        );

        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        return $user ?: null;
    }
}
