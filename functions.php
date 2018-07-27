#function to add Style files

function xlion_add_styles(){
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri().'/css/font-awesome.min.css');
}

# function to add scripts js file

function xlion_add_scripts(){
	wp_enqueue_script('bootstrap-js', get_template_directory_uri(). '/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('main-js', get_template_directory_uri(). '/js/main.js', array(), false, true);
}