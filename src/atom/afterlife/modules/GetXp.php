<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class GetXp {

    private $plugin;
    private $xp;
    private $data = null;
    private $player = null;

    public function __construct($plugin, $player) {
        $this->plugin = $plugin;
        $this->player = $player;
        $path = $this->getPath();
        if(is_file($path)) {
            $data = yaml_parse_file($path);
            $this->data = $data;
            $this->xp = $data["xp"];
            
        } else {
            return;
        }
    }

    public function getXp() {
        return $this->xp;
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

}
