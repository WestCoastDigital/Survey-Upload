<?php
/**
 * The Template for displaying all survey posts.
 *
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
                <div class="inside-article">
                    <?php do_action( 'generate_before_content'); ?>

                    <header class="entry-header">
                        <?php do_action( 'generate_before_entry_title'); ?>
                        <?php if ( generate_show_title() ) : ?>
                            <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                        <?php endif; ?>
                        <?php do_action( 'generate_after_entry_title'); ?>
                    </header><!-- .entry-header -->

                    <?php do_action( 'generate_after_entry_header'); ?>
                    <div class="entry-content" itemprop="text">
                        <?php 
                        
                        $surveys = rwmb_meta( 'survey_file' );
                        $user = intval( rwmb_meta( 'survey_user' ) );
                        $user_id = get_current_user_id();
                        $user_info = get_userdata($user);
                        
                        //var_dump($user_info);

                        foreach( $surveys as $survey ) {
                           $file = $survey['url'];
                        }

                        if ( $user_id == $user || is_admin() ) {
                            
                            echo '<h2>' . __( 'Welcome', 'wcd-survey' ) . ' <strong>' . $user_info->first_name . ' ' . $user_info->last_name . '</strong></h2>';
                            echo '<p>' . __( 'Please download your survey below', 'wcd-survey' ) . '</p>';
                            echo '<a class="button" href="' . $file . '">' . __( 'Download Your Survey', 'wcd-survey' ) . '</a>';

                        } else {

                            echo '<h2>' . __( 'You are not authorised to access this file, please login to get access or contact Administration', 'wcd-survey' ) . '</h2>';

                        } 
                        
                        ?>
                        
                        <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div><!-- .entry-content -->

                    <?php do_action( 'generate_after_entry_content' ); ?>
                    <?php do_action( 'generate_after_content' ); ?>
                </div><!-- .inside-article -->
            </article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();