<?php get_header(); ?>

	<div id="container">
		<div id="content-with-sidebar">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<small class="meta">
  			<span class="alignleft">
          <?php the_time(__('F jS, Y', 'default')) ?> <?php _e('by', 'default'); ?> <?php the_author() ?>
          <?php edit_post_link(__( 'Edit this entry', 'default' ), ' | ', ''); ?>
  			</span>
        <a href="#comments" class="alignright button-style" rel="nofollow"><?php _e('Leave a reply', 'default'); ?> &raquo;</a>
      </small>

			<div class="entry">
				<?php the_content(); ?>
				<?php $c = 0;
foreach (get_the_category() as $category)
	if ($category->slug == "grimp")
		$c = 1;
if ($c == 0)
	_e("[:it]ATTENZIONE: Quanto scritto in questo articolo rappresenta il punto di vista dell'autore stesso e potrebbe non rappresentare il punto di vista dell'azienda. È possibile che quanto scritto sia addirittura contrastante con il punto di vista dell'azienda sull'argomento.[:en]WARNING: This article represents the views of the author and may not represent the company point of view. It is possible that what is written in the article is actually contrary to the views of the company on the subject.");
 ?>

				<?php wp_link_pages(array('before' => '<div class="page-link clearfix"><strong>Pages:</strong>', 'after' => '</div>', 'next_or_number' => 'number', 'pagelink' => '<span>%</span>')); ?>

      	<ul class="previousnext clearfix">
      		<?php previous_post_link('<li class="previous_post">%link</li>', '<span>' . (__('Previous Entry', 'default')) . ':</span> %title'); ?>
      		<?php next_post_link('<li class="next_post">%link</li>', '<span>' . (__('Next Entry', 'default')) . ':</span> %title'); ?>
      	</ul>
			</div>

			<div class="postmetadata">
  			<?php the_tags('<p class="tags">Tags: ', ' ', '</p>'); ?>
        <p class="infos">
						<?php _e('You can follow any responses to this entry through the', 'default'); ?> <a href="<?php echo get_post_comments_feed_link() ?>" rel="nofollow"><?php _e('RSS 2.0 Feed', 'default'); ?></a>. 

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php _e('You can', 'default'); ?> <a href="#respond"><?php _e('leave a response', 'default'); ?></a> <?php _e(', or', 'default');?> <a href="<?php trackback_url(); ?>" rel="trackback nofollow"><?php _e('trackback', 'default'); ?></a> <?php _e('from your own site', 'default'); ?>.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can', 'default'); ?> <a href="<?php trackback_url(); ?> " rel="trackback nofollow"><?php _e('trackback', 'default'); ?></a> <?php _e('from your own site', 'default'); ?>.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'default'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.', 'default'); ?>

						<?php } edit_post_link(__( 'Edit this entry', 'default' ),'','.'); ?>
					</p>
				</div>

		</div>

  	<?php comments_template('', true); ?>

	<?php endwhile; else: ?>

    <?php include (TEMPLATEPATH . "/missing.php"); ?>

<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
