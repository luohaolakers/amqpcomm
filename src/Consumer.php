<?php

namespace AmqpComm;

use  AmqpComm\Consumer\AbConsumer;
use  AmqpComm\Connection\AmqpConnection;

class Consumer extends AbConsumer
{
    public function run($funName, $autoack = true)
    {
        if (!$funName || !$this->queue) return false;
        $conn = new AmqpConnection();
        $conn = $conn->setConfig($this->config)->connection()->setQueue($this->queue);
        $queue = $conn->registerQueue();
        while (true) {
            if ($autoack) $queue->consume($funName, AMQP_AUTOACK);
            else $queue->consume($funName);
        }
    }
}