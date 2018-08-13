<?php
get_header();
include(get_template_directory().'/includes/breadcrumb.php');
?>

<div class="container post-page">
	<div class="row">
	<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
			
	?>
		<div class="col sm-6">
			<div class="main-post">
				<?php edit_post_link('edit <i class="fa fa-pencil"></i>'); ?>
				<h3 class="post-title">
				<?php the_title('')?>

				</h3>
				
				<span class="post-author"><?php the_author_posts_link() ?></span>
				<span class="post-date"><?php the_time('F j, Y') ?></span><br>
				<span class="post-comments"><?php comments_popup_link('0 Comments','1 comment','% comments') ?></span>
				<?php the_post_thumbnail('',['class'=> 'img-responsive img-thumbnail']) ?>
				<p class="post-content">
					<?php the_content(); ?></p>
				<hr>
			<p class="post-categories">
				<i class="fas fa-tag"></i>
				<?php the_category(', ') ?></p>
			<p class="post-tags">
				<i class="fas fa-tag"></i>
				<?php 
						if (has_tag()) {
							the_tags();
						}else{
							echo "tags : none";
						}

				 ?></p>
			</div>
			
		</div>
		<?php
			}
		}
		?>
		<div class="clearfix"></div>
		

		<?php
			// get post id => get_queried_object_id()
		// categories Id => wp_get_categories(get_queried_object_id())
			$random_posts_args = array(
				'posts_per_page'	=> 5,
				'orderby'			=> 'rand',
				'category__in'		=> wp_get_post_categories(get_queried_object_id()),
				'post__not_in'		=> array(get_queried_object_id())

			);

			$random_posts = new WP_Query($random_posts_args);

			if ($random_posts->have_posts()) {
				while ( $random_posts->have_posts()) {
			
					$random_posts->the_post();
		

		?>
			<div class="author-posts">
						<h3 class="post-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
					<hr>
			</div>

<?php
	}
}
		?>
		
		<!-- Author infos -->
		<div class="col-md-1">
			<?php 
				$avatar_args = array(
					'class' => 'img-responsive img-thumbnail'
				);
			echo get_avatar(get_the_author_meta('ID'), 64, '', 'User avatar', $avatar_args); ?>
		
			</div>
<div class="author-info">
			<h4>
			<?php
				/***
					the_author_meta( string $field = '', int $user_id = false )
					Outputs the field from the user’s DB object. Defaults to current post’s author.
				 **/
					 the_author_meta('first_name');
					 the_author_meta('last_name');

					 echo '<span class="nickname">(';
					 	the_author_meta('nickname');
					 echo ')</span>';
		    ?>
		</h4>
			

			<?php
			# check if the autor has set a biography
			## if yes then show it :p 
				if (get_the_author_meta('description')) {
					echo '<p>';
					the_author_meta('description');
					echo '</p>';
				}
			?>

			<p class="author-stats">
				user posts count : 
				<span class="posts-count">
					<?php echo count_user_posts(get_the_author_meta('ID')) ?>
				</span>
				User Profile Link  : <?php echo the_author_posts_link(get_the_author_meta('ID')) ?>

			</p>
</div>
		<hr class="comment-separator">
		<div class="post-page post-pagination">
				<?php
				// show previous and next page
				if (get_previous_post_link()) {
					previous_post_link('%link','Prev (%title)');
				}

				if (get_next_post_link()) {
					next_post_link('%link','Next (%title)');
				}
				
				?>
		</div>
		<hr class="comment-separator">
		
				<?php comments_template(); ?>
		
	</div>
</div>

<?php
get_footer();
?>

