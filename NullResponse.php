<?php

namespace Payment\HttpClient;

class NullResponse implements ResponseInterface
{
    /**
     * @var integer
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var array
     */
    protected $headers;

    public function __construct($statusCode, $contentType, $content, array $headers)
    {
        $this->statusCode = $statusCode;
        $this->contentType = $contentType;
        $this->content = $content;
        $this->setHeaders($headers);
    }

    /**
     * @param array $rawHeaders
     */
    protected function setHeaders(array $rawHeaders)
    {
        $headers = array();
        foreach($rawHeaders as $i => $rawHeader) {
            if(is_string($i)) {
                $headers[$i] = $rawHeader;
            } elseif(false !== $pos = strpos($rawHeader, ':')) {
                $headers[substr($rawHeader, 0, $pos)] = trim(substr($rawHeader, $pos + 1));
            }
        }

        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getHeader($name)
    {
        return array_key_exists($name, $this->headers) ? $this->headers[$name] : null;
    }
}
