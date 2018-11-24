<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class LevelCounter {

    private $plugin;
    private $level;
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
            $this->level = $data["level"];
            
        } else {
            return;
        }
    }

    public function addlevel($amount) {
        $this->level += $amount;
        $this->xp = 0;
        $this->save();
    }

    public function removelevel($amount) {
        $this->level -= $amount;
        $this->save();
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

    public function save() {
        yaml_emit_file($this->getPath(), ["name" => $this->player, "level" => $this->level, "xp" => $this->xp, "kills" => $this->kills, "deaths" => $this->deaths, "kill-streak" => $this->killStreak, "kill/death-ratio" => $this->ratio]);
    }
}
