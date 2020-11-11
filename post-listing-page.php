
<?php

/* 
Template Name: Recipy page
*/

$mkdf_sidebar_layout  = thelma_mikado_sidebar_layout();
$mkdf_grid_space_meta = thelma_mikado_get_meta_field_intersect('page_grid_space');
$mkdf_holder_classes  = !empty($mkdf_grid_space_meta) ? 'mkdf-grid-' . $mkdf_grid_space_meta . '-gutter' : '';

get_header();
thelma_mikado_get_title();
get_template_part('slider');
do_action('thelma_mikado_action_before_main_content');

?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="pd-page-recipy-wrapper">

	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<ul>

					<?php

					$terms = get_terms(array(
						'taxonomy' => 'recipy_categories',
						'hide_empty' => false,
						'post_type' => 'recipy',
						'orderby' => 'term_id',
						'order' => 'ASC',
						"parent" => 0,
					));

					foreach ($terms as $term) {
						$term_id = $term->id;
						$category = $term->name;
						$category_slug = $term->slug;
						$category_parent = $term->parent;
						$category_link = get_term_link($term->slug, 'recipy_categories');
						?>





						<li>
							<?php echo $category; ?>
							<ul>

								<?php if ($term->slug == 'type_rec') { ?>
									<?php $terms_child = get_terms(array(
										'taxonomy' => 'recipy_categories',
										'hide_empty' => false,
										'post_type' => 'recipy',
										'orderby' => 'term_id',
										'order' => 'ASC',
										'term' => 'diet_rec',
										'parent' => 121
									));

									foreach ($terms_child as $term_child) {
										$category_child = $term_child->name;
										$category_slug_child = $term_child->slug;
										$category_link_child = get_term_link($term_child->slug, 'recipy_categories');
										?>

										<li>
											<a href="<?php echo $category_link_child;  ?>"><?php echo $category_child; ?></a>
										</li>

									<?php } ?>
								<?php } ?>
							</ul>

							<ul>

								<?php if ($term->slug == 'diet_rec') { ?>
									<?php $terms_child = get_terms(array(
										'taxonomy' => 'recipy_categories',
										'hide_empty' => false,
										'post_type' => 'recipy',
										'orderby' => 'term_id',
										'order' => 'ASC',
										'term' => 'diet_rec',
										'parent' => 122
									));

									foreach ($terms_child as $term_child) {
										$category_child = $term_child->name;
										$category_slug_child = $term_child->slug;
										$category_link_child = get_term_link($term_child->slug, 'recipy_categories');
										?>

										<li>
											<a href="<?php echo $category_link_child;  ?>"><?php echo $category_child; ?></a>
										</li>

									<?php } ?>
								<?php } ?>
							</ul>

							<ul>

								<?php if ($term->slug == 'function_rec') { ?>
									<?php $terms_child = get_terms(array(
										'taxonomy' => 'recipy_categories',
										'hide_empty' => false,
										'post_type' => 'recipy',
										'orderby' => 'term_id',
										'order' => 'ASC',
										'term' => 'diet_rec',
										'parent' => 123
									));

									foreach ($terms_child as $term_child) {
										$category_child = $term_child->name;
										$category_slug_child = $term_child->slug;
										$category_link_child = get_term_link($term_child->slug, 'recipy_categories');
										?>

										<li>
											<a href="<?php echo $category_link_child;  ?>"><?php echo $category_child; ?></a>
										</li>

									<?php } ?>
								<?php } ?>
							</ul>
						</li>





					<?php } ?>

				</ul>
			</div>


			<div class="col-lg-9">
				<div class="row">

					<?php
					$recipies  = new WP_Query(array("orderby" => "date", "post_type" => "recipy", "order" => "DESC"));
					if ($recipies->have_posts()) :
						while ($recipies->have_posts()) :
							$recipies->the_post();

							?>

							<div class="col-lg-4">
								<div class="pd-recipy-card">
									<img src="<?php the_post_thumbnail_url(); ?>">
									<?php the_title(); ?>
								</div>
							</div>

							<?php
						endwhile;
					endif;
					?>
				</div>
			</div>

		</div>
	</div>
</div>




<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<?php get_footer(); ?>