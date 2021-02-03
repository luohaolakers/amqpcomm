<?php

namespace AmqpComm\Producer;

interface MsgInterface
{
    public function setType(string $type);

    public function getType();

    public function setExchange(string $exchange);

    public function getExchange();

    public function setRoutingKey(string $routingKey);

    public function getRoutingKey();

    public function setConfig(array $config);

    public function getConfig();

}
