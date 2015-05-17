<?php

namespace GW2Treasures\GW2Api\Endpoint\Exception;

use Exception;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Message\ResponseInterface;

class ApiException extends Exception {
    /** @var RequestInterface $request */
    protected $request;

    /** @var ResponseInterface $response */
    protected $response;

    public function __construct( $message = "", RequestInterface $request, ResponseInterface $response ) {
        $this->request = $request;
        $this->response = $response;

        parent::__construct( $message, $response->getStatusCode() ); // TODO: Change the autogenerated stub
    }

    /**
     * @return RequestInterface
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse() {
        return $this->response;
    }

    public function __toString() {
        return $this->message . ' (' .
               'status: ' . $this->response->getStatusCode() . '; ' .
               'url: ' . $this->response->getEffectiveUrl() . ')';
    }
}
