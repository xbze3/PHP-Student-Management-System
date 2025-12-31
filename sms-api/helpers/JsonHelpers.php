<?php

namespace helpers;

class JsonHelpers
{
    public static function json(int $statusCode, array $payload): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload);
        exit;
    }

    public static function getBody(?array $data = null): array
    {
        if (is_array($data) && !empty($data)) return $data;

        $raw = file_get_contents('php://input') ?: '';
        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : [];
    }
}
