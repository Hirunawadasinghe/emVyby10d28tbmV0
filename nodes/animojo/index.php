<?php
function GET_URL($k = null)
{
    $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: 'intro';
    $segments = explode('/', $url);
    return is_numeric($k) ? ($segments[$k] ?? null) : $segments;
}

// route to PHP files
$file = GET_URL(0) . '.php';
if (file_exists($file)) {
    require $file;
} else {
    http_response_code(404);
    require 'error.php';
}