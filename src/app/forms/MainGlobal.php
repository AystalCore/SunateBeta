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
                    //$redRocket = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));
                    //$greenRocket = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));
                    uiLater(function () use ($_serverDataArray){
                        $this->score_day_daniil->text = $_serverDataArray[0];
                        $this->score_day_tit->text = $_serverDataArray[1];
                        $this->score_day_all->text = $_serverDataArray[2];
                        $this->score_sopel_daniil->text = $_serverDataArray[3];
                        $this->score_sopel_tit->text = $_serverDataArray[4];
                        
                        $this->score_part1->graphic = null;
                        $this->score_part2->graphic = null;
                        $this->score_part3->graphic = null;
                        $this->score_part4->graphic = null;
                        $this->score_part5->graphic = null;
                        $this->score_part6->graphic = null;
                        $this->score_part7->graphic = null;
                        $this->score_part8->graphic = null;
                        $this->score_part9->graphic = null;
                        $this->score_part10->graphic = null;
                        $this->score_part11->graphic = null;
                        $this->score_part12->graphic = null;
                        $this->score_part13->graphic = null;
                        $this->score_part14->graphic = null;
                        $this->score_part15->graphic = null;
                        $this->score_part16->graphic = null;
                        $this->score_part17->graphic = null;
                        $this->score_part18->graphic = null;
                        $this->score_part19->graphic = null;
                        $this->score_part20->graphic = null;
                        $this->score_part21->graphic = null;
                        $this->score_part22->graphic = null;
                        
                        $this->score_part1->text = $_serverDataArray[5];
                        $part1_arr = explode(":", $_serverDataArray[5]);
                        if ($part1_arr[0] < $part1_arr[1]){$this->score_part1->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part1_arr[0] > $part1_arr[1]) {$this->score_part1->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        
                        $this->score_part2->text = $_serverDataArray[6];
                        $part2_arr = explode(":", $_serverDataArray[6]);
                        if ($part2_arr[0] < $part2_arr[1]){$this->score_part2->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part2_arr[0] > $part2_arr[1]) {$this->score_part2->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part3->text = $_serverDataArray[7];
                        $part3_arr = explode(":", $_serverDataArray[7]);
                        if ($part3_arr[0] < $part3_arr[1]){$this->score_part3->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part3_arr[0] > $part3_arr[1]) {$this->score_part3->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part4->text = $_serverDataArray[8];
                        $part4_arr = explode(":", $_serverDataArray[8]);
                        if ($part4_arr[0] < $part4_arr[1]){$this->score_part4->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part4_arr[0] > $part4_arr[1]) {$this->score_part4->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part5->text = $_serverDataArray[9];
                        $part5_arr = explode(":", $_serverDataArray[9]);
                        if ($part5_arr[0] < $part5_arr[1]){$this->score_part5->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part5_arr[0] > $part5_arr[1]) {$this->score_part5->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part6->text = $_serverDataArray[10];
                        $part6_arr = explode(":", $_serverDataArray[10]);
                        if ($part6_arr[0] < $part6_arr[1]){$this->score_part6->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part6_arr[0] > $part6_arr[1]) {$this->score_part6->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part7->text = $_serverDataArray[11];
                        $part7_arr = explode(":", $_serverDataArray[11]);
                        if ($part7_arr[0] < $part7_arr[1]){$this->score_part7->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part7_arr[0] > $part7_arr[1]) {$this->score_part7->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part8->text = $_serverDataArray[12];
                        $part8_arr = explode(":", $_serverDataArray[12]);
                        if ($part8_arr[0] < $part8_arr[1]){$this->score_part8->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part8_arr[0] > $part8_arr[1]) {$this->score_part8->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part9->text = $_serverDataArray[13];
                        $part9_arr = explode(":", $_serverDataArray[13]);
                        if ($part9_arr[0] < $part9_arr[1]){$this->score_part9->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part9_arr[0] > $part9_arr[1]) {$this->score_part9->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part10->text = $_serverDataArray[14];
                        $part10_arr = explode(":", $_serverDataArray[14]);
                        if ($part10_arr[0] < $part10_arr[1]){$this->score_part10->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part10_arr[0] > $part10_arr[1]) {$this->score_part10->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part11->text = $_serverDataArray[15];
                        $part11_arr = explode(":", $_serverDataArray[15]);
                        if ($part11_arr[0] < $part11_arr[1]){$this->score_part11->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part11_arr[0] > $part11_arr[1]) {$this->score_part11->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part12->text = $_serverDataArray[16];
                        $part12_arr = explode(":", $_serverDataArray[16]);
                        if ($part12_arr[0] < $part12_arr[1]){$this->score_part12->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part12_arr[0] > $part12_arr[1]) {$this->score_part12->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part13->text = $_serverDataArray[17];
                        $part13_arr = explode(":", $_serverDataArray[17]);
                        if ($part13_arr[0] < $part13_arr[1]){$this->score_part13->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part13_arr[0] > $part13_arr[1]) {$this->score_part13->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part14->text = $_serverDataArray[18];
                        $part14_arr = explode(":", $_serverDataArray[18]);
                        if ($part14_arr[0] < $part14_arr[1]){$this->score_part14->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part14_arr[0] > $part14_arr[1]) {$this->score_part14->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part15->text = $_serverDataArray[19];
                        $part15_arr = explode(":", $_serverDataArray[19]);
                        if ($part15_arr[0] < $part15_arr[1]){$this->score_part15->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part15_arr[0] > $part15_arr[1]) {$this->score_part15->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part16->text = $_serverDataArray[20];
                        $part16_arr = explode(":", $_serverDataArray[20]);
                        if ($part16_arr[0] < $part16_arr[1]){$this->score_part16->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part16_arr[0] > $part16_arr[1]) {$this->score_part16->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part17->text = $_serverDataArray[21];
                        $part17_arr = explode(":", $_serverDataArray[21]);
                        if ($part17_arr[0] < $part17_arr[1]){$this->score_part17->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part17_arr[0] > $part17_arr[1]) {$this->score_part17->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part18->text = $_serverDataArray[22];
                        $part18_arr = explode(":", $_serverDataArray[22]);
                        if ($part18_arr[0] < $part18_arr[1]){$this->score_part18->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part18_arr[0] > $part18_arr[1]) {$this->score_part18->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part19->text = $_serverDataArray[23];
                        $part19_arr = explode(":", $_serverDataArray[23]);
                        if ($part19_arr[0] < $part19_arr[1]){$this->score_part19->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part19_arr[0] > $part19_arr[1]) {$this->score_part19->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part20->text = $_serverDataArray[24];
                        $part20_arr = explode(":", $_serverDataArray[24]);
                        if ($part20_arr[0] < $part20_arr[1]){$this->score_part20->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part20_arr[0] > $part20_arr[1]) {$this->score_part20->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part21->text = $_serverDataArray[25];
                        $part21_arr = explode(":", $_serverDataArray[25]);
                        if ($part21_arr[0] < $part21_arr[1]){$this->score_part21->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part21_arr[0] > $part21_arr[1]) {$this->score_part21->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
                        $this->score_part22->text = $_serverDataArray[26];
                        $part22_arr = explode(":", $_serverDataArray[26]);
                        if ($part22_arr[0] < $part22_arr[1]){$this->score_part22->graphic = new UXImageView(new UXImage('res://.data/img/rocket_green.png'));}
                        elseif ($part22_arr[0] > $part22_arr[1]) {$this->score_part22->graphic = new UXImageView(new UXImage('res://.data/img/rocket_red.png'));}
                        
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

    /**
     * @event button_getRanks.action 
     */
    function doButton_getRanksAction(UXEvent $e = null)
    {    
        if (str::length($this->player->value) > 2){
            $this->rank_panel->visible = false;
            $this->get_status_ranks->text = 'Загрузка данных с сервера...';
            $this->get_status_ranks->graphic = new  UXImageView(new UXImage('res://.data/img/connecting.png'));
            
            $thread_getRanks = new Thread(function (){
                try {
                    $_serverDataRanks = file_get_contents('http://acwh.zzz.com.ua/sunate/'.$this->player->value.'.txt');
                    if (str::length($_serverDataRanks) > 500){
                        $this->get_status_ranks->text = 'Не удалось получить статистику игрока '.$this->player->value;
                        $this->get_status_ranks->graphic = new UXImageView(new UXImage('res://.data/img/nullfile.png'));
                    } else {
                        $_serverDataRanksArray = explode("|", $_serverDataRanks);
                        uiLater(function () use ($_serverDataRanksArray){
                            $this->player_wins->text = $_serverDataRanksArray[0].' из '.$_serverDataRanksArray[2];
                            $this->player_sopel->text = $_serverDataRanksArray[4];
                            $this->player_kills->text = $_serverDataRanksArray[5];
                            $_dataRnksWN27 = $_serverDataRanksArray[1] / $_serverDataRanksArray[3];
                            $_dataRnksWN27 = $_dataRnksWN27 * 100;
                            $_dataRnksWN27 = round($_dataRnksWN27, 2);
                            $this->player_wn24->text = $_dataRnksWN27.'%';
                            if ($_dataRnksWN27 < 45){$this->circle->fillColor = '#333333';}
                            if ($_dataRnksWN27 > 44 and $_dataRnksWN27 < 47){$this->circle->fillColor = '#cd3333';}
                            if ($_dataRnksWN27 > 46 and $_dataRnksWN27 < 49){$this->circle->fillColor = '#d77900';}
                            if ($_dataRnksWN27 > 48 and $_dataRnksWN27 < 52){$this->circle->fillColor = '#d7b600';}
                            if ($_dataRnksWN27 > 51 and $_dataRnksWN27 < 56){$this->circle->fillColor = '#6d9521';}
                            if ($_dataRnksWN27 > 55 and $_dataRnksWN27 < 60){$this->circle->fillColor = '#4a92b7';}
                            if ($_dataRnksWN27 > 59 and $_dataRnksWN27 < 65){$this->circle->fillColor = '#83579d';}
                            if ($_dataRnksWN27 > 64){$this->circle->fillColor = '#5a3175';}
                            $_dataRnksWN7 = $_serverDataRanksArray[0] / $_serverDataRanksArray[2];
                            $_dataRnksWN7 = $_dataRnksWN7 * 100;
                            $_dataRnksWN7 = round($_dataRnksWN7, 2);
                            $this->player_wn7->text = $_dataRnksWN7.'%';
                            $this->rank_panel->visible = true;
                        });
                    }
                } catch (Exception $e){
                    
                }
            });
            $thread_getRanks->start();
        }
    }

    /**
     * @event button_console.action 
     */
    function doButton_consoleAction(UXEvent $e = null)
    {    
        app()->showForm(MainConsole);
    }









}
