<?php
get_header('paper'); 

?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) :the_post(); ?>

<style>
    @page {
        size: A4
    }

</style>
<main class="sheet padding-10mm cover">
    <?php get_template_part( 'template-parts/estimate-header'); ?>
    <div class="estimate-main">
        <div class="abstract">
            <h3 class="title">project estimate</h3>
            <ul class="info">
                <li>데이스튜디오</li>
                <li><?php the_title(); ?></li>
            </ul>
            <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
        </div>
    </div>
    <?php get_template_part( 'template-parts/estimate-footer'); ?>
</main>

<main class="sheet padding-10mm">
    <?php get_template_part( 'template-parts/estimate-header'); ?>
    <div class="estimate-main">
        <div class="row client">
            <div class="col-3">
                <h6>To</h6>
            </div>
            <div class="col-9">
                <ul>
                    <li><?php the_field('client_name'); ?></li>
                    <li><?php the_field('client_company'); ?></li>
                    <li><?php the_field('client_contact'); ?></li>
                </ul>
            </div>
        </div>
        <div class="row detail">
            <div class="col-3">
                <div class="side">
                    <p><strong>웹사이트 구축 <br>견적서</strong></p>
                    <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                </div>
            </div>
            <div class="col-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>분류</th>
                            <th>내용</th>
                            <th class="cost">금액(원)</th>
                        </tr>
                    </thead>
                    <tbody id="spec">
                        <?php if( have_rows('spec') ): ?>
                            <?php $subTotal = 0 ?>
                            <?php while( have_rows('spec') ): the_row(); ?>
                                
                                <tr >
                                    <th><?php the_sub_field('title'); ?></th>
                                    <td><?php the_sub_field('desc'); ?></td>
                                    <td class="cost">

                                        <?php 
                                            $price = get_sub_field('price');
                                            $subTotal = $subTotal + $price;
                                            $formattedPrice = number_format($price);
                                            echo $formattedPrice;
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                    <?php 
                        $vat = $subTotal *0.1;
                        $grandTotal = $subTotal + $vat;
                        $formattedSubTotal = number_format($subTotal);
                        $formattedVAT = number_format($vat);
                        $formattedGrandTotal = number_format($grandTotal);
                    ?>
                    <tfoot>
                        <tr>
                            <th colspan="2">Sub Total</th>
                            <td class="cost" id="subtotal">
                                <?php echo $formattedSubTotal ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2">VAT(10%)</th>
                            <td class="cost" id="vat">
                                <?php echo $formattedVAT ?>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2">Total</th>
                            <td class="cost" id="total">
                                <?php echo $formattedGrandTotal ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php if(get_field('misc')) : ?>
                    <div class="misc">
                        <?php the_field('misc') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/estimate-footer'); ?>
</main>
<?php endwhile; ?>
<?php else : ?>
no post
<?php endif; ?>
<?php get_footer('paper'); ?>
