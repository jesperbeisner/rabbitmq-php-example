<?php

declare(strict_types=1);

use Jesperbeisner\Consumer\FileWriter;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require __DIR__ . '/vendor/autoload.php';

// Small workaround until rabbitmq is started. This is only for testing anyway 😅
sleep(5);

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('booking', false, false, false, false);

$channel->basic_consume('booking', '', false, false, false, false, function (AMQPMessage $amqpMessage) {
    (new FileWriter())->write($amqpMessage);

    $amqpMessage->ack();
});

while ($channel->is_open()) {
    $channel->wait();
}
