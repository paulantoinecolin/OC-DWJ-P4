<?php

class Renderer
{
    // Render the view
    public static function render(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        require('../views/' . $path . '.view.php');
        $pageContent = ob_get_clean();
    
        require('../views/layout.view.php');
    }
}
