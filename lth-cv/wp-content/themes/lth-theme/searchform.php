<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<form class="searchs-headers__ins" role="search" metho="get" action="<?php echo HOME_URI; ?>">
    <input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
    <button class="btn btn-search" aria-label="Search">
        <i class="fas fa-search icon"></i>
    </button>
    <input type="hidden" name="post_type" value="post">
</form>