<?php

class ApiController
{

    public function healthCheck()
    {
        header('Content-Type: application/json');
        echo json_encode([
            "message" => "API is working!",
            "route"   => "/api",
            "time"    => date("Y-m-d H:i:s")
        ]);
        exit;
    }
}
