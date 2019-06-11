<?php /* Template Name: Contact */ ?>


<?php get_header(); ?>
          <div class="container">



<?php while (have_posts()): the_post(); ?>
    <div class="contact_title">
        <?php the_title(); ?>
    </div>
          

    <div class="contact_bloc_infos_form">
        <div class="contact_bloc_infos">
            <p>Telephone : 06 20 49 77 39</p>
            <p>
                    Email: <a href="mailto:contact@isabel-teixeira.fr"></a>
            </p>

        </div>
        <div class="contact_form">

            <?php the_content(); ?>

    </div>

<?php endwhile; ?>


<?php get_footer(); ?>