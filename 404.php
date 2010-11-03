<?php get_header(); ?>

	<div id="container">
		<div id="content-<?php if (get_option('greenpark2_sidebar_disable') == 'yes') { echo 'alone'; } else { echo 'with-sidebar'; }?>">

		  <?php include (TEMPLATEPATH . "/missing.php"); ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php if(get_option('greenpark2_sidebar_disable') == 'no') get_sidebar(); ?>
<?php get_footer(); ?>
