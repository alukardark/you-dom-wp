<?php get_header();?>
<div class="type-page" style="min-height: 230px; height: 60vh">
	<div class="wrapper">
	<?php
		global $more;
		while( have_posts() ) : the_post();
		the_content(); // выводим контент
		endwhile; 
	?>
	</div>
</div>
<?php
get_footer();