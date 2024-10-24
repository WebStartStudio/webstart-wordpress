<div class="<?php zeka_print_archive_entry_class('wp-block wp-block-kubio-query-loop-item  position-relative wp-block-kubio-query-loop-item__container zeka-search__k__fx1L_l5Ny--container zeka-local-1054-container d-flex   '); ?>"" data-kubio="kubio/query-loop-item">
	<div class="position-relative wp-block-kubio-query-loop-item__inner zeka-search__k__fx1L_l5Ny--inner zeka-local-1054-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-2 v-inner-2">
		<div class="position-relative wp-block-kubio-query-loop-item__align zeka-search__k__fx1L_l5Ny--align zeka-local-1054-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
			<figure class="wp-block wp-block-kubio-post-featured-image  position-relative wp-block-kubio-post-featured-image__container zeka-search__k__6duco09NdG-container zeka-local-1055-container h-aspect-ratio--4-3 <?php zeka_post_missing_featured_image_class(); ?>" data-kubio="kubio/post-featured-image" data-kubio-settings="{{kubio_settings_value}}">
				<?php if(has_post_thumbnail()): ?>
				<img class='position-relative wp-block-kubio-post-featured-image__image zeka-search__k__6duco09NdG-image zeka-local--image' src='<?php echo esc_url(get_the_post_thumbnail_url());?>' />
				<?php endif; ?>
				<div class="position-relative wp-block-kubio-post-featured-image__inner zeka-search__k__6duco09NdG-inner zeka-local-1055-inner">
					<div class="position-relative wp-block-kubio-post-featured-image__align zeka-search__k__6duco09NdG-align zeka-local-1055-align h-y-container align-self-lg-center align-self-md-center align-self-center"></div>
				</div>
			</figure>
			<a class="position-relative wp-block-kubio-post-title__link zeka-search__k__yndIzn0LAb-link zeka-local-1056-link d-block" href="<?php echo esc_url(get_the_permalink()); ?>">
				<h3 class="wp-block wp-block-kubio-post-title  position-relative wp-block-kubio-post-title__container zeka-search__k__yndIzn0LAb-container zeka-local-1056-container" data-kubio="kubio/post-title">
					<?php the_title(); ?>
				</h3>
			</a>
			<div class="wp-block wp-block-kubio-post-meta  position-relative wp-block-kubio-post-meta__metaDataContainer zeka-search__k__Xy3_sNqX1-metaDataContainer zeka-local-1057-metaDataContainer h-blog-meta" data-kubio="kubio/post-meta">
				<span class="metadata-item">
					<a href="<?php echo esc_url(get_day_link(get_post_time( 'Y' ),get_post_time( 'm' ),get_post_time( 'j' ))); ?>">
						<span class="h-svg-icon">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="calendar-o" viewBox="0 0 1672.2646 1896.0833">
								<path d="M128 1664h1408V640H128v1024zM512 448V160q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v288q0 14 9 23t23 9h64q14 0 23-9t9-23zm768 0V160q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v288q0 14 9 23t23 9h64q14 0 23-9t9-23zm384-64v1280q0 52-38 90t-90 38H128q-52 0-90-38t-38-90V384q0-52 38-90t90-38h128v-96q0-66 47-113T416 0h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z" /></svg>
							</span>
							<?php echo esc_html(get_the_date('F j')); ?>
						</a>
					</span>
				</div>
				<p class="wp-block wp-block-kubio-post-excerpt  position-relative wp-block-kubio-post-excerpt__text zeka-search__k__fVTtKcA3Zp-text zeka-local-1058-text" data-kubio="kubio/post-excerpt">
					<?php zeka_post_excerpt(array (
  'max_length' => 16,
)); ?>
				</p>
			</div>
		</div>
	</div>
