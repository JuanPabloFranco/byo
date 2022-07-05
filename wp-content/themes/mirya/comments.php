<?php 
    
    if (comments_open()) { ?>

        <h3 class="comments-count">
            <?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
        </h3>
        <ul class="list-unstyled comments-list">

            <?php 
            $comments_arguments = array(
            
                'max_depth'    => 3,
                'type'         => 'comment',
                'avatar_size'  => 64

            );
            wp_list_comments($comments_arguments); ?>

        </ul>

        <?php $paginate_args = array(
            'prev_text' => '<i class="fa fa-arrow-left"></i>',
            'next_text' => '<i class="fa fa-arrow-right"></i>'
        );
        ?>
        <div class="comments-pagination">
            <?php paginate_comments_links($paginate_args) ?>
        </div>

        <?php $commentform_arguments = array(
            'fields'  => array(
                'author' => '<div class="row"><div class="col-sm-6"><input type="text" id="author" name="author" placeholder="Name*"></div>',
                'email' => '<div class="col-sm-6"><input type="text" id="email" name="email" placeholder="Email*"></div>',
                'url' => '<div class="col-sm-12"><input type="text" id="url" name="url" placeholder="Website"></div></div>'
            ),
            'comment_field' => '<textarea id="comment" name="comment" placeholder="Comment*" required="required"></textarea>',
            'title_reply'   => 'Leave a Reply',
            'title_reply_to' => 'Leave a Reply',
            'class_submit'  => 'main-btn',
            'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span>Submit Comment</span></button>',
            'comment_notes_before' => ''
        );

        comment_form($commentform_arguments);

    } else { ?>

        <h3 class="comments-count">comments Are Disabled</h3>

    <?php } ?>