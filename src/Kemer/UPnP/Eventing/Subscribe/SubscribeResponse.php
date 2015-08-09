<?php
namespace Kemer\UPnP\Eventing\Subscribe;

use Kemer\UPnP\Description\Uuid;

class SubscribeResponse
{
    /**
     * Subscription identifier. Must be the subscription identifier assigned by publisher
     * in response to subscription request. Must be universally unique. Must begin with uuid:.
     *
     * @var Uuid
     */
    protected $sid;

    /**
     * When response was generated. “rfc1123-date” as defined in RFC 2616.
     *
     * @var DateTimeInterface
     */
    protected $date;

    /**
     * Requested duration until subscription expires, either number of seconds or infinite
     *
     * @var string
     */
    protected $timeout;

    /**
     * Concatenation of OS name, OS version, UPnP/1.0, product name, and product version.
     *
     * @var string
     */
    protected $server;

    /**
     * When response was generated. “rfc1123-date” as defined in RFC 2616.
     *
     * @param DateTimeInterface $date
     */
    public function setDate(\DateTimeInterface $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Returns date when response was generated
     *
     * @return string
     */
    public function getDate()
    {
        if (!$this->date) {
            $this->date = new \DateTime();
        }
        return $this->date->format(\DateTime::RFC1123);
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

    /**
     * Concatenation of OS name, OS version, UPnP/1.0, product name, and product version.
     * Specified by UPnP vendor. String. Must accurately reflect the version number of
     * the UPnP Device Architecture supported by the device. Control points must be prepared
     * to accept a higher version number than the control point itself implements.
     * For example, control points implementing UDA version 1.0 will be able to interoperate
     * with devices implementing UDA version 1.1.
     *
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
        return $this;
    }

    /**
     * Returns concatenation of OS name, OS version, UPnP/1.0, product name, and product version.
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }
}
