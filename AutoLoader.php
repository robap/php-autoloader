<?php
/**
 * @author Rob Apodaca <rob.apodaca@gmail.com>
 * @copyright Copyright (c) 2009, Rob Apodaca
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class AutoLoader
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        //Anytime an undefined class is called, php will invoke
        // AutoLoader::autoLoad()
        spl_autoload_register( array($this, 'autoLoad') );
    }

    /**
     * The path the the directory to register (use trailing slash)
     *
     * @param string $dir
     */
    public function registerDirectory( $dir )
    {
        set_include_path( get_include_path() . PATH_SEPARATOR . $dir );

        return $this;
    }

    /**
     * Name of class to auto load (called by spl_autoload).
     * "_"'s and "\"'s are replaced by "/"'s
     *
     * @param string $class
     */
    public function autoLoad( $class )
    {
        $path = str_replace('\\', '/', $class);
        $path = str_replace('_', '/', $path);
        $file = $path . '.php';

        //using custom handler, the calling script and line can be displayed
        // as part of a php fatal error.
        set_error_handler( array($this, 'handleError') );
        include $file;
        restore_error_handler();
    }

    /**
     * Custom error handler used to display the calling file and line. Triggers
     * a fatal error with appropriate message.
     *
     * @param string $errno
     * @param string $errmsg
     */
    private function handleError( $errno, $errmsg )
    {
        $backtrace      = debug_backtrace();
        $debug          = array_pop($backtrace);
        $file           = $debug['file'];
        $line           = $debug['line'];
        $error_string   = $errmsg . '. '
                        . "Called from $file on line $line. "
                        . "Using include path " . get_include_path()
                        ;

        trigger_error($error_string, E_USER_ERROR);
    }
}
