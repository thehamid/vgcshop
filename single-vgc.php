<?php
?>
    <div class="row">
        <?php
$args = array(
	'post_type'      => 'vgc',
	'posts_per_page' => 10,
);
$loop = new WP_Query($args);
while ( $loop->have_posts() ) {
	$loop->the_post();
	?>
	<div class="col-sm-4 col-md-3 col-lg-2">
		<?php the_title(); ?>
		<?php the_post_thumbnail(); ?>
	</div>
	<?php
}
?>
    </div>


