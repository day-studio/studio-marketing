

<a class="loop fade-item" href="<?php the_field('project_url');?>" target="_blank">
    <figure class="loop--image">
        <?php 
            $image = get_field('project_screenshot_primary');
            $size = 'screen_square'; 
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }else{
                echo "<img src='http://via.placeholder.com/1200x1200'>";
            }
        ?>
    </figure>
    <div class="loop--desc">
        <h5><?php the_title(); ?></h5>     
        <!-- <p class="sm"><?php the_field('project_title_en');?></p>               -->
    </div>
</a>