<?php
namespace Kemer\UPnP\Eventing\Subscribe;

abstract class AbstractSubscribeRequest
{
    /**
     * Domain name or IP address and optional port components of eventing URL
     * (eventSubURL sub element in service element in device description).
     * If the port is missing or empty, port 80 is assumed.
     *
     * @var string
     */
    protected $host;

    /**
     * Requested duration until subscription expires, either number of seconds or infinite
     *
     * @var string
     */
    protected $timeout;

    /**
     * Domain name or IP address and optional port components of eventing URL
     * (eventSubURL sub element in service element in device description).
     * If the port is missing or empty, port 80 is assumed.
     *
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Returns host and optional port components of eventing URL
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Requested duration until subscription expires, either number of seconds or infinite
     *
     * @param string $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Returns timeout
     *
     * @return string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }
}
