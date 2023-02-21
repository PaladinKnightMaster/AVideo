<?php
global $global;

if (empty($global['systemRootPath'])) {
    $global['systemRootPath'] = dirname(__FILE__) . '/../../../';
}

require_once $global['systemRootPath'] . 'videos/configuration.php';
require_once $global['systemRootPath'] . 'plugin/Gallery/functions.php';

$users_id = User::getId();

if (empty($users_id)) {
    return;
}

if (empty($obj) || empty($obj->SubscribedTagsRowCount)) {
    $obj = AVideoPlugin::getDataObject('Gallery');
}
$tags = Tags_subscriptions::getAllFromUsers_id($users_id);

if (empty($tags)) {
    return;
}
$total = count($tags);
$itemsPerPage = 4;
$page = getCurrentPage();
$totalPages = ceil($total / $itemsPerPage);
if ($totalPages < $page) {
    $page = $totalPages;
}
?>
<!-- mainAreaChannel start -->
<div class="mainAreaTags">  
    <?php
    foreach ($tags as $value) {
        $_POST['disableAddTo'] = 0;
        $totalVideos = VideoTags::getAllVideosIdFromTagsId($value['tags_id']);
        if (empty($totalVideos)) {
            continue;
        }
        ?>
        <div class="clear clearfix">
            <h3 class="galleryTitle">
                <?php
                echo VideoTags::getButton($value['tags_id'], getVideos_id(),'btn-md', 'btn-link', 'btn-link', 'btn-link');
                ?>
            </h3>
            <div class="">
                <?php
                $countCols = 0;
                unset($_POST['sort']);
                $_POST['sort']['created'] = "DESC";
                $_REQUEST['current'] = 1;
                $_REQUEST['rowCount'] = $rowCount;
                $old_tags_id = @$_GET['tags_id'];
                $_GET['tags_id'] = $value['tags_id'];
                $videos = Video::getAllVideos("viewable");
                $_GET['tags_id'] = $old_tags_id;
                createGallerySection($videos);
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="col-sm-12" style="z-index: 1;">
    <?php
//getPagination($total, $page = 0, $link = "", $maxVisible = 10, $infinityScrollGetFromSelector="", $infinityScrollAppendIntoSelector="")
    echo getPagination($totalPages, $page, "{$global['webSiteRootURL']}plugin/Gallery/view/mainAreaTags.php", 10, ".mainAreaTags", ".mainAreaTags");
    ?>
</div>
<!-- mainAreaChannel end -->