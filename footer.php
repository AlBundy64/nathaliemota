        <footer>
            <?php get_template_part( 'template-parts/modale-contact' );?>
            <?php
            wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container'=> 'nav',
                
            )
            );
            ?>
        </footer>     
    <?php wp_footer(); ?>
    </body>
</html> 