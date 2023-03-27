<?php

namespace HamZone\IP\Middlewares;

use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface;

class ProcessIp implements Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $ipAddress = Arr::get($request->getServerParams(), 'HTTP_X_FORWARDED_FOR', '127.0.0.1');
        // https://github.com/flarum/framework/blob/master/src/Http/Middleware/ProcessIp.php
        return $handler->handle($request->withAttribute('ipAddress', $ipAddress));
    }
}