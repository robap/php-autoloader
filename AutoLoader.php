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
     * @param string $dir
     */
    public function registerDirectory( $dir )
    {
        set_include_path( get_include_path() . PATH_SEPARATOR . $dir );
    }

    /**
     * Name of class to auto load (called by spl_autoload).
     * "_"'s and "\"'s are replaced by "/"'s
     * @param string $class
     */
    public function autoLoad( $class )
    {
        $path = str_replace('\\', '/', $class);
        $path = str_replace('_', '/', $path);

        require $path . '.php';
    }
}
