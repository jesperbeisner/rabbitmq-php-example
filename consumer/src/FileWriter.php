<?php

declare(strict_types=1);

namespace Jesperbeisner\Consumer;

use PhpAmqpLib\Message\AMQPMessage;
use RuntimeException;

final class FileWriter
{
    public function write(AMQPMessage $amqpMessage): void
    {
        if (false === $file = fopen(__DIR__ . '/../var/messages.csv', 'a')) {
            throw new RuntimeException('Could not open file');
        }

        if (false === flock($file, LOCK_EX)) {
            throw new RuntimeException('Could not lock file');
        }

        if (false === fputcsv($file, json_decode($amqpMessage->body, true, 512, JSON_THROW_ON_ERROR))) {
            throw new RuntimeException('Could not write to file');
        }

        if (false === fclose($file)) {
            throw new RuntimeException('Could not close file');
        }
    }
}
