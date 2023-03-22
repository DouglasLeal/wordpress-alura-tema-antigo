<?php get_header(); ?>


<main class="home-main">
    <div class="container">
        <h1>Maluras</h1>
        <ul class="imoveis-listagem">
            <?php
            $args = ['post_type' => 'imovel'];
            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    ?>
                    <li class="imoveis-listagem-item">
                        <h2><?php the_title(); ?></h2>
                        <?php the_post_thumbnail(); ?>
                        <p><?php the_content(); ?></p>
                    </li>
                <?php
                endwhile;
            endif;
            ?>

        </ul>
    </div>
</main>

<?php get_footer(); ?>
