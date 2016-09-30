<?php
/**
 * The theme's single file use for displaying single Books.
 * 
 * @since 1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Load any post-type specific hooks, if they exist
locate_template( '/includes/hooks/pat-books-hooks.php', true, true );

get_header();

the_post();
?>

<div class="row">

    <article id="page-<?php the_ID(); ?>" <?php post_class( array( 'columns', 'small-12' ) ); ?>>
        
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <div class="thumbnail alignleft">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                </div>
            </a>
        <?php endif; ?>

        <h1 class="page-title">
            <?php the_title(); ?>
        </h1>
        
        <?php if ( get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_sale', true ) ) : ?>
                        
            <p>
                <span class="on-sale"><?php echo _x( 'On Sale Now!', 'On Sale Now Text', THEME_ID ); ?></span>
            </p>

        <?php endif; ?>

        <?php the_content(); ?>

    </article>

    <?php if ( comments_open() ) : ?>

    <div class="columns small-12">
        <?php comments_template(); ?>
    </div>

    <?php endif; ?>
    
</div>

<?php get_footer();