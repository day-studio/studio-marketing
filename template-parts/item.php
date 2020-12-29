            <div class="item">
                <a href="<?php the_permalink();?>/">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php echo get_the_post_thumbnail(); ?>
                    <?php else : ?>
                        <img src="http://via.placeholder.com/800x800/ ">
                    <?php endif; ?>		
                </a>    
                <h4>
                
                </h4>
            </div>
