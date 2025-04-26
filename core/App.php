<?php
namespace Core;

class App {
    public Router $router;
    public Request $request;
    public Response $response;
    public array $config;

    public function __construct(array $config) {
        $this->config = $config;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }
}
