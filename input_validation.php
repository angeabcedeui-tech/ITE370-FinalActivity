<?php

function validateInput($data, $fieldName) {
    if (empty($data)) {
        throw new Exception("$fieldName is required");
    }

    if (strlen($data) < 3) {
        throw new Exception("$fieldName must be at least 3 characters");
    }

    return htmlspecialchars(trim($data));
}
