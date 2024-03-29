<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<!--[if IE 6]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" />
<![endif]-->

<meta name="robots" content="index,follow" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />

<?php
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'images.google.com'))
echo '<script language="JavaScript" type="text/javascript">
if (top.location != self.location) top.location = self.location;
</script>';
?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="home">
<div id="header" class="clearfix">
    <div class="alignright"><?php dynamic_sidebar('top-widget-area'); ?></div>
	<?php if (get_option('greenpark2_accessibility_disable') != 'yes')
	{
		echo('<ul id="accessibility">');
			if (get_option('greenpark2_accessibility_home') != 'yes')
			{
				echo '<li><a href="';
				echo get_option('home');
				echo '" title="';
				echo _e('Go to homepage', 'default');
				echo '">';
				echo _e('Home', 'default');
				echo '</a></li>';
			}
			if (get_option('greenpark2_accessibility_content') != 'yes')
			{
				echo '<li><a href="#content" title="Skip to content">';
				echo _e('Content', 'default');
				echo '</a></li>';
			}
			if (get_option('greenpark2_accessibility_feed') != 'yes')
			{
				echo '<li><a href="';
				if (get_option('greenpark2_feed_enable') == 'yes')
					echo 'http://feeds.feedburner.com/' . get_option('greenpark2_feed_uri');
				else
					echo get_bloginfo('rss2_url');
				echo '">RSS</a></li>';
			}
			if (get_option('greenpark2_accessibility_meta') != 'yes')
				wp_meta();
			if (get_option('greenpark2_accessibility_register') != 'yes')
				wp_register();
			if (get_option('greenpark2_accessibility_loginout') != 'yes')
			{
				echo '<li class="last-item">';
				echo wp_loginout();
				echo '</li>';
			}
		echo '</ul>';
	}?>
	<div id="branding">
		<h1 id="<?php if(get_option('greenpark2_logo_show')!= 'yes'){echo 'brand';}else{echo 'logo';}?>"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="description-<?php if(get_option('greenpark2_logo_show')!= 'yes'){echo 'brand';}else{echo 'logo';}?>">
		  <?php bloginfo('description'); ?>
    </div>
	</div>

	<div id="nav" class="clearfix">
		<div id="nav-search">
			<?php get_search_form(); ?>
		</div>
		<ul id="menu">
		<?php
		// Prepare home url
		if (function_exists('qtrans_getLanguage'))
    		$lang = qtrans_getLanguage();
        else
            $lang = '';
		if ($lang != 'it')
            $home_link = get_option('home') . '/' . $lang;
        else
            $home_link = get_option('home');
		?>
  		<li class="page-item-home <?php if ( $_SERVER['REQUEST_URI'] == '/' ) { ?> current_page_item <?php } ?>"><a href="<?php echo $home_link; ?>/">Home</a></li>
		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'depth' => 1, 'theme_location' => 'primary' ) ); ?>
		</ul>
    <div id="submenu-bg">
      <?php if ( !is_search() && !is_404() ) {
    		if($post->post_parent)
    		$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
    		else
    		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
    		if ($children) {
    		  echo "<ul id=\"submenu\">";
          echo $children;
          echo "</ul>";
  		  }
      } ?>
    </div>
	</div>

</div>


<div id="main" class="clearfix">
