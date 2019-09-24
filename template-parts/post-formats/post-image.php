<article <?php post_class('masonry__brick entry format-standard'); ?> data-aos="fade-up">
                        
    <div class="entry__thumb">
        <a href="single-standard.html" class="entry__thumb-link">
            <?php the_post_thumbnail('home-square');?> 
        </a>
    </div>

    <?php 
        get_template_part('template-parts/common/post/summary')
    ?>

</article> <!-- end article -->