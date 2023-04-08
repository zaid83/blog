<?php
class Renderer
{

    public static function renderHTML(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        require('' . $path . '.php');
        $pageContent = ob_get_clean();

        require('templates/layout.html.php');

    }
}