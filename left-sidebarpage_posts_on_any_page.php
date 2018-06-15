<?php
/**
 * Template Name: Left Sidebar
 *
 * Add Wordpress Posts to any Page
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content">

        <div class="row">

            <?php get_sidebar( 'left' ); ?>

            <div
                 class="<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
                 id="primary">

                <main class="site-main" id="main" role="main">


                    <?php // Display blog posts on any page @ https://m0n.co/l
                    $temp = $wp_query; $wp_query= null;
                    $wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged);
                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>

                    <?php endwhile; ?>

                    <?php if ($paged > 1) { ?>

                    <nav id="nav-posts">
                        <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                        <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
                    </nav>

                    <?php } else { ?>

                    <nav id="nav-posts">
                        <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                    </nav>

                    <?php } ?>

                    <?php wp_reset_postdata(); ?>



                </main>

            </div><!-- #primary -->

        </div><!-- .row -->

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
