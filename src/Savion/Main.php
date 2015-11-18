<?php
        /*   _       _________ _______  _______  _______ 
|\     /||\     /|( (    /|\__   __/(  ____ \(  ____ )(  ____ \
| )   ( || )   ( ||  \  ( |   ) (   | (    \/| (    )|| (    \/
| (___) || |   | ||   \ | |   | |   | (__    | (____)|| (_____ 
|  ___  || |   | || (\ \) |   | |   |  __)   |     __)(_____  )
| (   ) || |   | || | \   |   | |   | (      | (\ (         ) |
| )   ( || (___) || )  \  |   | |   | (____/\| ) \ \__/\____) |
|/     \|(_______)|/    )_)   )_(   (_______/|/   \__/\_______)
                                                               
                                                               */


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




class Main extends PluginBase implements Listener
{

public $setGame1 = array();
public $setGame2 = array();
public $setGame3 = array();
public $setGame4 = array();

public $Setter = array();

public $players1 = array(); //game1 players
public $players2 = array(); //game2 players
public $players3 = array(); //game3 players
public $players4 = array(); //game4 players

public $status1 = array();
public $status2 = array();
public $status3 = array();
public $status4 = array();
	       public function onEnable()
	       {
	    	@mkdir($this->getDataFolder());
		$this->config=new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
		$this->getServer()->getPluginManager()->registerEvents($this,$this);	
		$this->getServer()->getLogger()->info("[Hunters]Loaded!");
		}
		
		public function onCommand(CommandSender $sender, Command $command, $label, array $args)
	        {
		if(strtolower($command->getName()) === "setgame"){
			
		if(!$this->config->exists("game1") !$this->config->exists("game4") && !$this->config->exists("game2") && !$this->config->exists("game3")){
		$this->setGame1($sender);
		$sender->sendMessage("Please tap a sign!"); 
		return true;
		}
		
		if(!$this->config->exists("game2") && $this->config->exists("game1")){
		$this->setGame2($sender);
		$sender->sendMessage("Please tap a sign!"); 
		return true;
		}
		
		if(!$this->config->exists("game3") && $this->config->exists("game2") && $this->config->exists("game1")){
		$this->setGame3($sender);
		$sender->sendMessage("Please tap a sign!"); 
		return true;
		}
		
		if(!$this->config->exists("game4") && $this->config->exists("game2") && $this->config->exists("game3") && $this->config->exists("game1")){
		$this->setGame4($sender);
		$sender->sendMessage("Please tap a sign!"); 
		return true;
		}
		
		if($this->config->exists("game4") && $this->config->exists("game2") && $this->config->exists("game3") && $this->config->exists("game1")){
			
   		$sender->sendMessage("Max game count has already been set!");
		return false;
		}
		
		}
	        }
		
		//add gametask
		
		public function setGame1(PlayerInteractEvent $ev){
		$p = $ev->getPlayer();
		$block = $ev->getBlock();
		$levelname = $p->getLevel()->getName();
		if(isset($this->setGame1[$p->getName()])){
	
		switch($this->Setter[$p->getName()]){
		case 0:
			if($ev->getBlock()->getID() != 63 && $ev->getBlock()->getID() != 68){
				$sender->sendMessage("please tap a SIGN!");
					return;
				}
				
	                	$this->sign=array(
					"x" =>$block->getX(),
					"y" =>$block->getY(),
					"z" =>$block->getZ(),
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("sign",$this->sign);
				$this->config->save();
				break;
				
				case 1:
				$this->pos1=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					
					$this->game1=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos1",$this->pos1);
				$this->config->set("game1",$this->game1);
				$this->config->save();
				break;
				
				case 2:
				$this->pos2=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos2",$this->pos2);
				$this->config->save();
				break;
				
				case 3:
				$this->pos3=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos3",$this->pos3);
				$this->config->save();
				break;
				
				case 4:
				$this->pos4=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos4",$this->pos4);
				$this->config->save();
				break;
				
				case 5:
				$this->pos5=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos5",$this->pos5);
				$this->config->save();
				break;
				
				case 6:
				$this->pos6=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos6",$this->pos6);
				$this->config->save();
				break;
				
				case 7:
				$this->pos7=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					$this->Setter[$p->getName()]++;
				$this->config->set("pos7",$this->pos7);
				$this->config->save();
				break;
				
				case 8:
				$this->pos8=array(
					"x" =>$block->x,
					"y" =>$block->y,
					"z" =>$block->z,
					"level" =>$levelname,
					"game1");
					unset($this->Setter[$p->getName()]);
				$this->config->set("pos8",$this->pos8);
				$this->config->save();
				break;
		
		}
		
		}else{
		$sign = $p->getLevel()->getTile($block);
/* will this work? */if($sign === $this->config->get("sign") && $sign === $this->config->get("sign")["game1"] && !isset($this->players1[$p->getName()])){
		$this->addGamePlayer1($p);
		$p->setLevel($this->getServer()->getLevelByName($this->config->get("game1")["level"]));
		$p->teleport($this->config->get("game1"));
		$p->sendMessage("Joining!");
		foreach($this->players1 as $pl){
		$pl->sendMessage($p->getName()." Joined the match!");
		
		}
		//more todo
		}
		}
		
		}
		
		//add kills?
		
		public function setGame1(Player $p){
	        $this->setGame1[$p->getName()] = array("Player" => $p->getName());
		$this->Setter[$p->getName()]=0;
		}
		
		public function setGame2(Player $p){
        	$this->setGame2[$p->getName()] = array("Player" => $p->getName());
		$this->Setter[$p->getName()]=0;
		}
		
		public function setGame3(Player $p){
		$this->setGame3[$p->getName()] = array("Player" => $p->getName());	
		$this->Setter[$p->getName()]=0;
		}
		
		public function setGame4(Player $p){
		$this->setGame4[$p->getName()] = array("Player" => $p->getName());
		$this->Setter[$p->getName()]=0;
		}	
		
	public function addGamePlayer1(Player $p){
		$this->players1[$p->getName()] = array("Player" => $p->getName());
	}
	
	public function addGamePlayer2(Player $p){
		$this->players2[$p->getName()] = array("Player" => $p->getName());
	}
	
	public function addGamePlayer3(Player $p){
		$this->players3[$p->getName()] = array("Player" => $p->getName());
	}
	
	public function addGamePlayer4(Player $p){
		$this->players4[$p->getName()] = array("Player" => $p->getName());
	}
	
	public function addGamePlayer5(Player $p){
		$this->players5[$p->getName()] = array("Player" => $p->getName());
	}
		
}
