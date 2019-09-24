<article <?php post_class('masonry__brick entry format-gallery'); ?> data-aos="fade-up">

    <?php 
    if( class_exists('Attachments')):
        $attachments = new Attachments( 'philosophy_attachments' );// philosophy_attachments holo je nam e register kora hoice
        if( $attachments->exist()):
    ?>               
        <div class="entry__thumb slider">
            <div class="slider__slides">
            <?php while( $attachments->get() ) : ?>
                <div class="slider__slide">
                    <?php echo wp_kses_post($attachments->image( 'home-square' )); ?>
                </div>
            <?php endwhile;?>
            </div>
        </div>

    <?php 
        endif;
    endif;
        get_template_part('template-parts/common/post/summary')
    ?>

</article> <!-- end article -->