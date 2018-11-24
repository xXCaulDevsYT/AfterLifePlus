<?php

namespace atom\afterlife\modules;

use pocketmine\Player;

class KillCounter{

    private $plugin;
    private $level;
    private $xp;
    private $kills;
    private $deaths;
    private $killStreak;
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
            $this->level = $data["level"];
            $this->xp = $data["xp"];
            $this->kills = $data["kills"];
            $this->deaths = $data["deaths"];
            $this->killStreak = $data["kill-streak"];
            $this->ratio = $data["kill/death-ratio"];
            
        } else {
            return;
        }
    }

    public function addKill() {
        $this->kills += 1;
        $this->killStreak += 1;
        
        if ($this->plugin->config->get("use-levels") == true) {
            $this->plugin->addXp($this->player, $this->plugin->config->get("add-level-xp-amount"));
        }

        $this->save();
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

    public function save() {
        yaml_emit_file($this->getPath(), ["name" => $this->player, "level" => $this->level, "xp" => $this->xp, "kills" => $this->kills, "deaths" => $this->deaths, "kill-streak" => $this->killStreak, "kill/death-ratio" => $this->ratio]);
    }

}
