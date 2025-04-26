<?php
namespace Core;

class Router {
    protected Request $request;
    protected Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callable) {
        $this->routes['GET'][$path] = $callable;
    }

    public function post(string $path, $callable) {
        $this->routes['POST'][$path] = $callable;
    }

    public function resolve() {
        $method = $this->request->method();
        $path = $this->request->path();
        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback) {
            $this->response->setStatusCode(404);
            return '404 Not Found';
        }

        if (is_string($callback)) {
            [$controller, $action] = explode('@', $callback);
            $controller = new $controller();
            return call_user_func([$controller, $action], $this->request);
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}
