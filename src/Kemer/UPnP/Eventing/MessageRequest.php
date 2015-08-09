<?php
namespace Kemer\UPnP\Eventing;

class MessageRequest
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
     * Event key. Must be 0 for initial event message. Must be incremented by 1
     * for each event message sent to a particular subscriber. To prevent overflow,
     * must be wrapped from 4294967295to 1. 32-bit unsigned value represented as
     * a single decimal integer without leading zeroes (some implementations may
     * include leading zeroes, which should be ignored by the recipient)
     *
     * @var integer
     */
    protected $seq;

    /**
     * Notification Type. Must be upnp:event.
     *
     * @var string
     */
    protected $nt = 'upnp:event';

    /**
     * Notification Sub Type. Must be upnp:propchange.
     *
     * @var string
     */
    protected $nts = 'upnp:propchange';

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

    /**
     * Field value contains Event Key
     *
     * @param integer $seq
     */
    public function setSeq($seq)
    {
        $this->seq = (integer)$seq;
        return $this;
    }

    /**
     * Returns Event Key
     *
     * @return integer
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * Notification Type. Single URI.
     *
     * @param string $st
     */
    public function setNt($nt)
    {
        $this->nt = $nt;
        return $this;
    }

    /**
     * Returns Notification Type.
     *
     * @return string
     */
    public function getNt()
    {
        return $this->nt;
    }

    /**
     * Notification Sub Type. Single URI.
     *
     * @param string $st
     */
    public function setNts($nts)
    {
        $this->nts = $nts;
        return $this;
    }

    /**
     * Returns Notification Sub Type.
     *
     * @return string
     */
    public function getNts()
    {
        return $this->nts;
    }
}
