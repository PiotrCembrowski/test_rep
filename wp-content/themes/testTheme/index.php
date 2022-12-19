<?php get_header(); ?>

    <?php
    $catIDArray = [];
    $categories = get_categories();
    ?>
    <section class="">
        <div class="list-of-categories">
            <h2>Categories:</h2>
            <ul>
                <li><a id="all-posts" href="http://localhost/test/">All Posts</a></li>
                <?php
                foreach($categories as $category) {
                $catIDArray[$category->name] = $category->term_id;
                echo '<li><a class="category-name" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <script>
        const data = <?php echo json_encode($catIDArray); ?>;
        const propertyIDs = Object.keys(data);
        const propertyValues = Object.values(data);
        const entries = Object.entries(data);
    </script>

    <section class="blog-section">
        <div class="posts-container">
        <?php
        while(have_posts()) {
            the_post();?>
                <div class="post-box generic-posts">
                    <h2> 
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p>Category: <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></p>
                    <?php the_post_thumbnail(); ?>
                    <p><?php echo wp_trim_words(get_the_content(), 18); ?></p>
                <hr>
                </div>
            <?php } wp_reset_postdata();?>
            
            <span class="pagination">
            <?php
            echo paginate_links( array(
                'prev_text'          => __('Prev'),
                'next_text'          => __('Next'),
            ));
        ?> </span>
        </div>
    </section>
    <?php

    get_footer();
?>