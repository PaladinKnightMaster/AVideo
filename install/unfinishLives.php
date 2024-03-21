<?php
require_once '../videos/configuration.php';

if (!isCommandLineInterface()) {
    return die('Command Line only');
}
ob_end_flush();
AVideoPlugin::loadPlugin('Live');

$stats = Live::getStats(true);

foreach ($stats as $server) {
    if (is_array($server) || is_object($server)) {
        foreach ($server as $live) {
            if (!empty($live->key)) {
                echo $live->key.PHP_EOL;
                $row = LiveTransmitionHistory::getLatest($live->key, @$live->live_servers_id);
                echo "{$row['id']} [{$row['finished']}] {$row['title']}".PHP_EOL;
                if (!empty($row['finished'])) {
                    echo "{$row['id']} [{$row['finished']}] Finishing".PHP_EOL;
                    LiveTransmitionHistory::unfinishFromTransmitionHistoryId($row['id']);
                }
            }else{
                echo "Error".PHP_EOL;
                var_dump($live);
            }
        }
    }
}
