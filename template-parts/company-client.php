<div class="pt-header">
    <h2><?php the_field('client_title','option') ?></h2>
    <p><?php the_field('client_desc','option') ?></p>
</div>

<div class="pt-main">
    <?php if( have_rows('client_list','option') ): ?>
        <ul class="client_list">
        <?php while( have_rows('client_list','option') ): the_row(); 
            $image = get_sub_field('item_logo');
            ?>
            <li>
                <a target="_blank" href="<?php the_sub_field('item_url'); ?>" alt="<?php the_sub_field('item_title'); ?>"><?php echo wp_get_attachment_image( $image, 'full'); ?></a> 
            </li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>

