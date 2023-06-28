<?php

namespace SAPb1;

/**
 * Encapsulates an SAP B1 HTTP response.
 */
class Response
{

    protected $statusCode;
    protected $headers;
    protected $cookies;
    protected $body;

    /**
     * Initializes a new instance of Response.
     */
    public function __construct($statusCode, array $headers = [], array $cookies = [], $body = '')
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->cookies = $cookies;
        $this->body = $body;
    }

    /**
     * Gets the response status code.
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Gets an array of response headers. If $header is specified and $header
     * exists then returns the value of the $header key.
     */
    public function getHeaders($header = '')
    {
        if ($header) {
            if (array_key_exists($header, $this->headers)) {
                return $this->headers[$header];
            }
        }
        return $this->headers;
    }

    /**
     * Gets an array of response of cookies.
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * Gets the response body.
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Returns the response body as an object.
     */
    public function getJson()
    {
        if ($this->body) {
            return json_decode($this->body);
        }
        return new \std();
    }
}