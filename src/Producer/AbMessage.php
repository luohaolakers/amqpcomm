<?php

namespace AmqpComm\Producer;

use AmqpComm\AttrConf\ExType;

abstract class AbMessage implements MsgInterface
{
    /**
     * @var string
     */
    protected $exchange = '';

    /**
     * @var string
     */
    protected $routingKey = '';

    /**
     * 连接信息
     * @var array
     */
    protected $config = array();

    /**
     * @var string
     */
    protected $type = ExType::DIRECT;


    public function setExchange(string $exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function getExchange()
    {
        return $this->exchange;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setRoutingKey(string $routingKey)
    {
        $this->routingKey = $routingKey;
        return $this;
    }

    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

}