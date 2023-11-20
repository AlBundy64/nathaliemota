            <footer>
                <?php get_template_part( 'template-parts/modale-contact' );?>
                <?php get_template_part( 'template-parts/lightbox' );?>
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
        </div>
    </body>
</html> 