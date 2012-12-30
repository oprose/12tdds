<?php
function loader($className)
{
    if (file_exists('../classes/' . $className . '.php'))
    {
        include '../classes/' . $className . '.php';
    }
}

spl_autoload_register('loader');
?>
