<?php
$objLive = AVideoPlugin::getDataObject("Live");
//Live::deleteStatsCache();
if ($objLive->allowMultipleLivesPerUser) {
    $onliveApplications = Live::getLivesOnlineFromKey($key);
    foreach ($onliveApplications as $value) {
        if (empty($value['key'])) {
            continue;
        }
        if (preg_match('/' . $trasnmition['key'] . '/', $value['key'])) {
            $onliveApplications[] = '<a class="btn btn-default btn-block live_' . $value['live_servers_id'] . '_' . $value['key'] . '" href="' . $value['href'] . '" target="_blank"><span class="label label-danger liveNow faa-flash faa-slow animated">' . __('LIVE NOW') . '</span> ' . $value['title'] . '</a>';
        }
    }
}
$islive = getLiveKey();
$liveStreamObject = new LiveStreamObject($islive['key'], $islive['live_servers_id'], @$_REQUEST['live_index'], 0);
$key = $liveStreamObject->getKeyWithIndex(true);

if (AVideoPlugin::isEnabledByName('PlayLists')) {
    $ps = Playlists_schedules::iskeyPlayListScheduled($key);
    if (!empty($ps)) {
        $key = $ps['cleankey'];
    }
}
if (AVideoPlugin::isEnabledByName('Rebroadcaster')) {
    $rb = Rebroadcaster::isKeyARebroadcast($key);;
    if (!empty($rb) && !empty($rb['videos_id'])) {
        $key = $rb['cleankey'];
    }
}
//var_dump(getLiveKey(), $islive, $key);exit;
?>
<style>
    #streamkey {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<div class="panel panel-default <?php echo getCSSAnimationClassAndStyle('animate__fadeInLeft', 'live'); ?>">
    <div class="panel-heading"><i class="fas fa-hdd"></i> <?php echo __("RTMP Settings"); ?> (<?php echo $channelName; ?>)</div>
    <div class="panel-body" style="overflow: hidden;">
        <div class="form-group">
            <label for="server"><i class="fa fa-server"></i> <?php echo __("Server URL"); ?>:</label>
            <?php
            getInputCopyToClipboard('server', Live::getRTMPLinkWithOutKey(User::getId()));
            ?>
            <!--
            <small class="label label-info"><i class="fa fa-warning"></i> <?php echo __("If you change your password the Server URL parameters will be changed too."); ?></small>
            -->
        </div>
        <div class="form-group">
            <label for="streamkey"><i class="fa fa-key"></i> <?php echo __("Stream name/key"); ?>: </label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a class="btn btn-default" href="<?php echo $global['webSiteRootURL']; ?>plugin/Live/?resetKey=1" data-toggle="tooltip" title="<?php echo __("This also reset the Chat and views counter"); ?>"><i class="fa fa-refresh"></i> <?php echo __("Reset Key"); ?></a>
                </span>
                <?php
                getInputCopyToClipboard('streamkey', $key);
                ?>
            </div>
        </div>
        <?php
        if (!empty($onliveApplications)) {
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo __('Active Livestreams'); ?>
                </div>
                <div class="panel-body myUsedKeys<?php echo $key; ?>">
                    <?php 
                    //echo json_encode($onliveApplications); 
                    ?>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="form-group <?php echo getCSSAnimationClassAndStyle('animate__fadeInLeft', 'live'); ?>">
            <label for="serverAndStreamkey"><i class="fa fa-key"></i> <?php echo __("Server URL"); ?> + <?php echo __("Stream name/key"); ?>:</label>
            <?php
            getInputCopyToClipboard('serverAndStreamkey', Live::getRTMPLink(User::getId()));
            ?>
        </div>
    </div>
</div>
<div class="tabbable-line <?php echo getCSSAnimationClassAndStyle('animate__fadeInLeft', 'live'); ?>">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#tabStreamMetaData"><i class="fas fa-key"></i> <?php echo __("Stream Meta Data"); ?></a>
        </li>
        <li class="">
            <?php
            $url = "{$global['webSiteRootURL']}plugin/Live/view/Live_schedule/uploadPoster.php";
            $url = addQueryStringParameter($url, 'live_schedule_id', @$_REQUEST['live_schedule_id']);
            $url = addQueryStringParameter($url, 'live_servers_id', @$_REQUEST['live_servers_id']);
            ?>
            <a style="cursor: pointer;" onclick="avideoModalIframe('<?php echo $url; ?>');"><i class="fas fa-images"></i> <?php echo __("Poster Image"); ?></a>
        </li>
        <?php
        if (empty($objLive->hideUserGroups)) {
        ?>
            <li class="">
                <a data-toggle="tab" href="#tabUserGroups"><i class="fas fa-users"></i> <?php echo __("User Groups"); ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
    <div class="tab-content">
        <div id="tabStreamMetaData" class="tab-pane fade in active">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fas fa-cog"></i> <?php echo __("Stream Settings"); ?></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="title"><?php echo __("Title"); ?>:</label>
                                <input type="text" class="form-control" id="title" value="<?php echo $trasnmition['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo __("Password Protect"); ?>:</label>
                                <?php
                                echo getInputPassword('password_livestream', 'class="form-control" autocomplete="off" autofill="off"  value="' . $trasnmition['password'] . '"', __("Password Protect"));
                                ?>
                            </div>
                            <?php
                            if (!empty($objLive->hidePublicListedOption)) {
                            ?>
                                <input id="listed" type="hidden" value="1" />
                            <?php
                            } else {
                            ?>
                                <div class="form-group">
                                    <span class="fa fa-globe"></span> <?php echo __("Make Stream Publicly Listed"); ?>
                                    <div class="material-switch pull-right">
                                        <input id="listed" type="checkbox" value="1" <?php echo !empty($trasnmition['public']) ? "checked" : ""; ?> onchange="saveStream();" />
                                        <label for="listed" class="label-success"></label>
                                    </div>
                                </div>
                                <?php
                            }
                            $SendRecordedToEncoderObjectData = AVideoPlugin::getDataObjectIfEnabled('SendRecordedToEncoder');
                            $SendRecordedToEncoderClassExists = class_exists('SendRecordedToEncoder');
                            $SendRecordedToEncoderMethodExists = method_exists('SendRecordedToEncoder', 'canAutoRecord');
                            if (
                                $SendRecordedToEncoderObjectData &&
                                $SendRecordedToEncoderClassExists &&
                                $SendRecordedToEncoderMethodExists
                            ) {
                                $SendRecordedToEncoderCanAutoRecord = SendRecordedToEncoder::canAutoRecord(User::getId());
                                $SendRecordedToEncoderCanApprove = SendRecordedToEncoder::canApprove(User::getId());
                                if ($SendRecordedToEncoderCanAutoRecord || ($SendRecordedToEncoderCanApprove && $SendRecordedToEncoderObjectData->usersCanSelectAutoRecord)) {
                                ?>
                                    <div class="form-group">
                                        <span class="fa fa-globe"></span> <?php echo __("Auto record this live"); ?>
                                        <div class="material-switch pull-right">
                                            <input id="recordLive" type="checkbox" value="1" <?php echo SendRecordedToEncoder::userApproved(User::getId()) ? "checked" : ""; ?> onchange="saveStream();" />
                                            <label for="recordLive" class="label-success"></label>
                                        </div>
                                    </div>
                            <?php
                                } else {
                                    if (!$SendRecordedToEncoderCanAutoRecord) {
                                        echo '<!-- Cannot auto record -->';
                                    }
                                    if (!$SendRecordedToEncoderCanApprove) {
                                        echo '<!-- Cannot approve -->';
                                    }
                                    if (!$SendRecordedToEncoderObjectData->usersCanSelectAutoRecord) {
                                        echo '<!-- Cannot Select AutoRecord -->';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="title"><?php echo __("Category"); ?>:</label>
                                <?php
                                echo Layout::getCategorySelect('categories_id', $trasnmition['categories_id']);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="description"><?php echo __("Description"); ?>:</label>
                                <textarea rows="6" class="form-control" id="description"><?php echo $trasnmition['description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-success btn-block btnSaveStream" id="btnSaveStream"><i class="fas fa-save"></i> <?php echo __("Save Stream Settings"); ?></button>
                </div>
            </div>
        </div>
        <div id="tabUserGroups" class="tab-pane fade">

            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __("Groups That Can See This Stream"); ?><br><small><?php echo __("Uncheck all to make it public"); ?></small></div>
                <div class="panel-body">
                    <?php
                    $ug = UserGroups::getAllUsersGroups();
                    foreach ($ug as $value) {
                    ?>
                        <div class="form-group">
                            <span class="fa fa-users"></span> <?php echo $value['group_name']; ?>
                            <div class="material-switch pull-right">
                                <input id="group<?php echo $value['id']; ?>" type="checkbox" value="<?php echo $value['id']; ?>" class="userGroups" <?php echo (in_array($value['id'], $groups) ? "checked" : "") ?> />
                                <label for="group<?php echo $value['id']; ?>" class="label-success"></label>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-success btnSaveStream" id="btnSaveStream"><i class="fas fa-save"></i> <?php echo __("Save Stream Settings"); ?></button>
                    <a href="<?php echo $global['webSiteRootURL']; ?>usersGroups" class="btn btn-primary"><span class="fa fa-users"></span> <?php echo __("Add more user Groups"); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>