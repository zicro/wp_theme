<?php

if (comments_open()) {

		comments_number('0 Comments','1 Comment','% Comments');

	echo '<ul class="list-unstyled comments-list">';
		$comments_arguments = array(
			'max_depth' 	=> 3,
			'type' 			=> 'comment',
			'avatar_size'	=> 64
		);
		wp_list_comments($comments_arguments);
	echo '</ul> <hr class="comment-separator">';

// when you want to change the structure you must input this variable as a parameter to the comment_form(); functions
		$commentsform_args = array( 

			'fields' => array(
				'author' => '<div class="form-group"><label>Name</label>The name Field</div>', 
				'email' => '<div class="form-group"><label>Email</label>The Email Field</div>', 
				'url' => '<div class="form-group"><label>Url</label>The name Field</div>' 
			),
			'comment_field' => '<div class="form-group">Textarea</div>' 
		);

		$commentsform_args2 = array(
			'title_reply'		 	=> 'Add Your Comment',
			'title_reply_to'	 	=> 'Add a Reply to [%s]',
			'class_submit'	 	 	=> 'btn btn-primary btn-md',
			'comment_notes_before'	=> 'Add Your Comment'
		);

	comment_form($commentsform_args2);

}else{
	echo "no comments yet";
}