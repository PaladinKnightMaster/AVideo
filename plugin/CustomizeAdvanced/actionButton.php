<?php
$videoAB = new Video('', '', $videos_id);
$trailer = $videoAB->getTrailer1();
//var_dump($_REQUEST);exit;
if (!isValidURL($trailer)) {
    if (empty($_REQUEST['playlist_id'])) {
        echo '<!-- invalid trailer URL -->';
        return false;
    } else {
        $trailer = PlayLists::getTrailerIfIsSerie($_REQUEST['playlist_id']);
    }
}
?>
<button type="button" class="btn btn-default no-outline" onclick="avideoModalIframe('<?php echo parseVideos($trailer, 1); ?>');" data-toggle="tooltip" title="<?php echo __("Trailer"); ?>">
    <i class="fa fa-video"></i> <?php echo __("Trailer"); ?>
</button>
