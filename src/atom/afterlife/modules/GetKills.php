<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class GetKills{

    private $plugin;
    private $kills;
    private $data = null;
    private $player = null;

    public function __construct($plugin, $player) {
        $this->plugin = $plugin;
        $this->player = $player;
        $path = $this->getPath();
        if(is_file($path)) {
            $data = yaml_parse_file($path);
            $this->data = $data;
            $this->kills = $data["kills"];
            
        } else {
            return;
        }
    }

    public function getKills() {
        return $this->kills;
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}
