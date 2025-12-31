<?php

require_once __DIR__ . '/../models/AuthModel.php';
require_once __DIR__ . '/../helpers/JsonHelpers.php';

use helpers\JsonHelpers;

class AuthController
{
    private AuthModel $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($data = null): void
    {
        $body = JsonHelpers::getBody(is_array($data) ? $data : null);

        $email = isset($body['email']) ? trim((string)$body['email']) : '';
        $password = isset($body['password']) ? (string)$body['password'] : '';

        if ($email === '' || $password === '') {
            JsonHelpers::json(422, [
                'success' => false,
                'message' => 'Email and password are required.'
            ]);
        }

        $user = $this->authModel->findUserByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            JsonHelpers::json(401, [
                'success' => false,
                'message' => 'Invalid credentials.'
            ]);
        }

        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id' => (int)$user['id'],
            'role' => $user['role'],
            'email' => $user['email'],
            'class_id' => $user['class_id'] !== null ? (int)$user['class_id'] : null
        ];

        JsonHelpers::json(200, [
            'success' => true,
            'message' => 'Login successful.',
            'user' => $_SESSION['user']
        ]);
    }

    public function logout(): void
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        JsonHelpers::json(200, [
            'success' => true,
            'message' => 'Logged out.'
        ]);
    }

    public function me(): void
    {
        if (!isset($_SESSION['user'])) {
            JsonHelpers::json(401, [
                'success' => false,
                'message' => 'Not authenticated.'
            ]);
        }

        JsonHelpers::json(200, [
            'success' => true,
            'user' => $_SESSION['user']
        ]);
    }
}
