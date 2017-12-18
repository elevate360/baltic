<?php
/**
 * Baltic demo import
 *
 * @see   	https://wordpress.org/plugins/one-click-demo-import/
 * @package Baltic
 */


add_filter( 'pt-ocdi/plugin_page_title', '__return_false' );
add_filter( 'pt-ocdi/plugin_intro_text', '__return_false' );

/**
 * Initialize Baltic demo import
 *
 * @return array mixed
 */
function baltic_demo_import() {

	$free 		= __( 'Free', 'baltic' );
	$premium 	= __( 'Premium', 'baltic' );

    $import = array(
        array(
            'import_file_name'           => __( 'Default', 'baltic' ),
            'categories'                 => array( $free ),
            'import_file_url'            => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-1/data.xml',
            'import_widget_file_url'     => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/widgets.json',
            'import_customizer_file_url' => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/customizer.dat',
            'import_preview_image_url'   => 'https://via.placeholder.com/800x600',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'baltic' ),
            'preview_url'                => 'https://baltic.elevatethemes.com.au/demo-1',
        ),
        array(
            'import_file_name'           => __( 'Minimal', 'baltic' ),
			'categories'                 => array( $free ),
            'import_file_url'            => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-2/data.xml',
            'import_widget_file_url'     => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-2/widgets.json',
            'import_customizer_file_url' => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-2/customizer.dat',
            'import_preview_image_url'   => 'https://via.placeholder.com/800x600',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'baltic' ),
            'preview_url'                => 'https://baltic.elevatethemes.com.au/demo-2',
        ),
        array(
            'import_file_name'           => __( 'Jewelry Store', 'baltic' ),
			'categories'                 => array( $premium ),
            'import_file_url'            => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-3/data.xml',
            'import_widget_file_url'     => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-3/widgets.json',
            'import_customizer_file_url' => 'https://gitlab.com/elevatethemes/baltic-demo/raw/master/demo-3/customizer.dat',
            'import_preview_image_url'   => 'https://via.placeholder.com/800x600',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'baltic' ),
            'preview_url'                => 'https://baltic.elevatethemes.com.au/demo-3',
        ),
    );

    return apply_filters( 'baltic_demo_import', $import );

}
add_filter( 'pt-ocdi/import_files', 'baltic_demo_import' );
