<?php
namespace Kemer\UPnP\Eventing;

use Zend\Http\RequestInterface;
use Zend\Http\Request;
use Zend\Uri\Http as HttpUri;
use Kemer\UPnP\Description\Uuid;
use Rhumsaa\Uuid\Uuid as RhumsaaUuid;
use Kemer\UPnP\Eventing\Subscribe;
use Kemer\UPnP\Eventing\Unsubscribe;
use Kemer\UPnP\Eventing\Subscribe\SubscribeResponse;

class Eventing
{
    /**
     * Create upnp:event request
     *
     * @param string|RequestInterface $request
     * @return void
     */
    public function subscribe(Subscribe\SubscribeRequest $request)
    {
        $duration = $request->getTimeout();
        $response = new SubscribeResponse();
        $response->setDate(new \DateTime())
            ->setTimeout($duration)
            ->setSid(new Uuid(RhumsaaUuid::uuid4()->toString()))
            ->setServer("OS/version UPnP/1.0 product/version");
        return $response;
    }

    /**
     * Create subscribe request
     *
     * @param ReSubscribeRequest $request
     * @return Subscribe\AbstractSubscribeRequest
     */
    public function reSubscribe(Subscribe\ReSubscribeRequest $request)
    {
        $duration = $request->getTimeout();
        $response = new SubscribeResponse();
        $response->setDate(new \DateTime())
            ->setTimeout($duration)
            ->setSid($request->getSid())
            ->setServer("OS/version UPnP/1.0 product/version");
        return $response;
    }

    /**
     * Create unsubscribe request
     *
     * @param UnsubscribeRequest $request
     * @return Unsubscribe\UnsubscribeRequest
     */
    public function unsubscribe(Unsubscribe\UnsubscribeRequest $request)
    {
        return new Unsubscribe\UnsubscribeResponse();
    }
}
