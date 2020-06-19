<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php get_template_part('templates/content-svg'); ?>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('Vous utilisez un navigateur <strong>obsolète</strong>. Veuillez <a href="http://browsehappy.com/">mettre à jour votre navigateur</a> pour améliorer votre expérience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      include( locate_template( 'templates/header.php', false, false ) );

      include Wrapper\template_path();

      do_action('get_footer');
      include( locate_template( 'templates/footer.php', false, false ) );
      wp_footer();
    ?>
  </body>
</html>
