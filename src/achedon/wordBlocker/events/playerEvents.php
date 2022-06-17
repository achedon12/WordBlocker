<?php

namespace achedon\wordBlocker\events;

use achedon\wordBlocker\word;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class playerEvents implements Listener{

    public function onChat(PlayerChatEvent $event){
        $message = $event->getMessage();
        if($this->checkMessage($message)){
            $event->cancel();
            $event->getPlayer()->sendMessage("§cMessage contains a invalid word");
        }
    }

    private function checkMessage(string $message): bool{
        $args = explode(" ",$message);
        foreach(word::$words as $word){
            foreach($args as $arg){
                if(str_contains(strtolower($word),$arg)){
                    return true;
                }
            }
        }
        return false;
    }
}