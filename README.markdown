AutoLoader - A PHP autoload management class

##Requirements
PHP 5

##Example 1
<pre>
    // lib1/ is a directory assumed to contain either Foo.php or Bar.php
    // lib2/ is a directory assumed to contain either Foo.php or Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/')->registerDirectory('lib2/');

    $foo = new Foo;
    $bar = new Bar;
</pre>

##Example 2
<pre>
    //A class named MyLib_Foo_Bar is located in a file: lib1/MyLib/Foo/Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/');

    $foo = new MyLib_Foo_Bar();
</pre>