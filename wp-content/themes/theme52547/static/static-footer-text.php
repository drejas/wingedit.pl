<?php /* Static Name: Footer text */ ?>
<div id="footer-text" class="footer-text">
	<?php $myfooter_text = of_get_option('footer_text'); ?>
	<?php if($myfooter_text){?>
		<?php echo of_get_option('footer_text'); ?>
	<?php } else { ?>
		<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a> &copy; <?php echo date('Y'); ?>. <span><a href="<?php echo home_url(); ?>/polityka-prywatnosci/" title="<?php echo theme_locals('privacy_policy'); ?>">Polityka Prywatności</a></span> | 
	<?php } ?>
	<?php if( true ) { ?>
		Created by <a rel="follow" href="http://infinityconsulting.pl/" target="_blank">infinityconsulting.pl</a>
	<?php } ?>
</div>