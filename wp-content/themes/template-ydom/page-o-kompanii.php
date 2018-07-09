<?php get_header();?>
<div class="type-page">
	<div class="wrapper">
	<?php
		while( have_posts() ) : the_post();
		the_content(); // выводим контент
		endwhile;
	?>
	</div>
</div>
<?php
get_footer();