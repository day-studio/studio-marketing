
<div class="pt-header">
    <h2><?php the_field('founder_title','option') ?></h2>
    <p><?php the_field('founder_desc','option') ?></p>
</div>

<div class="pt-main">
    <?php if( have_rows('founder_career_list','option') ): ?>
        <ul class="keyvalue">
        <?php while( have_rows('founder_career_list','option') ): the_row();  ?>
            <li>
                <span><?php the_sub_field('item_period'); ?></span>
                <?php the_sub_field('item_desc'); ?>
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    <div class="image">
        <?php 
            $image = get_field('founder_photo','option');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
        ?>
    </div>
</div>
