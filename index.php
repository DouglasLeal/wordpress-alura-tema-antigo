<?php get_header(); ?>

<h1>INDEX</h1>

<main class="home-main">
    <div class="container">
        <h1>Maluras</h1>

        <?php $taxonomies = get_terms('localizacao'); ?>
        <form class="busca-localizacao-form" action="<?php bloginfo('url'); ?>/" method="get">
            <div class="taxonomy-select-wrapper">
                <select name="taxonomy">
                    <option value="">Todos os imóveis</option>
                    <?php foreach($taxonomies as $taxonomy) { ?>
                        <option value="<?= $taxonomy->slug; ?>"><?= $taxonomy->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit">Filtrar</button>
        </form>

        <ul class="imoveis-listagem">
            <?php
            $queryTaxonomy = array_key_exists('taxonomy', $_GET);
            if( $queryTaxonomy && $_GET['taxonomy'] == '') {
                wp_redirect( home_url() );
                exit;
            }

            if( $queryTaxonomy ) {
                $taxonomy_args = [
                    [
                        'taxonomy' => 'localizacao',
                        'field' => 'slug',
                        'terms' => $_GET['taxonomy']
                    ]
                ];
            }

            $args = [
                'post_type' => 'imovel',
                'tax_query' => $taxonomy_args
            ];
            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    ?>
                    <li class="imoveis-listagem-item">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail(); ?>
                            <p><?php the_content(); ?></p>
                        </a>
                    </li>
                <?php
                endwhile;
            endif;
            ?>

        </ul>
    </div>
</main>

<?php get_footer(); ?>
