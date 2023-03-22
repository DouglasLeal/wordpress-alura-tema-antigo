<?php get_header(); ?>
    <h1>Page</h1>
    <main>
        <article>
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    the_post_thumbnail();
                    the_title();
                    the_content();
                    the_date();
                endwhile;
            endif;
            ?>
        </article>
    </main>

    <?php if(is_page('contato')): ?>
        <h2>Formulário</h2>
    <?php endif; ?>

<?php get_footer(); ?>