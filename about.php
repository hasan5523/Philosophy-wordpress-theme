<?php 
    /**
     * Template Name: About page
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
                    <?php _e('Learn More About Us.','philosophy');?>
                </h1>
                
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                <?php the_post_thumbnail('large');?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

            <?php the_content();?>

            <div class="row block-1-2 block-tab-full">
                <?php  
                    if( is_active_sidebar( 'about_us' )){
                        dynamic_sidebar( 'about_us' );
                    }
                
                ?>
            </div>      

            </div> <!-- end s-content__main -->

        </article>

    </section> <!-- s-content -->

<?php get_footer();?>