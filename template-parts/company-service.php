<div class="pt-header">
    <h2><?php the_field('service_title','option') ?></h2>
    <p><?php the_field('service_desc','option') ?></p>
</div>

<div class="pt-main">
    <?php if( have_rows('service_list','option') ): ?>
    <div class="row">
        <?php while( have_rows('service_list','option') ): the_row(); 
            $image = get_sub_field('item_icon');
            ?>
        <div class="col-lg-3">
            <div class="loop">
                <div class="loop-image">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                </div>
                <div class="loop-content">
                    <h4><?php the_sub_field('item_title'); ?></h4>
                    <p><?php the_sub_field('item_desc'); ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>
