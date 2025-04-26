<?php
namespace Src;

use Core\Request;
use Core\Response;

interface MiddlewareInterface {
    public function handle(Request $request, Response $response, callable $next);
}
