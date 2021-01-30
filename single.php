<?php get_header(); ?>

<main>

<?php while (have_posts()) : the_post(); ?>

<article>

<h2><?php the_title(); ?></h2>

<div class="date"><?php the_time("j. F Y"); ?>  |  <a href="#"><?php echo get_the_tag_list() ?></a></div>

<?php the_content(); ?>
<div class="comments">

<?php 

$fields = array(
   
    'author' =>
    '<li class="comment-form-author"><label for="author">' . __('Jméno') .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></li>',

  'email' =>
    '<li class="comment-form-email"><label for="email">' . __('E-mail') .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></li>'
);


		


$args = array(
    "fields" => $fields,
    "comment_field" => ' <li class="textarea comment-form-comment">
    <label for="comment">Komentář</label>
    <textarea class="text" data-autoresize rows="2" id="komentar" name="user_comment"></textarea>
</li>',
"title_reply"  => __("Komentáře"),
"label_submit" => __("Okometovat")

);


    comment_form($args);

    $comments_number = get_comments_number();
    if($comments_number != 0) {
    ?>  

      
    <ul class="all-comments">

    <?php

    $comments = get_comments(array(
        "post_id" => $post -> ID,
        "status" => "approve"
    ));
    wp_list_comments(array(
        "per_page" => 15
    ), $comments);
    ?>

    </ul>
  

<?php } ?>

</div>
</article>

<?php endwhile; ?>

</main>


<?php get_footer(); ?>