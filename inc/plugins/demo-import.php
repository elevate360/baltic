<?php
/**
 * Baltic demo import
 *
 * @link   	https://wordpress.org/plugins/one-click-demo-import/
 * @package Baltic
 */

/**
 * Initialize Baltic demo import
 *
 * @return array mixed
 */
function baltic_demo_import() {

    $import = array(
        array(
            'import_file_name'           => __( 'Fashion Store', 'baltic' ),
            'categories'                 => array(
        		__( 'Minimal', 'baltic' ),
        		__( 'Fashion', 'baltic' )
            ),
            'import_file_url'            => 'http://www.your_domain.com/baltic/demo-content.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/baltic/widgets.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/baltic/customizer.dat',
            'import_preview_image_url'   => 'http://www.your_domain.com/baltic/preview_import_image1.jpg',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'baltic' ),
            'preview_url'                => 'http://www.your_domain.com/my-demo-1',
        ),
        array(
            'import_file_name'           => __( 'Pet Store', 'baltic' ),
            'categories'                 => array(
        		__( 'Minimal', 'baltic' ),
        		__( 'Pet', 'baltic' )
            ),
            'import_file_url'            => 'http://www.your_domain.com/baltic/demo-content2.xml',
            'import_widget_file_url'     => 'http://www.your_domain.com/baltic/widgets2.json',
            'import_customizer_file_url' => 'http://www.your_domain.com/baltic/customizer2.dat',
            'import_preview_image_url'   => 'http://www.your_domain.com/baltic/preview_import_image2.jpg',
            'import_notice'              => __( 'A special note for this import.', 'baltic' ),
            'preview_url'                => 'http://www.your_domain.com/my-demo-2',
        ),
    );

    return apply_filters( 'baltic_demo_import', $import );

}
add_filter( 'pt-ocdi/import_files', 'baltic_demo_import' );

add_filter( 'pt-ocdi/plugin_page_title', '__return_false' );
add_filter( 'pt-ocdi/plugin_intro_text', '__return_false' );
