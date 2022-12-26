<?php
global $global, $config;
$global['isIframe'] = 1;
// is online
// recorder
// live users

$global['ignoreUserMustBeLoggedIn'] = 1;
if (!isset($global['systemRootPath'])) {
    $configFile = '../../videos/configuration.php';
    require_once $configFile;
}

$users_id = User::getId();
if (!empty($_REQUEST['key'])) {
    $isLive = 1;
    setLiveKey($_REQUEST['key'], @$_REQUEST['live_servers_id'], @$_REQUEST['live_index']);
} else if (User::isLogged()) {
    $isLive = 1;
    $lth = LiveTransmitionHistory::getLatestFromUser($users_id);
    setLiveKey($lth['key'], $lth['live_servers_id'], $lth['live_index']);
}

$html = '';
if (!empty($_REQUEST['user']) && !empty($_REQUEST['pass'])) {
    User::loginFromRequest();
    $html .= 'loginFromRequest ';
    if (User::isLogged()) {
        $html .= 'is Logged ';
    } else {
        $html .= 'is NOT Logged ';
    }
} else if (User::isLogged()) {
    if (isLive()) {
        //var_dump($livet, $getLiveKey, isLive());exit;
        if (AVideoPlugin::isEnabledByName('Chat2')) {

            $chat = new ChatIframeOptions();
            $chat->set_room_users_id($users_id);
            $chat->set_live_transmitions_history_id($latest['id']);
            $chat->set_iframe(1);
            $chat->set_noFade(1);
            $chat->set_bubblesOnly(1);
            $chat->set_addChatTextBox(1);
            $chat->set_doNotAllowUsersSendMessagesToEachOther(1);
            $iframeURL = $chat->getURL(true);

            $html = '<iframe 
        id="yptchat2Iframe"
        src="' . $iframeURL . '" 
        frameborder="0" scrolling="no" title="chat widget" 
        allowtransparency="true" 
        sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-forms allow-modals allow-orientation-lock allow-pointer-lock allow-presentation allow-top-navigation"
        style="
        outline: none; 
        visibility: visible; 
        resize: none; 
        box-shadow: none; 
        overflow: visible; 
        background: none transparent; 
        opacity: 1; 
        padding: 0px; 
        margin: 0px; 
        transition-property: none; 
        transform: none; 
        width: 100%; 
        z-index: 999999; 
        cursor: auto; 
        float: none; 
        border-radius: unset; 
        pointer-events: auto; 
        display: block; 
        height: 100vh;"></iframe>';

            //include "{$global['systemRootPath']}plugin/Chat2/index.php";
            //return false;
        }
        if (AVideoPlugin::isEnabledByName('LiveUsers')) {
            $html .= getLiveUsersLabelHTML();
            //$html .= '<div id="LiveUsersLabelLive">'.getLiveUsersLabelLive($livet['key'], $livet['live_servers_id']).'</div>';
            //$html .= '<div id="LiveUsersLabelLive">'.getLiveUsersLabelLive($lt['key'], $lt['live_servers_id']).'</div>';
            //$html .= getIncludeFileContent($global['systemRootPath'] . 'plugin/Live/view/menuRight.php');
            //var_dump($lt);exit;
        }
    }
} else {
    $html .= 'nothing to do ';
    if (User::isLogged()) {
        $html .= 'is Logged ';
    } else {
        $html .= 'is NOT Logged ';
    }
}
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <?php
        include $global['systemRootPath'] . 'view/include/head.php';
        ?>
        <style>
            #accessibility-toolbar, footer, #socket_info_container{
                display: none !important;
            }
            body {
                padding: 0;
            }

            .liveUsersLabel{
                position: fixed;
                top: 10px !important;
            }
            .liveUsersLabel{
                left: 20px !important;
            }
            #recorderToEncoderActionButtons{
                position: absolute;
                top: 40px;
                left: 0;
                width: 100%;
            }
        </style>
    </head>

    <body style="background-color: transparent;">
        <?php
        echo $html;
        if (AVideoPlugin::isEnabledByName('SendRecordedToEncoder')) {
            include $global['systemRootPath'] . 'plugin/SendRecordedToEncoder/actionButtonLive.php';
        }
        ?>
        <?php
        include $global['systemRootPath'] . 'view/include/footer.php';
        ?>
        <script>
            window.addEventListener("flutterInAppWebViewPlatformReady", function (event) {
                window.flutter_inappwebview.callHandler('AVideoMobileLiveStreamer', 'Loaded app');
            });

            function socketLiveONCallback(json) {
                console.log('socketLiveONCallback MobileManager', json);
                if ((json.users_id == '<?php echo User::getId(); ?>' && json.live_transmitions_history_id) || (!empty(json.key) && json.key == '<?php echo @$_REQUEST['key']; ?>')) {
                    modal.showPleaseWait();
                    var url = addGetParam(window.location.href, 'live_transmitions_history_id', json.live_transmitions_history_id);
                    url = addGetParam(url, 'key', json.key);
                    url = addGetParam(url, 'live_servers_id', json.live_servers_id);
                    url = addGetParam(url, 'live_schedule', json.live_schedule);
                    url = addGetParam(url, 'live_index', json.live_index);
                    document.location = url;
                }
            }
        </script>
    </body>
</html>