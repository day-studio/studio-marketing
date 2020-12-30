
<div class="pt-header">
    <h2><?php the_field('project_title_en') ?></h2>

    <h5><?php the_title(); ?></h5>
    <p><?php the_field('project_type') ?></p>
    <p><?php the_field('project_url') ?></p>
    
</div>

<div class="pt-main">
    <!-- <div class="screen-mobile screen">
        <?php 
            $image = get_field('project_screenshot_mobile');
            $size = 'full'; 
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
        ?>
    </div> -->
    <div class="screen-primary screen">
        <?php 
            $image = get_field('project_screenshot_primary');
            $size = 'screen_square'; // thumbnail, medium, large, full 
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            } else{
                echo "<img src='http://via.placeholder.com/1600x1600'>";
            }
        ?>

    </div>
    <div class="screen-secondary screen">
        <?php 
            $image = get_field('project_screenshot_secondary');
            $size = 'screen_scroll'; // thumbnail, medium, large, full 
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }else{
                echo "<img src='http://via.placeholder.com/800x2400'>";
            }
        ?>

    </div>
</div>



<div class="pt-footer">
    <p class="date"><?php echo get_the_date('Y.m'); ?></p>
</div>


<!-- 
         <p><?php the_field('project_brief') ?></p>
        <?php 
            $image = get_field('project_key_visual');
            $size = 'full'; 
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
        ?>
        <?php the_field('project_testimonial') ?> -->
