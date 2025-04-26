<?php
namespace Core;

class View {
    public static function render(string $view, array $params = []): string {
        $viewPath = __DIR__ . '/../app/Views/' . $view . '.php';
        extract($params, EXTR_SKIP);
        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
}
