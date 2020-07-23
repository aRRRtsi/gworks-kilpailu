<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gworksKilpailu
 */

get_header();
?>

<main id="primary" class="site-main">

  <?php
		while ( have_posts() ) :
			the_post();
  ?>

  <section class="entry-content">
    <div class="entry-hero"><?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gworkskilpailu' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );
  
      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gworkskilpailu' ),
          'after'  => '</div>',
        )
      );
      ?></div>
    <div class="entry-hero"><?php gworkskilpailu_post_thumbnail(); ?></div>

  </section><!-- .entry-content -->

  <?php
  endwhile; // End of the loop.
  ?>

  <section class="entry-content kilpailu-content">
    <div>
      <h3>Kilpailun kuvat otsikko</h3>
      <p>Aikaa osallistua ja äänestää 1.2.2020 asti</p>
    </div>
    <div class="kilpailu-grid">
      <?php

      global $wpdb;

      $sql = 'SELECT * FROM M3iE49l_db7_forms WHERE form_post_id = 66 ORDER BY form_id DESC';

      $results = $wpdb -> get_results($sql);

      ?>

      <?php foreach ($results as $result): ?>

      <?php $values = unserialize($result -> form_value); ?>

      <?php 
      
        $likeCount = new WP_Query(array(
          'post_type' => 'tykkaykset',
          'meta_query' => array(
            array(
              'key' => 'kuvan_tykkays_id',
              'compare' => '=',
              'value' => $result->form_id
           )
          )
        ));

        $existStatus = 'no';

        $existQuery = new WP_Query(array(
          'author' => get_current_user_id(),
          'post_type' => 'tykkaykset',
          'meta_query' => array(
            array(
              'key' => 'kuvan_tykkays_id',
              'compare' => '=',
              'value' => $result->form_id
           )
          )
        ));

        if ($existQuery->found_posts) {
          $existStatus = 'yes';
        }

      ?>

      <div>
        <div><img width="280" height="280"
            src="https://arileskinen.com/wp-content/uploads/cfdb7_uploads/<?= $values['Valitsekuvacfdb7_file']; ?>"
            class="kilpailu-kuva">
        </div>
        <div class="btn-div"><span class="btn-aanesta like-box" data-exists="<?php echo $existStatus; ?>">Äänestä <i
              class="far fa-heart" aria-hidden="true"></i><i class="fas fa-heart" aria-hidden="true"></i>
            <span class="tykkaykset"><?php echo $likeCount->found_posts; ?></span></span>
          <span class="btn-jaa">Jaa</span>
        </div>
        <div class="kuvanotsikko">Otsikko: <?= $values['Kuvanotsikko']; ?></div>
        <div class="osallistujan-nimi">Nimi: <?= $values['Nimi']; ?><?= $result -> form_id; ?></div>
      </div>

      <?php endforeach; ?>

    </div>
  </section>

  <section class="entry-content osallistu-kilpailuun-content">
    <div class="osallistu-kilpailuun-content-left">
      <h3>Osallistu kilpailuun!</h3>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros
        ullamcorper quis, lacinia quis facilisis sed sapien.
        Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit. Sed augue
        orci, lacinia eu tincidunt et eleifend nec lacus. Donec ultricies nisl ut felis, suspendisse potenti. Lorem
        ipsum ligula ut hendrerit mollis, ipsum erat vehicula risus, eu suscipit sem libero nec erat. Aliquam erat
        volutpat.
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros
        ullamcorper quis, lacinia quis facilisis sed sapien. </p>
    </div>
    <div><?php echo do_shortcode('[contact-form-7 id="66" title="Yhteydenottolomake 1"]'); ?></div>
  </section>

  <section class="entry-content saannot-ja-ehdot">
    <div class="saannot-ja-ehdot-width">
      <h4>Säännöt ja ehdot</h4>
      <p class="saannot-ja-ehdot-kilpailuaika">Kilpailuaika 1.1.2020-1.2.2020. Kilpailun järjestää Kansallisteatteri.
        Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="saannot-ja-ehdot-width">
      <p class="saannot-ja-ehdot-kilpailuteksti">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere
        interdum sem. Quisque ligula eros
        ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor
        vitae, consectetuer et venenatis eget velit. Sed augue orci, lacinia eu tincidunt et eleifend nec lacus. Donec
        ultricies nisl ut felis, suspendisse potenti. Lorem ipsum ligula ut hendrerit mollis, ipsum erat vehicula risus,
        eu suscipit sem libero nec erat. Aliquam erat volutpat. Sed congue augue vitae neque. Nulla consectetuer
        porttitor pede. Fusce purus morbi tortor magna condimentum vel, placerat id blandit sit amet tortor.
        Mauris sed libero. Suspendisse facilisis nulla in lacinia laoreet, lorem velit accumsan velit vel mattis libero
        nisl et sem. Proin interdum maecenas massa turpis sagittis in, interdum non lobortis vitae massa. Quisque purus
        lectus, posuere eget imperdiet nec sodales id arcu. Vestibulum elit pede dictum eu, viverra non tincidunt eu
        ligula.
        Nam molestie nec tortor. Donec placerat leo sit amet velit. Vestibulum id justo ut vitae massa. Proin in dolor
        mauris consequat aliquam. Donec ipsum, vestibulum ullamcorper venenatis augue. Aliquam tempus nisi in auctor
        vulputate, erat felis pellentesque augue nec, pellentesque lectus justo nec erat. Aliquam et nisl. Quisque sit
        amet dolor in justo pretium condimentum.
        Vivamus placerat lacus vel vehicula scelerisque, dui enim adipiscing lacus sit amet sagittis, libero enim vitae
        mi. In neque magna posuere, euismod ac tincidunt tempor est. Ut suscipit nisi eu purus. Proin ut pede mauris
        eget ipsum. Integer vel quam nunc commodo consequat. Integer ac eros eu tellus dignissim viverra. Maecenas erat
        aliquam erat volutpat. Ut venenatis ipsum quis turpis. Integer cursus scelerisque lorem. Sed nec mauris id quam
        blandit consequat. Cras nibh mi hendrerit vitae, dapibus et aliquam et magna. Nulla vitae elit. Mauris
        consectetuer odio vitae augue.
        Cras lobortis sem ultrices leo. Donec magna fusce ac ante. Nullam est nisi blandit eget, suscipit vitae posuere
        quis ante. Quisque vitae tortor tellus feugiat adipiscing. Morbi ac elit et diam bibendum bibendum.



        Suspendisse id diam, donec adipiscing vulputate metus. Cras pellentesque vestibulum sem. Maecenas ut elit quis
        nisl vestibulum bibendum. Aenean eu erat quis turpis consequat vehicula. Morbi lacus velit, tristique ut iaculis
        volutpat in velit. Duis nec mauris et velit mollis aliquam, nullam posuere. Mauris at turpis sit amet dui
        imperdiet lobortis, proin eu felis.

        Donec nec dui, in viverra tristique sapien. Suspendisse tincidunt consequat ante. Vestibulum ante ipsum primis
        in faucibus orci luctus et ultrices posuere cubilia Curae; Ut lacinia luctus nunc. Etiam molestie hendrerit
        risus. Curabitur venenatis risus varius odio. Quisque elit ante, lacinia eget mollis sed, fermentum nec nisl.
        Nullam volutpat odio dolor tempor posuere. Suspendisse et elit vel sem interdum consequat. Aenean pulvinar nisl
        vel neque. Morbi mi ac neque ullamcorper dignissim. Nulla suscipit ipsum. Duis adipiscing turpis vitae turpis.
        In quis nisl ut tincidunt felis sit amet ipsum. Fusce facilisis nam tortor orci, facilisis sit amet accumsan
        vel, aliquam nec odio. Fusce accumsan libero et nisi. Lorem ipsum pede id faucibus aliquet, diam velit commodo
        elit, quis ultricies justo metus sit amet metus. Suspendisse interdum nulla sit amet enim. Etiam ultrices fusce
        nibh. Maecenas sed dolor vitae nisi volutpat commodo. Nulla interdum egestas lectus. Maecenas imperdiet arcu et
        orci.</p>
    </div>
  </section>

</main><!-- #main -->





<?php
get_footer();