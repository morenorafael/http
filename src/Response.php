<?php

namespace MorenoRafael\Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 * @package MorenoRafael\Http
 */
class Response
{
    /**
     * @var ResponseInterface
     */
    protected $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function body(): string
    {
        return $this->getContent();
    }

    /**
     * @return array
     */
    public function json(): array
    {
        return json_decode($this->getContent(), true);
    }

    /**
     * @return int
     */
    public function status(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return bool
     */
    public function ok(): bool
    {
        return $this->response->getStatusCode() === 200;
    }

    /**
     * @return bool
     */
    public function successful(): bool
    {
        return $this->response->getStatusCode() > 199 && $this->response->getStatusCode() < 300;
    }

    /**
     * @return bool
     */
    public function serverError(): bool
    {
        return $this->response->getStatusCode() > 499 && $this->response->getStatusCode() < 600;
    }

    /**
     * @return bool
     */
    public function clientError(): bool
    {
        return $this->response->getStatusCode() > 399 && $this->response->getStatusCode() < 500;
    }

    /**
     * @param string $header
     * @return string
     */
    public function header(string $header): string
    {
        return $this->response->getHeader($header)[0];
    }

    /**
     * @return array
     */
    public function headers(): array
    {
        return $this->response->getHeaders();
    }

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @return string
     */
    protected function getContent()
    {
        return $this->getBody()->getContents();
    }
}