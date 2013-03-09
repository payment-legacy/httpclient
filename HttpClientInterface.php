<?php

namespace Payment\HttpClient;

/**
 * A HTTP Client
 */
interface HttpClientInterface
{
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_GET     = 'GET';
    const METHOD_HEAD    = 'HEAD';
    const METHOD_POST    = 'POST';
    const METHOD_PUT     = 'PUT';
    const METHOD_DELETE  = 'DELETE';
    const METHOD_PATCH   = 'PATCH';
    
    /**
     * Send a http-request and return a http-response.
     *
     * @param string $method HTTP method, uppercase
     * @param string $url Url to send HTTP request to
     * @param string $content Content of the request, can be empty.
     * @param array $headers Array of Headers, header Name is the key.
     * @param array $options Vendor specific options to activate specific features.
     * @throws HttpException If no response can be created an exception should be thrown.
     * @return ResponseInterface
     */
    public function request($method, $url, $content = null, array $headers = array(), array $options = array());
}
