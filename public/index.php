
<?php
// Minimal bootstrap proxy: if vendor exists, defer to CI4 bootstrap; else show message.
$vendor = __DIR__ . '/../vendor/autoload.php';
$bootstrap = __DIR__ . '/../vendor/codeigniter4/framework/system/bootstrap.php';
if (file_exists($vendor) && file_exists($bootstrap)) {
    require $vendor;
    require $bootstrap;
} else {
    http_response_code(503);
    echo "Install dependencies first: <pre>composer install</pre>";
}
