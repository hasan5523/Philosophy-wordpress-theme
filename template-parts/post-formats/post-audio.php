<?php 
    $philosophy_audio_url = '';
    if( function_exists( "the_field")){
        $philosophy_audio_url = get_field('source');
    }
?>

<article <?php post_class('masonry__brick entry format-audio'); ?> data-aos="fade-up">

    <div class="entry__thumb">
        <a href="single-audio.html" class="entry__thumb-link">
            <?php the_post_thumbnail('home-square');?> 
        </a>
        <?php if($philosophy_audio_url):?>
            <div class="audio-wrap">
                <audio id="player" src="<?php echo esc_url( $philosophy_audio_url );?>" width="100%" height="42" controls="controls"></audio>
            </div>
        <?php endif; ?>
    </div>

    <?php 
        get_template_part('template-parts/common/post/summary')
    ?>

</article> <!-- end article -->