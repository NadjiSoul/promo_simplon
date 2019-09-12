<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package crater-free
 */

?>

	<!-- Begin Footer Section -->
	<footer id="footer">
        <div class="container">
            <div class="row">
                  <div class="footer-widgets-wrapper">
                        <?php get_sidebar( 'footer' ); ?>
                  </div>
            </div>
            <?php
              /**
               * Hook - crater_free_action_footer.
               *
               * @hooked crater_free_footer_copyrights - 10
               */
              do_action( 'crater_free_action_footer' );
            ?>
        </div>
    </footer>
<?php wp_footer(); ?>

</body>
</html>