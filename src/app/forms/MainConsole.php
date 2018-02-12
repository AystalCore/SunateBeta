<?php
namespace app\forms;

use php\desktop\Runtime;
use std, gui, framework, app;


class MainConsole extends AbstractForm
{

    /**
     * @event button_send.action                                                                                                                                                                                                                                                                                                                              
     */
    function doButton_sendAction(UXEvent $e = null)
    {    
        $this->button_send->text = 'Подключение к серверу...';
        
        $thread_sendGames = new Thread(function (){
            $_serverRanksDaniil = explode("|", file_get_contents('http://acwh.zzz.com.ua/sunate/Dr3amy.txt'));
            $_serverRanksTit = explode("|", file_get_contents('http://acwh.zzz.com.ua/sunate/Leviafan4ik.txt'));
            $_game = $this->edit_score_day_daniil->text.'|'.$this->edit_score_day_tit->text.'|'
                    .$this->edit_score_day_all->text.'|'.$this->edit_sopel_daniil->text.'|'
                    .$this->edit_sopel_tit->text.'|'.$this->edit_part1->text.'|'
                    .$this->edit_part2->text.'|'.$this->edit_part3->text.'|'
                    .$this->edit_part4->text.'|'.$this->edit_part5->text.'|'
                    .$this->edit_part6->text.'|'.$this->edit_part7->text.'|'
                    .$this->edit_part8->text.'|'.$this->edit_part9->text.'|'
                    .$this->edit_part10->text.'|'.$this->edit_part11->text.'|'
                    .$this->edit_part12->text.'|'.$this->edit_part13->text.'|'
                    .$this->edit_part14->text.'|'.$this->edit_part15->text.'|'
                    .$this->edit_part16->text.'|'.$this->edit_part17->text.'|'
                    .$this->edit_part18->text.'|'.$this->edit_part19->text.'|'
                    .$this->edit_part20->text.'|'.$this->edit_part21->text.'|'
                    .$this->edit_part22->text;
                    
            uiLater(function () use ($_serverRanksTit){
                $this->button_send->text = 'Произведение вычеслений...';
            });
            
            $__partsWinDaniil__ = $_serverRanksDaniil[0] + $this->edit_score_day_daniil->text;
            $__partsWinTit__ = $_serverRanksTit[0] + $this->edit_score_day_tit->text;
            if ($this->edit_score_day_daniil->text > $this->edit_score_day_tit->text){
                $__partsDayWinDaniil__ = $_serverRanksDaniil[1] + 1;
                $__partsDayWinTit__ = $_serverRanksTit[1];
            } elseif ($this->edit_score_day_daniil->text < $this->edit_score_day_tit->text){
                $__partsDayWinDaniil__ = $_serverRanksDaniil[1];
                $__partsDayWinTit__ = $_serverRanksTit[1] + 1;
            } else {
                $__partsDayWinDaniil__ = $_serverRanksDaniil[1];
                $__partsDayWinTit__ = $_serverRanksTit[1];
            }
            $__gamesAll__ = $_serverRanksTit[2] + $this->edit_score_day_all->text;
            $__partsDay__ = $_serverRanksTit[3] + 1;
            $__sopelsDaniil__ = $_serverRanksDaniil[4] + $this->edit_sopel_daniil->text;
            $__sopelsTit__ = $_serverRanksTit[4] + $this->edit_sopel_tit->text;
            $__killsDaniil__ = $_serverRanksDaniil[5] + $this->edit_kills_daniil->text;
            $__killsTit__ = $_serverRanksTit[5] + $this->edit_kills_tit->text;
            
            $_rankDaniil = $__partsWinDaniil__.'|'.$__partsDayWinDaniil__.'|'
                           .$__gamesAll__.'|'.$__partsDay__.'|'.$__sopelsDaniil__.'|'
                           .$__killsDaniil__.'|';
            $_rankTit = $__partsWinTit__.'|'.$__partsDayWinTit__.'|'
                       .$__gamesAll__.'|'.$__partsDay__.'|'.$__sopelsTit__.'|'
                       .$__killsTit__.'|';
            
            uiLater(function (){
                $this->button_send->text = 'Отправка данных на сервер...';
            });
            
            if (str::length(file_get_contents('http://acwh.zzz.com.ua/sunate/'.$this->edit_date->value.'.txt')) > 500){
                file_get_contents('http://acwh.zzz.com.ua/sunate/setfile.php?file=Dr3amy.txt&value='.$_rankDaniil);
                file_get_contents('http://acwh.zzz.com.ua/sunate/setfile.php?file=Leviafan4ik.txt&value='.$_rankTit);
                file_get_contents("http://acwh.zzz.com.ua/sunate/setfile.php?file=".$this->edit_date->value.".txt&value=".$_game);
                uiLater(function (){
                    $this->button_send->text = 'Успешно!';
                    waitAsync(3000, function (){
                        $this->button_send->text = 'Отправить данные на сервер (SSL)';
                    });
                });
            } else {
                uiLater(function (){
                    $this->button_send->text = 'Ошибка отправки: 0x17TFIF';
                    $this->toast('Файл игры за указанное число уже находится на сервере');
                    waitAsync(3000, function (){
                        $this->button_send->text = 'Отправить данные на сервер (SSL)';
                    });
                });
            }
        });
        $thread_sendGames->start();
    }

    /**
     * @event edit_date.construct 
     */
    function doEdit_dateConstruct(UXEvent $e = null)
    {    
        waitAsync(200, function (){
            $this->edit_date->value = $this->date->text;
        });
    }

    /**
     * @event checkbox.click 
     */
    function doCheckboxClick(UXMouseEvent $e = null)
    {    
        if ($this->checkbox->selected == true){$this->button_send->enabled = true;}
        else {$this->button_send->enabled = false;}
    }




}
