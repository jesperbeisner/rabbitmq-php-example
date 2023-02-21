<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

if ($uri === '/') {
    require __DIR__ . '/../views/index.phtml';
} else {
    require __DIR__ . '/../views/404.phtml';
}

exit(0);
