<?php

namespace MorenoRafael\Http;

use GuzzleHttp\Client;

/**
 * Class Request
 * @package MorenoRafael\Http
 */
class Request extends PendingRequest
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * @param string $url
     * @param array $query
     * @return Response
     */
    public function get(string $url, array $query = []): Response
    {
        if (count($query) > 0) {
            $this->options[] = ['query' => $query];
        }

        return $this->send('get', $url, $this->options);
    }

    /**
     * @param string $url
     * @param array $data
     * @return Response
     */
    public function post(string $url, array $data = []): Response
    {
        if (count($this->file) > 0) {
            $data = $this->file;
        }

        $this->options[] = [$this->encodedRequests => $data];

        return $this->send('post', $url, $this->options);
    }

    /**
     * @param string $url
     * @param array $data
     * @return Response
     */
    public function patch(string $url, array $data = []): Response
    {
        $this->options[] = [$this->encodedRequests => $data];

        return $this->send('patch', $url, $this->options);
    }

    /**
     * @param string $url
     * @param array $data
     * @return Response
     */
    public function put(string $url, array $data = []): Response
    {
        $this->options[] = [$this->encodedRequests => $data];

        return $this->send('put', $url, $this->options);
    }

    /**
     * @param string $url
     * @param array $data
     * @return Response
     */
    public function delete(string $url, array $data = []): Response
    {
        $this->options[] = [$this->encodedRequests => $data];

        return $this->send('delete', $url, $this->options);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return Response
     */
    public function send(string $method, string $url, array $options = []): Response
    {
        $this->response = $this->client->$method($url, [$options]);

        return new Response($this->response);

    }
}