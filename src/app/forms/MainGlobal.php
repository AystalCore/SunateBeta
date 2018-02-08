<?php
namespace app\forms;

use ErrorException;
use Error;
use Exception;
use windows;
use std, gui, framework, app;

class MainGlobal extends AbstractForm
{


    /**
     * @event button_get.action 
     */
    function doButton_getAction(UXEvent $e = null)
    {    
        $this->data_panel->visible = false;
        $this->get_status->text = 'Загрузка данных с сервера...';
        $this->get_status->graphic = new UXImageView(new UXImage('res://.data/img/connecting.png'));
        
        $thread_getGames = new Thread(function (){
            try {
                $_serverData = file_get_contents('http://acwh.zzz.com.ua/sunate/games/'.$this->date->value.'.txt');
                if (str::length($_serverData) > 500){
                    uiLater(function () use ($thread_getGames){
                        $this->get_status->text = 'Сессионная статистика за '.$this->date->value.' не найдена';
                        $this->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                    });
                } else {
                    $_serverDataArray = explode("|", $_serverData);
                    uiLater(function () use ($_serverDataArray){
                        $this->score_day_daniil->text = $_serverDataArray[0];
                        $this->score_day_tit->text = $_serverDataArray[1];
                        $this->score_day_all->text = $_serverDataArray[2];
                        $this->score_sopel_daniil->text = $_serverDataArray[3];
                        $this->score_sopel_tit->text = $_serverDataArray[4];
                        $this->score_part1->text = $_serverDataArray[5];
                        $this->score_part2->text = $_serverDataArray[6];
                        $this->score_part3->text = $_serverDataArray[7];
                        $this->score_part4->text = $_serverDataArray[8];
                        $this->score_part5->text = $_serverDataArray[9];
                        $this->score_part6->text = $_serverDataArray[10];
                        $this->score_part7->text = $_serverDataArray[11];
                        $this->score_part8->text = $_serverDataArray[12];
                        $this->score_part9->text = $_serverDataArray[13];
                        $this->score_part10->text = $_serverDataArray[14];
                        $this->score_part11->text = $_serverDataArray[15];
                        $this->score_part12->text = $_serverDataArray[16];
                        $this->score_part13->text = $_serverDataArray[17];
                        $this->score_part14->text = $_serverDataArray[18];
                        $this->score_part15->text = $_serverDataArray[19];
                        $this->score_part16->text = $_serverDataArray[20];
                        $this->score_part17->text = $_serverDataArray[21];
                        $this->score_part18->text = $_serverDataArray[22];
                        $this->score_part19->text = $_serverDataArray[23];
                        $this->score_part20->text = $_serverDataArray[24];
                        $this->score_part21->text = $_serverDataArray[25];
                        $this->score_part22->text = $_serverDataArray[26];
                        $this->data_panel->visible = true;
                    });
                }
            } catch (Exception $e){
                $this->get_status->text = 'Ошибка во время загрузки: 0xSV404';
                $this->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
            }
        });
        $thread_getGames->start();
    }

    /**
     * @event label28.click 
     */
    function doLabel28Click(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event checkbox_autoload.click-Left 
     */
    function doCheckbox_autoloadClickLeft(UXMouseEvent $e = null)
    {    
        if ($this->checkbox_autoload->selected == true){
            $this->ini->set('autoload', 1);
        } else {
            $this->ini->set('autoload', 0);
        }
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        if ($this->ini->get('autoload') == 1){
            $this->checkbox_autoload->selected = true;
        } else {
            $this->checkbox_autoload->selected = false;
        }
        
        waitAsync(100, function (){
            if ($this->ini->get('autoload') == 1){
                $thread_getGamesOnStartUp = new Thread(function (){
                    try {
                        $_serverData = file_get_contents('http://acwh.zzz.com.ua/sunate/games/'.$this->date->value.'.txt');
                        if (str::length($_serverData) > 500){
                            uiLater(function () use ($thread_getGames){
                                $this->get_status->text = 'Сессионная статистика за '.$this->date->value.' не найдена';
                                $this->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                            });
                        } else {
                            $_serverDataArray = explode("|", $_serverData);
                            uiLater(function () use ($_serverDataArray){
                                $this->score_day_daniil->text = $_serverDataArray[0];
                                $this->score_day_tit->text = $_serverDataArray[1];
                                $this->score_day_all->text = $_serverDataArray[2];
                                $this->score_sopel_daniil->text = $_serverDataArray[3];
                                $this->score_sopel_tit->text = $_serverDataArray[4];
                                $this->score_part1->text = $_serverDataArray[5];
                                $this->score_part2->text = $_serverDataArray[6];
                                $this->score_part3->text = $_serverDataArray[7];
                                $this->score_part4->text = $_serverDataArray[8];
                                $this->score_part5->text = $_serverDataArray[9];
                                $this->score_part6->text = $_serverDataArray[10];
                                $this->score_part7->text = $_serverDataArray[11];
                                $this->score_part8->text = $_serverDataArray[12];
                                $this->score_part9->text = $_serverDataArray[13];
                                $this->score_part10->text = $_serverDataArray[14];
                                $this->score_part11->text = $_serverDataArray[15];
                                $this->score_part12->text = $_serverDataArray[16];
                                $this->score_part13->text = $_serverDataArray[17];
                                $this->score_part14->text = $_serverDataArray[18];
                                $this->score_part15->text = $_serverDataArray[19];
                                $this->score_part16->text = $_serverDataArray[20];
                                $this->score_part17->text = $_serverDataArray[21];
                                $this->score_part18->text = $_serverDataArray[22];
                                $this->score_part19->text = $_serverDataArray[23];
                                $this->score_part20->text = $_serverDataArray[24];
                                $this->score_part21->text = $_serverDataArray[25];
                                $this->score_part22->text = $_serverDataArray[26];
                                $this->data_panel->visible = true;
                            });
                        }
                    } catch (Exception $e){
                        $this->get_status->text = 'Ошибка во время загрузки: 0xSV404';
                        $this->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                    }
                });
                $thread_getGamesOnStartUp->start();
            }
        });
    }

    /**
     * @event dateNow.construct 
     */
    function doDateNowConstruct(UXEvent $e = null)
    {    
        $this->date->value = $this->dateNow->text;
    }







}
