AutoLoader - A PHP autoload management class

##Description
This class allows you to autoload (require) the files which contain your PHP classes. So,
instead of doing this throughout your code:
<pre>
  require 'my/path/to/lib/MyClass.php';
  require ...more class files

  $obj = new MyClass();
</pre>
You simply do this (after the autoload is instantiated and configured):
<pre>
  $obj = new MyClass();
</pre>

If a file cannot be located for a class, a fatal error is emitted indicating
calling file and line (just as if you had used require or require_once).

##Requirements
PHP 5

##Example 1 - Autoload from two possible directories
<pre>
    // lib1/ is a directory assumed to contain either Foo.php or Bar.php
    // lib2/ is a directory assumed to contain either Foo.php or Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/')->registerDirectory('lib2/');

    $foo = new Foo;
    $bar = new Bar;
</pre>

##Example 2 - Autoload using psuedo namespaces
<pre>
    //A class named MyLib_Foo_Bar is located in a file: lib1/MyLib/Foo/Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/');

    $foo = new MyLib_Foo_Bar();
</pre>

##Example 3 - Autoload using PHP 5.3 namepsaces
<pre>
    //A class named MyLib\Foo\Bar is located in a file: lib1/MyLib/Foo/Bar.php

    require '/path/to/AutoLoader.php';

    $auto_loader = new AutoLoader;
    $auto_loader->registerDirectory('lib1/');

    $foo = new MyLib\Foo\Bar();
</pre>