<?php get_header(); ?>
<div class="container mt-4">

    <h3>Informations Personnelles</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> Bolghad</li>
        <li class="list-group-item"><strong>Prénom :</strong> Ahmadreza</li>
        <li class="list-group-item"><strong>Date de Naissance :</strong> 30 décembre 2000 (22 ans)</li>
        <li class="list-group-item"><strong>Adresse :</strong> Avenue de l'Arbre Ballon, 1090 Jette, Belgique</li>
        <li class="list-group-item"><strong>Téléphone :</strong> <a href="tel:+32 4 83 84 94 31">+32 483 84 94 31</a></li>
        <li class="list-group-item"><strong>Email :</strong> <a href="mailto:bolghad2@gmail.com">bolghad2@gmail.com</a></li>
    </ul>
    <hr>

    <h3 class="mb-4">Formations</h3>
    <ul class="list-group">
        <li class="list-group-item">2019-2021 : Technicien en informatique, René Cartigny</li>
        <li class="list-group-item">2021-2022 : Gestion en informatique, ESI</li>
        <li class="list-group-item">2022-2024 : Ecriture multimédia, ISFSC</li>
    </ul>
    <hr>

    <h3>Expériences Professionnelles</h3>
    <ul class="list-group">
        <?php
        $experiencesList = new WP_Query(array(
            'post_type' => 'experiences_professionnelles',
            'posts_per_page' => -1,
            'order' => 'ASC', 
        ));
        while ($experiencesList->have_posts()) : $experiencesList->the_post();
        ?>
            <li class="list-group-item">
                <strong><?php the_title(); ?></strong> (<?php echo get_post_meta(get_the_ID(), 'date_debut', true); ?> - <?php echo get_post_meta(get_the_ID(), 'date_fin', true); ?>)
                <ul>
                    <li><?php echo get_the_content(); ?></li>
                </ul>
            </li>
        <?php endwhile;
        wp_reset_postdata(); 
        ?>
</ul>

    <hr>

    <h3>Compétences</h3>
    <ul class="list-group">
        <?php
        $competencesList = new WP_Query(array(
            'post_type' => 'competences',
            'posts_per_page' => -1,
            'order' => 'ASC', 
        ));
        while ($competencesList->have_posts()) : $competencesList->the_post();
        ?>
            <li class="list-group-item">
                <strong><?php the_title(); ?></strong>
                <ul>
                    <li><?php echo get_the_content(); ?></li>
                </ul>
            </li>
        <?php endwhile;
        wp_reset_postdata();
        ?>
    </ul>

    <hr>

    <h3>Langues</h3>
    <ul class="list-group">
        <?php
        $languesList = new WP_Query(array(
            'post_type' => 'langues',
            'posts_per_page' => -1,
            'order' => 'ASC', 
        ));
        while ($languesList->have_posts()) : $languesList->the_post();
        ?>
            <li class="list-group-item">
                <strong><?php the_title(); ?></strong>
                <ul>
                    <li><?php echo get_the_content(); ?></li>
                </ul>
            </li>
        <?php endwhile;
        wp_reset_postdata(); 
        ?>
    </ul>

    <hr>

    <h3>Centres d'Intérêt</h3>
    <ul class="list-group">
        <?php
        $centresInteretList = new WP_Query(array(
            'post_type' => 'centres_interet',
            'posts_per_page' => -1,
            'order' => 'ASC', // Changer de DESC à ASC
        ));
        while ($centresInteretList->have_posts()) : $centresInteretList->the_post();
        ?>
            <li class="list-group-item">
                <strong><?php the_title(); ?></strong>
                <ul>
                    <li><?php echo get_the_content(); ?></li>
                </ul>
            </li>
        <?php endwhile;
        wp_reset_postdata(); // Réinitialiser la requête
        ?>
    </ul>

</div>
<?php get_footer(); ?>
