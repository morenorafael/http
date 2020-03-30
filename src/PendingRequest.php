<?php

namespace MorenoRafael\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class PendingRequest
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var string
     */
    protected $encodedRequests = 'json';

    /**
     * @var array
     */
    protected $file = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return PendingRequest
     */
    public function asJson(): PendingRequest
    {
        $this->encodedRequests = 'json';

        return $this;
    }

    /**
     * @return PendingRequest
     */
    public function asForm(): PendingRequest
    {
        $this->encodedRequests = 'form_params';

        return $this;
    }

    /**
     * @param string $name
     * @param string $contents
     * @param string|null $filename
     * @param array $headers
     * @return PendingRequest
     */
    public function attach(string $name, string $contents, string $filename = null, array $headers): PendingRequest
    {
        $this->encodedRequests = 'multipart';

        $this->file = [
            'name' => $name,
            'contents' => $contents,
            'filename' => $filename,
            'headers'  => $headers
        ];

        return $this;
    }

    /**
     * @return PendingRequest
     */
    public function asMultipart(): PendingRequest
    {
        return $this;
    }

    /**
     * @param string $format
     * @return PendingRequest
     */
    public function bodyFormat(string $format): PendingRequest
    {
        return $this;
    }

    /**
     * @param string $contentType
     * @return PendingRequest
     */
    public function contentType(string $contentType): PendingRequest
    {
        return $this;
    }

    /**
     * @return PendingRequest
     */
    public function acceptJson(): PendingRequest
    {
        return $this;
    }

    /**
     * @param string $contentType
     * @return PendingRequest
     */
    public function accept(string $contentType): PendingRequest
    {
        return $this;
    }

    /**
     * @param int $times
     * @param int $sleep
     * @return PendingRequest
     */
    public function retry(int $times, int $sleep = 0): PendingRequest
    {
        return $this;
    }

    /**
     * @param array $headers
     * @return PendingRequest
     */
    public function withHeaders(array $headers): PendingRequest
    {
        $this->options[] = ['headers' => $headers];

        return $this;
    }

    /**
     * @param string $username
     * @param string $password
     * @return PendingRequest
     */
    public function withBasicAuth(string $username, string $password): PendingRequest
    {
        $this->options[] = ['auth' => [$username, $password]];

        return $this;
    }

    /**
     * @param string $username
     * @param string $password
     * @return PendingRequest
     */
    public function withDigestAuth(string $username, string $password): PendingRequest
    {
        $this->options[] = ['auth' => [$username, $password, 'digest']];

        return $this;
    }

    /**
     * @param string $token
     * @param string $type
     * @return PendingRequest
     */
    public function withToken(string $token, string $type = 'Bearer'): PendingRequest
    {
        $this->options['headers'][] = [
            'Authorization' => "{$type} {$token}"
        ];

        return $this;
    }

    /**
     * @param array $cookies
     * @param string $domain
     * @return PendingRequest
     */
    public function withCookies(array $cookies, string $domain): PendingRequest
    {
        $jar = CookieJar::fromArray($cookies, $domain);

        $this->options[] = ['cookies' => $jar];

        return $this;
    }

    /**
     * @return PendingRequest
     */
    public function withoutRedirecting(): PendingRequest
    {
        $this->options[] = ['allow_redirects' => false];

        return $this;
    }

    /**
     * @param int $seconds
     * @return PendingRequest
     */
    public function timeout(int $seconds): PendingRequest
    {
        $this->options[] = ['timeout' => $seconds];

        return $this;
    }

    /**
     * @param array $options
     * @return PendingRequest
     */
    public function withOptions(array $options): PendingRequest
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * @param callable $callback
     * @return PendingRequest
     */
    public function beforeSending(callable $callback): PendingRequest
    {
        return $this;
    }
}