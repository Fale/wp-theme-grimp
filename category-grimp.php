<?php get_header(); ?>

	<div id="container">
		<div id="content-with-sidebar">

  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    		<div class="hentry post" id="post-<?php the_ID(); ?>">
    		  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'default'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    		  <?php edit_post_link(__( 'Edit this entry', 'default' ), '<small class="meta">', '</small>'); ?>
    			<div class="entry">
            <?php the_content(''); ?>
    			  <?php wp_link_pages(array('before' => '<div class="page-link clearfix"><strong>Pages:</strong>', 'after' => '</div>', 'next_or_number' => 'number', 'pagelink' => '<span>%</span>')); ?>
          </div>
    		</div>
    		
    		<?php if (get_option('greenpark2_comments_page_disable') != 'yes') { comments_template('', true); } ?>
  		
  		<?php endwhile; endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar("blog-widget-area"); ?>
<?php get_footer(); ?>
