<?php

function displayClasses(){
    
    $classes = get_declared_classes();

    foreach ($classes as $class) {
        echo "Showing information about {$class}<br>";
        $reflection = new ReflectionClass($class);

        $isAnonymous = $reflection->isAnonymous() ? "yes" : "no";
        echo "Is Anonymous: {$isAnonymous}<br>";

        echo "Class methods:<br>";
        $methods = $reflection->getMethods(ReflectionMethod::IS_STATIC);

        if (!count($methods)) {
            echo "<i>None</i>\n";
        }else{
            foreach ($methods as $method) {
                echo "<b>{$method}()<br />";
            }
        }

        echo "Class proprietes: <br>";

        $proprietes = $reflection->getProperties();

        if (!count($proprietes)) {
            echo "None<br>";
        }else{
            foreach (array_keys($proprietes) as $property) {
                echo "<b>\${$property}</b><br/>";
            }
        }
        echo "<hr>";
    }
}


