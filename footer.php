<?php

    // Set defaults
    $args = wp_parse_args(
        $args,
        [
            'footer'=>'default'
        ]
    );
?>
        </div> <!-- #content -->

<?php
    get_template_part('template-parts'. DIRECTORY_SEPARATOR .'footer'. DIRECTORY_SEPARATOR .'footer', $args['footer']);
    wp_footer();
?>
	</body>
</html>