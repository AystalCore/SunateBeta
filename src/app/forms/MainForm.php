<?php
namespace app\forms;

use Exception;
use std, gui, framework, app;


class MainForm extends AbstractForm
{

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        if ($this->ini->get('autoload') == 1){
            $this->loading_status->text = 'Загрузка данных с сервера...';
            $thread_getGamesOnStartUp = new Thread(function (){
                try {
                    $_serverData = file_get_contents('http://acwh.zzz.com.ua/sunate/games/'.$this->date->text.'.txt');
                    if (str::length($_serverData) > 500){
                        uiLater(function () use ($thread_getGames){
                            $this->form('MainGlobal')->get_status->text = 'Сессионная статистика за '.$this->date->text.' не найдена';
                            $this->form('MainGlobal')->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                            $this->loadForm('MainGlobal');
                        });
                    } else {
                        $_serverDataArray = explode("|", $_serverData);
                        uiLater(function () use ($_serverDataArray){
                            $this->form('MainGlobal')->score_day_daniil->text = $_serverDataArray[0];
                            $this->form('MainGlobal')->score_day_tit->text = $_serverDataArray[1];
                            $this->form('MainGlobal')->score_day_all->text = $_serverDataArray[2];
                            $this->form('MainGlobal')->score_sopel_daniil->text = $_serverDataArray[3];
                            $this->form('MainGlobal')->score_sopel_tit->text = $_serverDataArray[4];
                            $this->form('MainGlobal')->score_part1->text = $_serverDataArray[5];
                            $this->form('MainGlobal')->score_part2->text = $_serverDataArray[6];
                            $this->form('MainGlobal')->score_part3->text = $_serverDataArray[7];
                            $this->form('MainGlobal')->score_part4->text = $_serverDataArray[8];
                            $this->form('MainGlobal')->score_part5->text = $_serverDataArray[9];
                            $this->form('MainGlobal')->score_part6->text = $_serverDataArray[10];
                            $this->form('MainGlobal')->score_part7->text = $_serverDataArray[11];
                            $this->form('MainGlobal')->score_part8->text = $_serverDataArray[12];
                            $this->form('MainGlobal')->score_part9->text = $_serverDataArray[13];
                            $this->form('MainGlobal')->score_part10->text = $_serverDataArray[14];
                            $this->form('MainGlobal')->score_part11->text = $_serverDataArray[15];
                            $this->form('MainGlobal')->score_part12->text = $_serverDataArray[16];
                            $this->form('MainGlobal')->score_part13->text = $_serverDataArray[17];
                            $this->form('MainGlobal')->score_part14->text = $_serverDataArray[18];
                            $this->form('MainGlobal')->score_part15->text = $_serverDataArray[19];
                            $this->form('MainGlobal')->score_part16->text = $_serverDataArray[20];
                            $this->form('MainGlobal')->score_part17->text = $_serverDataArray[21];
                            $this->form('MainGlobal')->score_part18->text = $_serverDataArray[22];
                            $this->form('MainGlobal')->score_part19->text = $_serverDataArray[23];
                            $this->form('MainGlobal')->score_part20->text = $_serverDataArray[24];
                            $this->form('MainGlobal')->score_part21->text = $_serverDataArray[25];
                            $this->form('MainGlobal')->score_part22->text = $_serverDataArray[26];
                            $this->form('MainGlobal')->data_panel->visible = true;
                            $this->loadForm('MainGlobal');
                        });
                    }
                } catch (Exception $e){
                    $this->form('MainGlobal')->get_status->text = 'Ошибка во время загрузки: 0xSV404';
                    $this->form('MainGlobal')->get_status->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                    $this->loadForm('MainGlobal');
                }
            });
            $thread_getGamesOnStartUp->start();
        } else {
            $this->loadForm('MainGlobal');
        }    
    }

}
