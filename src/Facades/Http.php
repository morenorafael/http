<?php

namespace MorenoRafael\Http\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Http
 * @package MorenoRafael\Http\Facades
 * @method static \MorenoRafael\Http\Request asJson()
 * @method static \MorenoRafael\Http\Request asForm()
 * @method static \MorenoRafael\Http\Request attach(string $name, string $contents, string $filename = null, array $headers)
 * @method static \MorenoRafael\Http\Request asMultipart()
 * @method static \MorenoRafael\Http\Request bodyFormat(string $format)
 * @method static \MorenoRafael\Http\Request contentType(string $contentType)
 * @method static \MorenoRafael\Http\Request acceptJson()
 * @method static \MorenoRafael\Http\Request accept(string $contentType)
 * @method static \MorenoRafael\Http\Request retry(int $times, int $sleep = 0)
 * @method static \MorenoRafael\Http\Request withHeaders(array $headers)
 * @method static \MorenoRafael\Http\Request withBasicAuth(string $username, string $password)
 * @method static \MorenoRafael\Http\Request withDigestAuth(string $username, string $password)
 * @method static \MorenoRafael\Http\Request withToken(string $token, string $type = 'Bearer')
 * @method static \MorenoRafael\Http\Request withCookies(array $cookies, string $domain)
 * @method static \MorenoRafael\Http\Request withoutRedirecting()
 * @method static \MorenoRafael\Http\Request withoutVerifying()
 * @method static \MorenoRafael\Http\Request timeout(int $seconds)
 * @method static \MorenoRafael\Http\Request withOptions(array $options)
 * @method static \MorenoRafael\Http\Request beforeSending(callable $callback)
 * @method static \MorenoRafael\Http\Response get(string $url, array $query = [])
 * @method static \MorenoRafael\Http\Response post(string $url, array $data = [])
 * @method static \MorenoRafael\Http\Response patch(string $url, array $data = [])
 * @method static \MorenoRafael\Http\Response put(string $url, array $data = [])
 * @method static \MorenoRafael\Http\Response delete(string $url, array $data = [])
 * @method static \MorenoRafael\Http\Response send(string $method, string $url, array $options = [])
 */
class Http extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'morenorafael.http';
    }
}