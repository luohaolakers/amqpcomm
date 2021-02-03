<?php

namespace AmqpComm\Consumer;

abstract class AbConsumer implements ConsumerInterface
{

    /**
     * @var string
     */
    protected $queue = '';

    /**
     * @var string
     */
    protected $prefetchCount = '';

    /**
     * 连接信息
     * @var array
     */
    protected $config = array();

    public function getQueue()
    {
        return $this->queue;
    }

    public function setQueue(string $queue)
    {
        $this->queue = $queue;
    }

    public function getChannelPrefetchCount()
    {
        return $this->prefetchCount;
    }

    public function setChannelPrefetchCount(string $prefetchCount)
    {
        $this->prefetchCount = $prefetchCount;
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