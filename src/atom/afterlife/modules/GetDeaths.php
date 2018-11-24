<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class GetDeaths {

    private $plugin;
    private $deaths;
    private $data = null;
    private $player = null;

    public function __construct($plugin, $player) {
        $this->plugin = $plugin;
        $this->player = $player;
        $path = $this->getPath();
        if(is_file($path)) {
            $data = yaml_parse_file($path);
            $this->data = $data;
            $this->deaths = $data["deaths"];
            
        } else {
            return;
        }
    }

    public function getDeaths() {
        return $this->deaths;
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}
