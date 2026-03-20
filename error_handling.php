<?php

function handleError($e) {

    if ($_ENV['APP_DEBUG'] === 'true') {
        return [
            "success" => false,
            "error" => $e->getMessage()
        ];
    }

    return [
        "success" => false,
        "message" => "Something went wrong"
    ];
}
