<?php
/**
 * Books on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

// Ensure Filters on the Permalink happen
locate_template( '/includes/hooks/pat-books-hooks.php', true, true );

$site_url = get_bloginfo( 'url' );

$books = new WP_Query( array(
    'post_type' => 'pat-books',
    'posts_per_page' => 5,
) );

// Show only this many books (After the first one) on Mobile
// So, X + 1 where "X" is the value of this filter
$hide_on_mobile_at = apply_filters( 'pat-home-books-mobile-show', 2 );

if ( $books->have_posts() ) : 
    $books->the_post();

    $permalink = get_permalink(); ?>

    <div class="pat-books">
        
        <div class="row top-row">
        
            <article id="post-<?php the_ID(); ?>" <?php post_class( array(
                'columns',
                'small-12',
            ) ); ?>>
                
                <div class="row expanded">
                    
                    <?php // I wanted to avoid content duplication, but since the image height in this case can vary greatly I don't want to risk it ?>
                    <div class="small-12 medium-8 columns hide-for-medium">
                        
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        
                        <?php if ( get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_sale', true ) ) : ?>
                        
                            <p>
                                <span class="on-sale"><?php echo _x( 'On Sale Now!', 'On Sale Now Text', THEME_ID ); ?></span>
                            </p>
                        
                        <?php endif; ?>
                        
                    </div>
                    
                    <div class="small-12 medium-4 columns">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="small-12 medium-8 columns">
                        
                        <div class="hide-for-small-only">
                            
                            <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if ( get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_sale', true ) ) : ?>

                                <p>
                                    <span class="on-sale"><?php echo _x( 'On Sale Now!', 'On Sale Now Text', THEME_ID ); ?></span>
                                </p>

                            <?php endif; ?>
                        
                        </div>
                        
                        <?php the_content(); ?>
                        
                        <?php if ( strpos( $permalink, $site_url ) === false ) : ?>
                            <a href="<?php the_permalink(); ?>" class="button large primary" target="_blank">
                                <?php echo _x( 'Buy on Amazon', 'Amazon Link Text', THEME_ID ); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="button large primary">
                                <?php echo _x( 'View Book', 'View Book Button Text', THEME_ID ); ?>
                            </a>
                        <?php endif; ?>
                        
                    </div>
                    
                </div>
                
            </article>

            <?php if ( count( $books->posts ) > 1 ) : // Check if there's more than one. Any more go into their own Row. ?>
            
                </div>
        
                <div class="row bottom-row">

                <?php 
                
                $index = 0;
                while ( $books->have_posts() ) :
                    $books->the_post();
                    
                    $permalink = get_permalink();
                    
                    $post_classes = array( 'columns', 'small-12', 'medium-3' );
                    if ( $index >= $hide_on_mobile_at ) $post_classes[] = 'hide-for-small-only';
                    
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </a>
                            <br />
                        <?php endif; ?>
                        
                        <?php if ( get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_sale', true ) ) : ?>
                        
                            <p>
                                <span class="on-sale"><?php echo _x( 'On Sale Now!', 'On Sale Now Text', THEME_ID ); ?></span>
                            </p>
                        
                        <?php endif; ?>
                        
                        <?php if ( strpos( $permalink, $site_url ) === false ) : ?>
                            <a href="<?php the_permalink(); ?>" class="button hollow expanded primary" target="_blank">
                                <?php echo _x( 'Buy on Amazon', 'Amazon Link Text', THEME_ID ); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>" class="button hollow expanded primary">
                                <?php echo _x( 'View Book', 'View Book Button Text', THEME_ID ); ?>
                            </a>
                        <?php endif; ?>

                    </article>
                    
                <?php 
                
                    $index++;
                endwhile;

            endif; ?>
                    
        </div>
        
        <div class="row">
            
            <div class="small-12 columns">
        
                <a href="/books">
                    <?php echo _x( 'View All Books <span class="fa fa-arrow-right"></span>', 'View All Books Link Text', THEME_ID ); ?>
                </a>
                
            </div>
            
        </div>
        
    </div>

<?php else: ?>

    <div class="pat-books row">

        <div class="columns small-12">
            <?php echo _x( 'No Books Currently Added.', 'No Books Found Text', THEME_ID ); ?>
        </div>
        
    </div>

<?php endif;

wp_reset_postdata();