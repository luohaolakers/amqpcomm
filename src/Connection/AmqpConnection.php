<?php

namespace AmqpComm\Connection;

class AmqpConnection
{
    private $conn = NULL;

    private $type = NULL;

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setExchange(string $exchange)
    {
        $this->exchange = $exchange;
        return $this;
    }

    public function setRoutingKey(string $routingKey)
    {
        $this->routingKey = $routingKey;
        return $this;
    }

    public function setQueue(string $queue)
    {
        $this->queue = $queue;
        return $this;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    private function setAMQPChannel()
    {
        return new \AMQPChannel($this->conn);
    }


    private function registerChannel()
    {
        $this->channel = $this->setAMQPChannel();
        return $this;
    }

    private function setAMQPExchange($channel)
    {
        $exchange = new \AMQPExchange($channel);
        $exchange->setName($this->exchange);
        $exchange->setType($this->type);
        //交换机持久化
        $exchange->setFlags(AMQP_DURABLE);
        return $exchange;
    }

    public function registerExchange()
    {
        $this->registerChannel();
        $exchange = $this->setAMQPExchange($this->channel);
        if (!$exchange->declareExchange()) {
            throw new \Exception('exchange declareExchange false', 500);
        }
        return $exchange;
    }

    public function registerQueue()
    {
        $this->registerChannel();
        $queue = new \AMQPQueue($this->channel);
        $queue->setName($this->queue);
        $queue->setFlags(AMQP_DURABLE);
        return $queue;
    }

    public function connection()
    {
        if (!$this->conn) {
            try {
                $this->conn = new \AMQPConnection($this->config);
                $this->conn->connect();
            } catch (\AMQPConnectionException $ex) {
                throw new \Exception('cannot connection rabbitmq', 500);
            }
        }
        return $this;
    }

    public function close()
    {
        if ($this->conn) {
            return $this->conn->disconnect();
        }
        throw new \Exception('not connection unable to close', 500);
    }
}