<?php
namespace Core;

class Controller {
    public function view(string $view, array $params = []) {
        return View::render($view, $params);
    }
}
