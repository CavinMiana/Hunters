<?php

namespace Savion;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\event\Listener;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;


use pocketmine\scheduler\PluginTask;
use pocketmine\scheduler\CallbackTask;

use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;

use pocketmine\math\Vector3;

use pocketmine\block\Block;

use pocketmine\tile\Sign;
use pocketmine\tile\Tile;

use pocketmine\level\Position;
use pocketmine\level\Level;

use pocketmine\event\player\PlayerInteractEvent;


public $setGame1 = array();
public $setGame2 = array();
public $setGame3 = array();
public $setGame4 = array();

public $Setter = array();

public $players1 = array();
public $players2 = array();
public $players3 = array();
public $players4 = array();

class Main extends PluginBase implements Listener
{

	    public function onEnable()
	    {
		$this->getServer()->getPluginManager()->registerEvents($this,$this);	
		$this->getServer()->getLogger()->info("[Hunters]Loaded!");
		}
		
		public function onCommand(CommandSender $sender, Command $command, $label, array $args)
	    {
		if(strtolower($command->getName()) === "setgame"){
		if(!$this->config->exists("game1")){
		$this->setGame1($sender);
		$sender->sendMessage("Please tap a sign!"); 
		}
		
		}
		
		}
		
		public function onInteract(PlayerInteractEvent $ev){
		$p = $ev->getPlayer();
		
		if(in_array($this->setGame1,$p->getName()){
		//todo
		switch($this->Setter[$p->getName()]){
		case 0:
			if($event->getBlock()->getID() != 63 && $event->getBlock()->getID() != 68)
				{
					return;
				}
	                	$this->sign=array(
					"x" =>$block->getX(),
					"y" =>$block->getY(),
					"z" =>$block->getZ(),
					"level" =>$levelname);
				$this->config->set("sign",$this->sign);
				$this->config->save();
				break;
				
				case 1:
				$this->pos1=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname);
				$this->config->set("pos1",$this->pos1);
				$this->config->save();
				break;
		
		}
		
		}
		}
		
		public function setGame1(Player $p){
		$this->setGame1 = array("Player" => $p->getName());		
		}
		
		public function setGame2(Player $p){
		$this->setGame2 = array("Player" => $p->getName());		
		}
		
		public function setGame3(Player $p){
		$this->setGame3 = array("Player" => $p->getName());		
		}
		
		public function setGame4(Player $p){
		$this->setGame4 = array("Player" => $p->getName());		
		}	
		
		}
