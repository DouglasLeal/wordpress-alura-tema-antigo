<?php

add_theme_support('post-thumbnails');

function dl_cadastrando_post_type_imoveis(){
    $labels = [
        'name' => 'Imóveis',
        'name_singular' => 'Imóvel',
        'add_new_item' => "Adicionar novo imóvel",
        'edit_item' => "Editar Imóvel"
    ];

    $supports = [
        'title',
        'editor',
        'thumbnail'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'description' => "Imóveis da imobiliária Malura",
        'menu_icon' => "dashicons-admin-home",
        'supports' => $supports
    ];
    register_post_type('imovel', $args);
}
add_action('init', "dl_cadastrando_post_type_imoveis");

function dl_registrar_menu(){
    register_nav_menu('header-menu', 'main-menu');
}

add_action('init', 'dl_registrar_menu');