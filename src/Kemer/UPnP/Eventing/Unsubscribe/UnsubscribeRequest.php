<?php
namespace Kemer\UPnP\Eventing\Unsubscribe;

use Kemer\UPnP\Description\Uuid;

class UnsubscribeRequest
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
     * Subscription identifier. Must be the subscription identifier assigned by publisher
     * in response to subscription request. Must be universally unique. Must begin with uuid:.
     *
     * @var Uuid
     */
    protected $sid;

    /**
     * UnsubscribeRequest constructor
     *
     * @param Uuid $sid
     */
    public function __construct(Uuid $sid)
    {
        $this->setSid($sid);
    }

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
     * Subscription identifier. Must be the subscription identifier assigned by publisher
     * in response to subscription request. Must be universally unique.
     *
     * @param Uuid $sid
     */
    public function setSid(Uuid $sid)
    {
        $this->sid = $sid;
        return $this;
    }

    /**
     * Returns Notification Type.
     *
     * @return Uuid
     */
    public function getSid()
    {
        return $this->sid;
    }
}
