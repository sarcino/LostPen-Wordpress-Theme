<?php get_header(); ?>



<main>

<article>
<h2>Search Results | <?php echo get_search_query(); ?></h2>

<?php 
while (have_posts()) : the_post(); 
?>

<article>


<h2><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
</a>
</h2>

    <div class="date"><?php the_time("j. F Y"); ?>  |  <a href="#"><?php echo get_the_tag_list() ?></a></div>

    <?php if(has_post_thumbnail()) { ?>
 <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" />
 <?php } ?>
 
<?php the_excerpt(); ?>

<div class="link-with-arrow"><a href="<?php the_permalink(); ?>" class="read-more">Číst dál</a></div>
</article>

<?php endwhile; ?>
</article>
</main>

<section class="more-articles">

<?php echo paginate_links(
    array(
        'prev_text' => '<span class="prev-articles">předchozí články</span>',
        'next_text' => '<span class="next-articles">následující články</span>'      
      )
); ?>
       
    </section>

<?php get_footer(); ?>
