<div class="pat-top">
        
        <div class="row top-row">
        
            <article id="post-<?php the_ID(); ?>" <?php post_class( array(
                'columns',
                'small-12',
            ) ); ?>>
                
                <div class="row expanded">
					
                    <div class="small-12 medium-8 columns hide-for-medium">
                        
                        <h3 class="post-title">
							<?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_top_title', true ); ?>
                        </h3>
                        
                    </div>
					
					<div class="small-12 medium-4 columns">
                        <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_rbm_pat_home_top_image', true ), 'medium' ); ?>
                    </div>
                    
                    <div class="small-12 medium-8 columns">
                        
                        <div class="hide-for-small-only">
                            
                            <h3 class="post-title">
								<?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_top_title', true ); ?>
                            </h3>
                        
                        </div>
                        
                        <?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_rbm_pat_home_top_text', true ) ); ?>
                        
                    </div>
					
				</div>
				
			</article>
			
	</div>
	
</div>