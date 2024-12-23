<?php

use Ratchet\App;
use App\WebSocket\ChatServer;

require __DIR__ . '/vendor/autoload.php';

$app = new App('localhost', 8081, '0.0.0.0'); // Ganti 8080 menjadi 8081
$app->route('/chat', new ChatServer, ['*']);
$app->run();
