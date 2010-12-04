<div id="sidebar">
	<ul class="sb-list clearfix">
  <?php if ( is_single() ) { ?>
  <li>
	  <ul class="sb-tools clearfix">
		  <?php previous_post_link('<li class="previous-post">%link</li>', '<span>' . (__('Previous Entry', 'default')) . '</span> %title'); ?>
		  <?php next_post_link('<li class="next-post">%link</li>', '<span>' . (__('Next Entry', 'default')) . '</span> %title'); ?>
	  </ul>	
  </li>
  <?php } 
  
  if (is_home())
    $sb = "blog-widget-area";
  else
    if (is_single())
      $sb = "blog-widget-area";
    else
      $sb = "primary-widget-area";

  if ( ! dynamic_sidebar( $sb ) ) : ?>

	<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
	<li class="currently-viewing">

	<?php /* If this is a 404 page */ if (is_404()) { ?>
	<?php /* If this is a category archive */ } elseif (is_category()) { ?>
	<p><?php _e('You are currently browsing the archives for the', 'default'); ?> <?php single_cat_title(''); ?> <?php _e('category', 'default'); ?>.</p>

	<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
	<p><?php _e('You are currently browsing the archives for the day', 'default'); ?> <?php the_time('l, F jS, Y'); ?>.</p>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<p><?php _e('You are currently browsing the archives for', 'default'); ?> <?php the_time('F, Y'); ?>.</p>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<p><?php _e('You are currently browsing the archives for the year', 'default'); ?> <?php the_time('Y'); ?>.</p>

	<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
	<p><?php _e('You have searched for', 'default'); ?> <strong>'<?php the_search_query(); ?>'</strong>.
  <?php _e('If you are unable to find anything in these search results, you can try one of these links', 'default'); ?>.</p>

	<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<p><?php _e('You are currently browsing the', 'default'); ?> <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives', 'default'); ?>.</p>

	<?php } ?>

	</li>
	<?php }?>

<?php endif;?>
</ul>

</div> <!-- #sidebar -->
