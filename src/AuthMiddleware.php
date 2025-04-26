<?php
namespace Src;

use Core\Request;
use Core\Response;

class AuthMiddleware implements MiddlewareInterface {
    public function handle(Request $request, Response $response, callable $next) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $response->redirect('/login');
            return;
        }
        return $next($request, $response);
    }
}
