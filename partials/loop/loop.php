<?php
/**
 * Loop Template fallback
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/loop
 */

defined( 'ABSPATH' ) || die();

if ( have_posts() ) : ?>

    <div class="row expanded">
        
        <div class="small-12 <?php echo ( is_active_sidebar( 'sidebar-main' ) ) ? 'medium-9': 'no-sidebar'; ?> columns">

            <?php while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( array() ); ?>>

                    <div class="media-object stack-for-small">

                        <?php if ( has_post_thumbnail() ) : ?>

                            <div class="media-object-section">
                                <div class="thumbnail">
                                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="media-object-section main-section">

                            <h1 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>
                            <span class="timestamp"><span class="fa fa-clock-o"></span>&nbsp;<?php the_date(); ?></span>
                            <br />

                            <?php the_excerpt(); ?>

                            <a href="<?php the_permalink(); ?>" class="button primary">
                                <?php echo _x( 'Read More', 'Read More Text', THEME_ID ); ?>
                            </a>

                        </div>

                    </div>

                </article>
            <?php endwhile; ?>
            
        </div>
        
        <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    
            <div class="small-12 medium-3 columns">

                <?php dynamic_sidebar( 'sidebar-main' ); ?>

            </div>

        <?php endif; ?>
        
    </div>

    <div class="row expanded">

        <div class="columns small-12">
        <?php
            the_posts_pagination( array(
                'prev_text'          => _x( 'Previous Page', 'Previous Page Pagination Text', THEME_ID ),
                'next_text'          => _x( 'Next Page', 'Next Page Pagination Text', THEME_ID ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . _x( 'Page', 'Page Screen Reader Text', THEME_ID ) . ' </span>',
            ) );
            ?>
        </div>
        
    </div>

<?php else: ?>

    <div class="row expanded">

        <div class="columns small-12">
            <?php echo _x( 'Nothing found, sorry!', 'No Posts Found Text', THEME_ID ); ?>
        </div>
        
    </div>

<?php endif; ?>