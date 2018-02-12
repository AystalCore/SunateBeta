<?php
namespace app\forms;

use std, gui, framework, app;


class MainAuth extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        if (file_get_contents('http://acwh.zzz.com.ua/sunate/pass.txt') == $this->edit->text){
            $this->loadForm(MainConsole);
        } else {
            $this->button->enabled = false;
            Animation::displace($this, 50, 10.0, 0.0, function () use ($e, $event) {
                Animation::displace($this, 50, -10.0, 0.0, function () use ($e, $event) {
                    Animation::displace($this, 50, 10.0, 0.0, function () use ($e, $event) {
                        Animation::displace($this, 50, -10.0, 0.0, function () use ($e, $event) {
                            $this->button->enabled = true;
                        });
                    });
                });
            });
        }
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        $this->hide();
    }

}
