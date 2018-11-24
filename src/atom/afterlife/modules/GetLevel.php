<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class GetLevel {

    private $plugin;
    private $level;
    private $data = null;
    private $player = null;

    public function __construct($plugin, $player) {
        $this->plugin = $plugin;
        $this->player = $player;
        $path = $this->getPath();
        if(is_file($path)) {
            $data = yaml_parse_file($path);
            $this->data = $data;
            $this->level = $data["level"];
            
        } else {
            return;
        }
    }

    public function getlevel() {
        return $this->level;
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}
