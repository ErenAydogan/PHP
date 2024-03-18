<?php
    //Getting the base path
    function basePath($path = '') {
        return __DIR__ . '/' . $path;
    }

    //Loading a view
    function loadView($name) {
        $viewPath = basePath("views/{$name}.view.php");
        if(file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View '{$name} not found!'";
        }
    }

    //Loading a partial
    function loadPartial($name) {
        $partialPath = basePath("views/partials/{$name}.php");
        if(file_exists($partialPath)) {
            require $partialPath;
        } else {
            echo "Partial '{$name}not found!'";
        }
    }

    //Inspecting a value(s)
    function inspect($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    //Inspecting a value(s) and die
    function inspectAndDie($value) {
        echo '<pre>';
        die(var_dump($value));
        echo '</pre>';
    }
?>