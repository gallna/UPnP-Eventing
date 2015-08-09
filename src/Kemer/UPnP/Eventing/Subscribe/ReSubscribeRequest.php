<?php
namespace Kemer\UPnP\Eventing\Subscribe;

use Kemer\UPnP\Description\Uuid;

class ReSubscribeRequest extends AbstractSubscribeRequest
{
    /**
     * Subscription identifier. Must be the subscription identifier assigned by publisher
     * in response to subscription request. Must be universally unique. Must begin with uuid:.
     *
     * @var Uuid
     */
    protected $sid;

    /**
     * ReSubscribeRequest constructor
     *
     * @param Uuid $sid
     */
    public function __construct(Uuid $sid)
    {
        $this->setSid($sid);
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
