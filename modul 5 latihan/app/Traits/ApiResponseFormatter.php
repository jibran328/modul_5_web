<?php

namespace app\Traits;

// untuk foprmating response
trait ApiResponseFormatter {
    public function apiresponse($code = 200, $message = "succsess", $data = [])
    {
        // dari parameter akan di format menjadi seperti di bawah
        return json_encode ([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}