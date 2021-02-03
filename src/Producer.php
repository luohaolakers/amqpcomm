<?php

namespace AmqpComm;

use  AmqpComm\Producer\AbMessage;
use  AmqpComm\Connection\AmqpConnection;

class Producer extends AbMessage
{
    public function sendData($msg)
    {
        $exchange = $this->open();
        if (is_array($msg) || is_object($msg)) {
            $msg = json_encode($msg);
        } else {
            $msg = trim(strval($msg));
        }
        return $exchange->publish($msg, $this->routingKey);
    }

    private function open()
    {
        $conn = new AmqpConnection();
        $conn = $conn->setConfig($this->config)->setType($this->type)->setExchange($this->exchange)->setRoutingKey($this->routingKey)->connection();
        return $conn->registerExchange();
    }
}