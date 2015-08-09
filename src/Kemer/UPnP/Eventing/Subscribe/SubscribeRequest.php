<?php
namespace Kemer\UPnP\Eventing\Subscribe;

use Zend\Uri\Http as HttpUri;

class SubscribeRequest extends AbstractSubscribeRequest
{
    /**
     * Location to send event messages to.
     *
     * @var integer
     */
    protected $callback;

    /**
     * Notification Type. Must be upnp:event.
     *
     * @var string
     */
    protected $nt = 'upnp:event';

    /**
     * SubscribeRequest constructor
     *
     * @param Zend\Uri\Http $callback
     */
    public function __construct(HttpUri $callback)
    {
        $this->setCallback($callback);
    }

    /**
     * Location to send event messages to.
     *
     * @param Zend\Uri\Http $callback
     */
    public function setCallback(HttpUri $callback)
    {
        $this->callback = $callback;
        return $this;
    }

    /**
     * Returns location to send event messages to.
     *
     * @return Zend\Uri\Http
     */
    public function getCallback()
    {
        return $this->callback;
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
}
