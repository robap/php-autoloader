<?php
/**
 * @author Rob Apodaca <rob.apodaca@gmail.com>
 * @copyright Copyright (c) 2009, Rob Apodaca
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
class AutoLoader
{
    /**
     * Store the registered directories
     * @var array
     */
    private $_directories = array();

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
        $this->_directories[] = $dir;
    }

    /**
     * Name of class to auto load (called by spl_autoload)
     * @param string $class
     * @return bool
     */
    public function autoLoad( $class )
    {
        foreach( $this->_directories as $directory )
        {
            $file = $directory . $class . '.php';

            if( file_exists($file) )
            {
                require $file;
                return TRUE;
            }
        }

        return FALSE;
    }
}
