<?php
get_header();
?>
only for it 
<div class="container home-page">
	<div class="row">
				<div class="category-information text-center ">
			<div class="col-md-4">
				<h1 class="category-title"><?php single_cat_title(); ?></h1>
			</div>
			<div class="col-md-4">
				<p class="category-description"><?php echo category_description(); ?></p>
			</div>
			<div class="col-md-4">
				<div class="cat-stats">
					<span>Articles Count : 00</span>
					<span>Comments Count : 00</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="row">
<div class="col-md-9">

	<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
			
	?>
		<div class="col sm-6">
			<div class="main-post">
				<h3 class="post-title">
				<a href="<?php the_permalink() ?>"><?php the_title('')?></a>
				</h3>
				<span class="post-author"><?php the_author_posts_link() ?></span>
				<span class="post-date"><?php the_time('F j, Y') ?></span><br>
				<span class="post-comments"><?php comments_popup_link('0 Comments','1 comment','% comments') ?></span>
				<?php the_post_thumbnail('',['class'=> 'img-responsive img-thumbnail']) ?>
				<p class="post-content"><?php //the_content('{Read +++}') // used for show data (method 1)
												the_excerpt(); ?></p>
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
		<div class="post-pagination">
				<?php
				// show previous and next page
				if (get_previous_posts_link()) {
					previous_posts_link('Prev ');
				}else{
					echo "<span class='prev-span'>Prev </span>";
				}

				if (get_next_posts_link()) {
					next_posts_link(' Next');
				}else{
					echo "<span class='next-span'> Next</span>";
				}
				
				?>
		</div>
	</div>
		<div class="col-md-3">
			<div class="unc-sidebar">
			<?php
				/*if (is_active_sidebar('main-sidebar')) {
					dynamic_sidebar('main-sidebar');
				}*/

				get_sidebar('unc');
			?>
			</div>
		</div>	
	</div> <!-- End row -->
	
	<div class="pagination-numbers">
			<?php echo numbering_pagination(); ?>
		</div>
</div>
<?php
get_footer();
?>

