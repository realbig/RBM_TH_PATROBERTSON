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

    <?php while ( have_posts() ) :
        the_post();
        $permalink = get_permalink();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( array(
            'columns',
            'small-12'
        ) ); ?>>

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

                    <?php the_excerpt(); ?>

                    <?php if ( strpos( $permalink, $site_url ) === false ) : ?>
                        <a href="<?php the_permalink(); ?>" class="button primary" target="_blank">
                            <?php echo _x( 'Buy on Amazon', 'Amazon Link Text', THEME_ID ); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="button primary">
                            <?php echo _x( 'Read More', 'Read More Text', THEME_ID ); ?>
                        </a>
                    <?php endif; ?>
                    
                </div>
                
            </div>

        </article>
    <?php endwhile; ?>
        
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