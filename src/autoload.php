<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'example\\exception\\exception' => '/exceptions/Exception.php',
                'example\\exception\\invalidcontaineridexception' => '/exceptions/InvalidContainerIdException.php',
                'example\\exception\\invalidnameexception' => '/exceptions/InvalidNameException.php',
                'example\\value\\container' => '/Value/Container.php',
                'example\\value\\containerid' => '/Value/ContainerId.php',
                'example\\value\\port' => '/Value/Port.php',
                'example\\value\\ship' => '/Value/Ship.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
