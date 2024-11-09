<?php get_header(); ?>


<section class="page-templates">
    <article class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </article>
</section>

<?php get_footer(); ?>