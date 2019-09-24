<?php 
    /**
     * Template Name: Contact page
     */

?>

<?php 
the_post();
get_header();

?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php _e('Feel Free To Contact Us.','philosophy');?>
                </h1>
                
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
            <div id="map-wrap">
                <?php  
                    if( is_active_sidebar( 'contact_map' )){
                        dynamic_sidebar( 'contact_map' );
                    }
                
                ?>
            </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <?php the_content();?>

                <div class="row block-1-2 block-tab-full">
                    <?php  
                        if( is_active_sidebar( 'contact_info' )){
                            dynamic_sidebar( 'contact_info' );
                        }
                    ?>
                </div>  
                <h3>Say Hello.</h3>  

                <?php echo do_shortcode('[contact-form-7 id="153" title="Contact form 1"]' )?>  

            </div> <!-- end s-content__main -->

        </article>

    </section> <!-- s-content -->

<?php get_footer();?>


