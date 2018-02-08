<?php
namespace app\modules;

use std, gui, framework, app;


class AppModule extends AbstractModule
{

    /**
     * @event action 
     */
    function doAction(ScriptEvent $e = null)
    {    
        if (file_exists('./config.ini') == false)
        fs::copy('');
    }

}
