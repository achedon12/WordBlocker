<?php

namespace achedon\wordBlocker;

use achedon\wordBlocker\events\playerEvents;
use pocketmine\plugin\PluginBase;

class word extends PluginBase{

    public static array $words = [];

    protected function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new playerEvents(), $this);

        $this->saveResource("badwords.txt");

        foreach(explode("\n",file_get_contents($this->getDataFolder()."badwords.txt")) as $word){
            if(is_string($word)){
                self::$words[] = $word;
            }
        }
    }


}