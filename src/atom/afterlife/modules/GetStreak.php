<?php

namespace atom\afterlife\modules;

use pocketmine\Player;
use pocketmine\utils\Config;

class GetStreak {

    private $plugin;
    private $streak;
    private $data = null;
    private $player = null;

    public function __construct($plugin, $player) {
        $this->plugin = $plugin;
        $this->player = $player;
        $path = $this->getPath();
        if(is_file($path)) {
            $data = yaml_parse_file($path);
            $this->data = $data;
            $this->streak = $data["kill-streak"];
            
        } else {
            return;
        }
    }

    public function getStreak() {
        return $this->streak;
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}