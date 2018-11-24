<?php

namespace atom\afterlife\events;

use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class SetUpEvent implements Listener {

    private $plugin;
    private $player = null;



    public function __construct($plugin) {
        $this->plugin = $plugin;
        
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $this->player = $player->getName();

        $files = scandir($this->plugin->getDataFolder() . "players/");
        
        if (!in_array($player->getName().".yml", $files)) {
            $this->save();
        }
        $this->setText($this->player);
    }

    public function setText(string $name) {
        foreach($this->plugin->texts->getAll() as $loc => $type) {
        $pos = explode("_", $loc);
            if(isset($pos[1])) {
                $v3 = new Vector3((float) $pos[0],(float) $pos[1],(float) $pos[2]);
                $this->plugin->addText($v3, $type, [$this->plugin->getServer()->getPlayerExact($name)]);
            }

        }
    }

    public function getPath() {
        return $this->plugin->getDataFolder() . "players/" . $this->player . ".yml";
    }

    public function save() {
        yaml_emit_file($this->getPath(), ["name" => $this->player, "level" => 0, "xp" => 0, "kills" => 0, "deaths" => 0, "kill-streak" => 0, "kill/death-ratio" => 0]);
    }

}
