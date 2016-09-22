<?php
/**
 * Displays Books Archive.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Load any post-type specific hooks, if they exist
locate_template( '/includes/hooks/pat-books-hooks.php', true, true );

get_header();

$site_url = get_bloginfo( 'url' );

?>

<h1 class="page-title columns small-12">
    <?php post_type_archive_title( '' ); ?>
</h1>

<?php
the_archive_description( '<div class="taxonomy-description columns small-12">', '</div>' );
?>

<?php if ( have_posts() ) : ?>

    <div class="row">

    <?php while ( have_posts() ) :
        the_post();
        $permalink = get_permalink();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( array(
            'columns',
            'small-12'
        ) ); ?>>

            <h1 class="post-title">
                <a href="<?php the_permalink(); ?>"<?php echo ( strpos( $permalink, $site_url ) === false ) ? ' target="_blank"' : ''; ?>>
                    <?php the_title(); ?>
                </a>
            </h1>

            <?php the_excerpt(); ?>

            <a href="<?php the_permalink(); ?>" class="button primary"<?php echo ( strpos( $permalink, $site_url ) === false ) ? ' target="_blank"' : ''; ?>>
                <?php echo _x( 'Read More', 'Read More Text', THEME_ID ); ?>
            </a>

        </article>
    <?php endwhile; ?>
        
    </div>

    <div class="row">

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

    <div class="row">

        <div class="columns small-12">
            <?php echo _x( 'Nothing found, sorry!', 'No Posts Found Text', THEME_ID ); ?>
        </div>
        
    </div>

<?php endif; ?>

<?php
get_footer();