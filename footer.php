<?php 
$www = get_stylesheet_directory_uri();
?>   

<footer class="site-footer">
    <div class="footer-branding">
        <img src="<?php echo $www; ?>/images/logo.svg">
    </div>
    
    <h6>  All Rights Reserved. ⓒ 2021 </h6>
</footer>
<aside class="fill-background"></aside>
<!--js scroll-->
<div class="cursor"></div>
    <?php wp_footer(); ?>
</body>

<script src="<?php echo $www ?>/vendors/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo $www ?>/vendors/bootstrap4/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $www;?>/vendors/barba/barba.umd.js"></script>
<script src="<?php echo $www;?>/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $www;?>/vendors/smooth-scrollbar/smooth-scrollbar.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/gsap.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/ScrollTrigger.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/ScrollToPlugin.min.js"></script>
<script src="<?php echo $www;?>/vendors/gsap/CSSRulePlugin.min.js"></script>
<script src="<?php echo $www;?>/js/navigation.js"></script>
<script src="<?php echo $www;?>/js/contents.js"></script>
<script src="<?php echo $www;?>/js/scroll.js"></script>
<script src="<?php echo $www;?>/js/wp.js"></script>
<script src="<?php echo $www;?>/js/typography.js"></script>
<script src="<?php echo $www;?>/js/app.js" defer></script> 
</html>