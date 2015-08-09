<?php
namespace Kemer\UPnP\Eventing;

use Kemer\UPnP\Description\Uuid;
use Zend\Stdlib\RequestInterface;
use Zend\Http\Request;
use Zend\Uri\Http as HttpUri;

class RequestFactory
{
    /**
     * Create upnp:event request
     *
     * @param string|RequestInterface $request
     * @return void
     */
    public function create($request)
    {
        if (is_string($request)) {
            $request = new Request($request);
        }
        if (!$request instanceof RequestInterface) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Expecting string or instance of Zend\Http\RequestInterface '%s' given",
                    get_class($request)
                )
            );
        }
        switch ($request->getMethod()) {
            case "SUBSCRIBE":
                return $this->createSubscribeRequest($request);
            case "UNSUBSCRIBE":
                return $this->createUnsubscribeRequest($request);
        }
    }

    /**
     * Create subscribe request
     *
     * @param RequestInterface $request
     * @return Subscribe\AbstractSubscribeRequest
     */
    protected function createSubscribeRequest(RequestInterface $request)
    {
        if ($sid = $request->getHeader("SID")) {
            $subscribe = new Subscribe\ReSubscribeRequest(
                new Uuid($sid->getFieldValue())
            );
        } else {
            $subscribe = new Subscribe\SubscribeRequest(
                new HttpUri($request->getHeader("CALLBACK")->getFieldValue())
            );
        }
        return $subscribe->setHost($request->getHeader("HOST")->getFieldValue())
            ->setTimeout($request->getHeader("TIMEOUT")->getFieldValue());
    }

    /**
     * Create unsubscribe request
     *
     * @param RequestInterface $request
     * @return Unsubscribe\UnsubscribeRequest
     */
    protected function createUnsubscribeRequest(RequestInterface $request)
    {
        $unsubscribe = new Unsubscribe\UnsubscribeRequest(
            new Uuid($request->getHeader("SID")->getFieldValue())
        );
        return $unsubscribe->setHost($request->getHeader("HOST")->getFieldValue());
    }
}
