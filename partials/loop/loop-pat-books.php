<?php
/**
 * Loop Template for Pat Books
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/loop
 */

defined( 'ABSPATH' ) || die();

$site_url = get_bloginfo( 'url' );

if ( have_posts() ) : ?>

    <div class="row expanded">
        
        <div class="small-12 <?php echo ( is_active_sidebar( 'sidebar-main' ) ) ? 'medium-9': 'no-sidebar'; ?> columns">

            <?php while ( have_posts() ) :
                the_post();
                $permalink = get_permalink();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( array() ); ?>>

                    <div class="media-object stack-for-small">

                        <?php if ( has_post_thumbnail() ) : ?>

                            <div class="media-object-section">
                                <div class="thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    </a>
                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="media-object-section main-section">

                            <h1 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>

                            <?php if ( get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_sale', true ) ) : ?>

                                <p>
                                    <span class="on-sale"><?php echo _x( 'On Sale Now!', 'On Sale Now Text', THEME_ID ); ?></span>
                                </p>

                            <?php endif; ?>

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