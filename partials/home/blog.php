<?php
/**
 * Posts on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

// Just in case there are any Hooks for Post
locate_template( '/includes/hooks/post-hooks.php', true, true );

// Use Category Slug
$categories = apply_filters( 'pat-home-blog-categories', array(
    'on-life-and-writing',
    'psalms',
) );

// Only used for each Category Loop, not for the Post Loops
$medium_class = 'medium-' . ( 12 / count( $categories ) );

?>

<div class="pat-blog row expanded">

    <?php foreach ( $categories as $category ) : // Create sections for each ?>
    
        <div class="small-12 <?php echo $medium_class; ?> columns">

            <?php $query = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'category_name' => $category,
            ) );
            
            $category_object = get_category_by_slug( $category );

            if ( $query->have_posts() ) : ?>
            
                <h2 class="category-title"><?php echo $category_object->name; ?></h2>
            
                <div class="row expanded">

                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class( array(
                            'columns',
                            'small-12',
                            'medium-6',
                        ) ); ?>>
                            
                            <?php if ( has_post_thumbnail() ) : ?>
                            
                                <a href ="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            
                            <?php endif; ?>
                            
                            <a href ="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <strong><?php the_title(); ?></strong>
                            </a><br />
                            
                            <span class="timestamp"><span class="fa fa-clock-o"></span>&nbsp;<?php the_date(); ?></span>
                            
                        </article>

                    <?php endwhile; wp_reset_postdata(); ?>
                    
                </div>
            
                <div class="row expanded">
                    <div class="small-12 columns">
                        <a href="<?php echo get_category_link( $category_object->term_id ); ?>" class="primary hollow button">
                            <?php echo _x( 'View More', 'View More Text', THEME_ID ); ?>
                        </a>
                    </div>
                </div>

            <?php else :

            endif; ?>
                         
        </div>

    <?php endforeach; ?>
                 
</div>