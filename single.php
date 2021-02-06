<?php get_header(); ?>

<main>

<?php while (have_posts()) { the_post(); ?>

<article>

<h2><?php the_title(); ?></h2>
<div class="date"><?php the_time("j. F Y"); ?>  |  <a href="#"><?php echo get_the_tag_list() ?></a></div>
<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">

<?php the_content(); ?>

<div class="comments">

<?php comment_form();

$comments_number = get_comments_number();
if($comments_number != 0) {
?>

<h3>What others say</h3>
<ul>
<?php
$comments = get_comments(array(
    "post_id" => $post->ID,
    "status" => "approve"
));

wp_list_comments(array(
    "per_page" => 15,
), $comments);

?>
</ul>

<?php
}
?>

</div>
</article>
<?php } ?>
</main>

<?php get_footer(); ?>