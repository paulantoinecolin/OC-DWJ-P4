<?php

class Renderer
{
    // Render the view
    // Get param $path to find which view to require
    // Get param array to return the values needed in the view
    public static function render(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        require('../views/' . $path . '.view.php');
        $pageContent = ob_get_clean();

        require('../views/layout.view.php');
    }
}
