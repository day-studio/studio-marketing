<li>
    <a href="<?php the_permalink();?>">
        <span class="client">
            <?php the_field('proposal_success_client') ?>
        </span>
        <span class="title">
            <?php the_title(); ?>
        </span>
        <br>
        <?php  $output = get_field('proposal_price'); ?>
        <span class="price">
            <?php
                if($output){
                    $price = number_format( $output, 0, ',', ',');
                    echo $price;
                }
            ?>
        </span>
    </a>
</li>