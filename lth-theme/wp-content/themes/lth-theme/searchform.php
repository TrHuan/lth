<?php
/**
 * Box search
 * 
 * @author LTH 
 * @since 2020
 */
?>

<div class="search-box">
    <div class="open-box d-md-none">
        <a href="#" title="" data_toggle="menu-content" class="menu-icon">
            <i class="far fa-search icon"></i>
        </a>
    </div>

    <div class="content-box">
        <div class="search-container">
            <div class="close-box d-md-none">
                <a href="#" title="" data_toggle="menu-content" class="menu-icon">
                    <i class="fal fa-times icon"></i>
                </a>
            </div>

            <form role="search" metho="get" class="forms search-form" action="<?php echo HOME_URI; ?>">
                <div class="form-content">
                    <div class="form-group">
                        <input type="text" name="s" placeholder="<?php echo __('Tìm kiếm...') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-search" aria-label="Search"><i class="far fa-search icon"></i></button>
                        <?php if (class_exists('WooCommerce')) { ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php } else { ?>
                            <input type="hidden" name="post_type" value="post">
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>