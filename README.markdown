AutoLoader - A PHP autoload management class

##Requirements
PHP 5

##Usage
<pre>
    // lib1/ is a directory assumed to contain either Foo.php or Bar.php
    // lib2/ is a directory assumed to contain either Foo.php or Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/');
    $auto_loader->registerDirectory('lib2/');

    $foo = new Foo;
    $bar = new Bar;
</pre>