<?php
// Fonction pour créer les Custom Post Types
function creer_custom_post_types() {
    // Expériences Professionnelles
    register_post_type('experiences_professionnelles', array(
        'labels' => array(
            'name' => __('Expériences Professionnelles'),
            'singular_name' => __('Expérience Professionnelle')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));

    // Centres d'Intérêt
    register_post_type('centres_interet', array(
        'labels' => array(
            'name' => __('Centres d\'Intérêt'),
            'singular_name' => __('Centre d\'Intérêt')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));

    // Langues
    register_post_type('langues', array(
        'labels' => array(
            'name' => __('Langues'),
            'singular_name' => __('Langue')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));

    // Compétences
    register_post_type('competences', array(
        'labels' => array(
            'name' => __('Compétences'),
            'singular_name' => __('Compétence')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));
}

// Action pour initialiser les Custom Post Types
add_action('init', 'creer_custom_post_types');

// Ajouter les Meta Boxes pour les Dates
function add_date_fields_meta_box() {
    $post_types = array('experiences_professionnelles', 'centres_interet', 'langues', 'competences'); // Ajoutez les autres post types au besoin
    foreach ($post_types as $post_type) {
        add_meta_box(
            'date_fields_meta_box',
            'Dates',
            'show_date_fields_meta_box',
            $post_type,
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'add_date_fields_meta_box');

// Afficher les champs de date dans la Meta Box
function show_date_fields_meta_box($post) {
    $date_debut = get_post_meta($post->ID, 'date_debut', true);
    $date_fin = get_post_meta($post->ID, 'date_fin', true);

    echo '<label for="date_debut">Date de début:</label>';
    echo '<input type="date" id="date_debut" name="date_debut" value="' . esc_attr($date_debut) . '"><br><br>';

    echo '<label for="date_fin">Date de fin:</label>';
    echo '<input type="date" id="date_fin" name="date_fin" value="' . esc_attr($date_fin) . '"><br><br>';
}

// Sauvegarder les Données des Champs Personnalisés
function save_date_fields_meta($post_id) {
    if (array_key_exists('date_debut', $_POST)) {
        update_post_meta(
            $post_id,
            'date_debut',
            $_POST['date_debut']
        );
    }
    if (array_key_exists('date_fin', $_POST)) {
        update_post_meta(
            $post_id,
            'date_fin',
            $_POST['date_fin']
        );
    }
}
add_action('save_post', 'save_date_fields_meta');

?>
