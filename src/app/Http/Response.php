<?php

namespace App\Http;

use Exception;

/**
 * Class Response is used to retrieve HTTP response from request we send and get headers and response as outcome.
 *
 * Throws the exception for conversion error.
 * Returns all the JSON payloads as an associative array.
 *
 * @author Tejas Prajapati <tejas.p@simformsolutions.com>
 */
class Response
{
    /**
     * Response
     *
     * @var mixed
     */

    private $response;

    /**
     * Headers
     *
     * @var array
     */
    private $headers;

    /**
     * Default Constructor
     * @param array|null $headers
     * @param mixed $response
     */
    public function __construct($response, array $headers = [])
    {
        $this->response = $response;
        $this->headers = $headers;
    }

    /**
     * Returns response
     * @return mixed
     * @throws Exception
     */
    public function getResponseBody()
    {
        if (strpos(strtolower(implode(', ', $this->getResponseHeaders())), 'application/json') !== false) {
            $result = json_decode($this->response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                // Return associative array
                return $result;
            } else {
                // Throw exception
                throw new Exception("Error in JSON decoding: " . json_last_error());
            }
        }

        return $this->response;
    }

    /**
     * Returns response header.
     *
     * @return array
     */
    public function getResponseHeaders()
    {
        return $this->headers;
    }
}
