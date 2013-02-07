<?php

namespace Payment\HttpClient;

/**
 * Http Response returned from {@see HttpClientInterface::request}.
 */
interface ResponseInterface
{
    /**
     * @return integer
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getContentType();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param $name
     * @return mixed
     */
    public function getHeader($name);
}