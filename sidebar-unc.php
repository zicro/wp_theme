<?php
################# get categories Comments Counts
		$comments_args = array(
			'status'	=> 'approve'
		);

		$comments_count = 0;
		$all_comments = get_comments($comments_args);

		foreach ($all_comments as $comment) {
			$post_id = $comment->comment_post_ID;
			if (! in_category('uncategorized', $post_id)) {
				continue;
			}
			$comments_count++;
		}

################# get categories Posts Counts

		$cat = get_queried_object(); // get full object properties
		$posts_count = $cat->count;


?>
<div class="sidebar-linux">
	<div class="widget">
		<h3 class="widget-title"><?php single_cat_title(); ?> Statistics</h3>
			<div class="widget-content">
				<ul>
					<li>
						<span>Comments Count : </span> <?php echo $comments_count; ?>
					</li>
					<li>
						<span>Articles Count : </span> <?php echo $posts_count; ?>
					</li>
				</ul>
		</div>
	</div>

	<div class="widget">
		<h3 class="widget-title">Latest PHP posts</h3>
			<div class="widget-content">
				<?php
					$posts_args = array(
						'posts_per_page'	=> 5,
						'cat'				=> 1
					);

					$query = new WP_Query($posts_args);

					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
							?>
							<li><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php		
						}
					}
				?>
		</div>
	</div>

	<div class="widget">
		<h3 class="widget-title">Hot posts by comments</h3>
			<div class="widget-content">
				<?php
					$hot_posts_args = array(
						'posts_per_page'		=> 1,
						'orderby'				=> 'comment_count'
					);

					$hot_query = new WP_Query($hot_posts_args);

					if ($hot_query->have_posts()) {
						while ($hot_query->have_posts()) {
							$hot_query->the_post();
							?>
							<li><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<hr>
							<?php comments_popup_link('0 Comments', 'One Comment', '% Comments', 'comment-url', 'Comments Disabled'); ?>
					<?php		
						}
						wp_reset_postdata(); // clear the data of the loop while from the memory (garbage collector)
					}
				?>
		</div>
	</div>
</div>