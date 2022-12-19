<?php 
    get_header();
    ?>

    <div class="post-wrapper">
    <h2><a href="http://localhost/test/">Back to Blog</a></h2>
    <?php
    while(have_posts()) {
        the_post();?>

        <h2><?php the_title(); ?></h2>
        <p>Category: <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></p>
        <?php the_content(); ?>

    <?php } ?>
    </div>

    <?php
    get_footer();
?>