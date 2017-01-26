<?php
/**
 * Template Name: Coaches Page
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scaffolding
 * @since Scaffolding 1.0
 */

get_header(); ?>

	<?php 
    query_posts(array( 
        'post_type' => 'coach',
        'showposts' => 10,
        'orderby' => 'asc'
    ) );  
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 clearfix'); ?> role="article">

				<header class="page-header">
					<div>
						<?php if ( has_post_thumbnail() ) : ?>
						    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						        <?php the_post_thumbnail(); ?>
						    </a>
						<?php endif; ?>
					</div>

					<h1 class="page-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
									
								</a>
					</h1>

				</header>

				<section class="page-content clearfix">

					<h2>
						Title Here	
					</h2>

					<h3> 
						Email Link Here	
					</h3>

					<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'scaffolding' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
					) ); ?>

				 </section>

				<?php
					  // If comments are open or we have at least one comment, load up the comment template
					  if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
					  endif;
				 ?>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/error' ); // WordPress template error message ?>

	<?php endif; ?>

<?php get_footer();
