<?php

function autoload($class) {
    // $path = str_replace('\\', '/', $class);
    require str_replace('\\', '/', $class) . '.php';
}
spl_autoload_register('autoload');