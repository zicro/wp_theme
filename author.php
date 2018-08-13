<?php get_header(); ?>
<div class="container author-page">
	<div class="author-main-info">
		<div class="row">
			<h1 class="profile-header text-center"><?php the_author_meta('nickname'); ?> Page</h1>
			<div class="col-md-3">
				<?php
					$avatar_args = array(
						'class' => 'img-responsive img-thumbnail center-block'
					);

					echo get_avatar(get_the_author_meta('ID'), 128, '', 'User Avatar', $avatar_args);
				?>
			</div>
			<div class="col-md-9">
				<ul class="list-unstyled">
					<li>First Name : <?php the_author_meta('first_name'); ?></li>
					<li>Last Name : <?php the_author_meta('last_name'); ?></li>
					<li>NickName : <?php the_author_meta('nickname'); ?></li>
				</ul>
				<hr>
				<?php
					if (get_the_author_meta('description')) {
						echo '<p>';
						the_author_meta('description');
						echo '</p>';
					}else{
						echo "no Bio";
					}
				?>
			</div>
		</div> <!-- end row --> 
	</div>
		<div class="row author-stats">
			<div class="col-md-3">
				<div class="stats">
					Post Counts
					<span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats">
					comments Counts
					<span><?php 
						$comnts_args = array(
							'user_id' => get_the_author_meta('ID'),
							'count' => true
						);
					echo get_comments($comnts_args); ?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats">
					Total post Views
					<span>100</span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats">
					Post Counts
					<span>00</span>
				</div>
			</div>
		</div> <!-- end row -->
		<div class="row">
			<?php
				$autor_posts_args = array(
					'author'		 => get_the_author_meta('ID'),
					'posts_per_page' => 5
				);

				$author_posts = new WP_Query($autor_posts_args);

				if ($author_posts->have_posts()) {
					while ($author_posts->have_posts()) {
						$author_posts->the_post();
				
			?>
		<div class="author-posts">
			<div class="col-sm-3">
				<?php the_post_thumbnail('', ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']); ?>
			</div>

			<div class="col-sm-9">
					<h3 class="post_title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<span class="post-date"><?php the_time('F j, Y'); ?></span>
					<span class="post-comments">
						<?php comments_popup_link('0 comment', '1 comment', '% comments', 'comment-url', ''); ?>
					</span>
					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
			<?php
				}
			}

			// show the latest author comments
			$comments_per_page = 6;
			$commente_args = array(
				'user_id' 		=> get_the_author_meta('ID'),
				'status' 		=> 'approve',
				'number'		=> $comments_per_page,
				'post_status'	=> 'publish',
				'post_type'		=> 'post'
			);

				$comments = get_comments($commente_args);

				
				

				if ($comments) {
					echo '<h3 class="author-comments-title">';

					if (get_comments($comnts_args) >= $comments_per_page) {
						echo 'latest '.$comments_per_page.' comments of ';

						the_author_meta('nickName');
					}else{
						echo 'latest comments of ';
						the_author_meta('nickname');
					}
				}
				echo "</h3>";

				foreach ($comments as $com) {
					?>
					<div class="author-comments">
						<h3 class="post-title">
							<a href="<?php echo get_permalink($com->comment_post_ID); ?>">
								<?php echo get_the_title($com->comment_post_ID); ?>
							</a>
						</h3>

						<span class="post-date">
							<?php echo 'Added On '.mysql2date('l, F j, Y', $com->comment_date); ?>
						</span>

						<div class="post-content">
							<?php echo $com->comment_content; ?>
						</div>
					</div>
				<?php	
				}

			?>
		</div>

</div>

<?php get_footer(); ?>

