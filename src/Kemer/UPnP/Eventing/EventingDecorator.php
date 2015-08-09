<?php
namespace Kemer\UPnP\Eventing;

use Kemer\UPnP\Eventing\Unsubscribe;
use Kemer\UPnP\Eventing\Subscribe;
use Rhumsaa\Uuid\Uuid;
use Zend\Http\Request;
use Zend\Http\Response;


class EventingDecorator
{
    /**
     * @var RequestFactory
     */
    private $factory;

    /**
     * @var Eventing
     */
    private $eventing;

    /**
     * SearchEvent constructor
     *
     * @param RequestFactory $factory
     */
    public function __construct(RequestFactory $factory, Eventing $eventing)
    {
        $this->factory = $factory;
        $this->eventing = $eventing;
    }

    /**
     * Handle upnp:event request
     *
     * @param Request $request
     * @return void
     */
    public function handleRequest(Request $request)
    {
        $theRequest = $this->factory->create($request);
        if ($theRequest instanceof Unsubscribe\UnsubscribeRequest) {
            $this->eventing->unsubscribe($theRequest);
            return new Response();
        }
        return $this->handleSubscribeRequest($theRequest);
    }

    /**
     * Handle subscribe request
     *
     * @param Request $request
     * @return void
     */
    public function handleSubscribeRequest(Subscribe\AbstractSubscribeRequest $request)
    {
        switch (true) {
            case $request instanceof Subscribe\SubscribeRequest:
                $theResponse = $this->eventing->subscribe($request);
                break;
            case $request instanceof Subscribe\ReSubscribeRequest:
                $theResponse = $this->eventing->reSubscribe($request);
                break;
        }
        $response = new Response();
        $response->getHeaders()->addHeaders(array(
            'DATE:' => $theResponse->getDate(),
            'SERVER' => $theResponse->getServer(),
            'SID' => (string)$theResponse->getSid(),
            'TIMEOUT' => $theResponse->getTimeout(),
        ));
        return $response;
    }
}
