<?php

namespace App\Controller;

class Controller {
    private const PATH = ROOT.'/src/Views/';
    private const TEMPLATE_PATH = ROOT.'/src/Views/template/default.php';

    public function render(string $view, array $data = []){
        ob_start();
        extract($data);
        require self::PATH.$view.'.php';
        $content = ob_get_clean();
        require self::TEMPLATE_PATH;
    }

    public function redirect(string $view){
        $location = 'Location: '.PATH_URL.'/'.$view;
        header($location);
        exit();
    }
}