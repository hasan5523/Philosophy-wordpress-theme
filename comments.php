<div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
                        <?php 
                            $philosophy_com_num = get_comments_number();
                            if($philosophy_com_num <= 1){
                                echo wp_kses_post($philosophy_com_num)." ".__('Comment','philosophy');
                            }else{
                                echo wp_kses_post($philosophy_com_num)." ".__('Comments','philosophy');
                            }
                        
                        ?>
                    
                    </h3>

                    <!-- commentlist -->
                    <ol class="commentlist">

                        <?php wp_list_comments();?>

                    </ol> <!-- end commentlist -->

                    <div class="comments-pagination">
                        <?php 
                            the_comments_pagination(array(
                                'screen_reader_text' => __('pagination','philosophy'),
                                'prev_text'          => '<'.__('Previous comments','philosophy'),
                                'next_text'          => '<'.__('Next comments','philosophy'),


                            ));
                        
                        ?>
                    
                    </div>
                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">
                            <?php _e('Add Comment','philosophy')?>
                        </h3>
                        <?php comment_form();?>

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->