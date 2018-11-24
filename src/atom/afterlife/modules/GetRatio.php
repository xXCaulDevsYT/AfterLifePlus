<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class GetRatio {

    private $plugin;
    private $kills;
    private $deaths;
    private $ratio;
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
            $this->deaths = $data["deaths"];
            
        } else {
            return;
        }
    }

    public function getRatio() {
        if ($this->deaths > 0){
            return round(($this->kills / $this->deaths), 1);
        } else {
            return 1;
        }
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}
