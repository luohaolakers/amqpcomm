<?php

namespace AmqpComm\Consumer;

interface ConsumerInterface
{
    public function setQueue(string $queue);

    public function getQueue();

    public function setChannelPrefetchCount(string $prefetchCount);

    public function getChannelPrefetchCount();

    public function setConfig(array $config);

    public function getConfig();
}


