<?php
/*
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0
 */


/************************************************************************
* Importer will auto load, there is no settings required to put in your
* Reduxframework config file.
*
* BUT- If you want to put the demo importer in a different position on 
* the panel, use the below within your config for Redux.
*************************************************************************/
// $this->sections[] = array(
            //     'id' => 'wbc_importer_section',
            //     'title'  => esc_html__( 'Demo Content', 'framework' ),
            //     'desc'   => esc_html__( 'Description Goes Here', 'framework' ),
            //     'icon'   => 'el-icon-website',
            //     'fields' => array(
            //                     array(
            //                         'id'   => 'wbc_demo_importer',
            //                         'type' => 'wbc_importer'
            //                         )
            //                 )
            //     );

/************************************************************************
* Example functions/filters
*************************************************************************/
if ( !function_exists( 'wbc_after_content_import' ) ) {

	/**
	 * Function/action ran after import of content.xml file
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 */

	function wbc_after_content_import( $demo_active_import , $demo_data_directory_path ) {
		//Do something
	}

	// Uncomment the below
	// add_action( 'wbc_importer_after_content_import', 'wbc_after_content_import', 10, 2 );
}

if ( !function_exists( 'wbc_filter_title' ) ) {

	/**
	 * Filter for changing demo title in options panel so it's not folder name.
	 *
	 * @param [string] $title name of demo data folder
	 *
	 * @return [string] return title for demo name.
	 */

	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {

		$message = '<p>'. esc_html__( 'Best if used on new WordPress install.', 'framework' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'framework' ) .'</p>';

		return $message;
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}

if ( !function_exists( 'wbc_importer_label_text' ) ) {

	/**
	 * Filter for changing importer label/tab for redux section in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title label above demos
	 *
	 * @return [string] return no html
	 */

	function wbc_importer_label_text( $label_text ) {

		$label_text = 'WBC Importer';

		return $label_text;
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_label', 'wbc_importer_label_text', 10 );
}

if ( !function_exists( 'wbc_change_demo_directory_path' ) ) {

	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */

	function wbc_change_demo_directory_path( $demo_directory_path ) {

		//$demo_directory_path = get_template_directory().'/demo-data/';

		return $demo_directory_path;

	}

	// Uncomment the below
	// add_filter('wbc_importer_dir_path', 'wbc_change_demo_directory_path' );
}

if ( !function_exists( 'wbc_importer_before_widget' ) ) {

	/**
	 * Function/action ran before widgets get imported
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_importer_before_widget( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_before_widget_import', 'wbc_importer_before_widget', 10, 2 );
}

if ( !function_exists( 'wbc_after_theme_options' ) ) {

	/**
	 * Function/action ran after theme options set
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_after_theme_options( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_after_theme_options_import', 'wbc_after_theme_options', 10, 2 );
}


/************************************************************************
* Extended Example:
* Way to set menu, import revolution slider, and set home page.
*************************************************************************/

if ( !function_exists( 'wbc_extended_example' ) ) {
	function wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/

		if ( class_exists( 'RevSlider' ) ) {

			//If it's demo3 or demo5
			$wbc_sliders_array = array(
				'demo3' => 'someslidername.zip', //Set slider zip name
				'demo5' => 'anotherslider.zip', //Set slider zip name
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

				if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
					$slider = new RevSlider();
					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
				}
			}
		}

		/************************************************************************
		* Setting Menus
		*************************************************************************/

		// If it's demo1 - demo6
		$wbc_menu_array = array( 'demo1', 'demo2', 'demo3', 'demo4', 'demo5', 'demo6' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', 'Temp Menu', 'nav_menu' );

			if ( isset( $top_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'theme-primary' => $top_menu->term_id,
						'theme-footer'  => $top_menu->term_id
					)
				);
			}

		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'demo1' => 'Home Page v1',
			'demo2' => 'Home Page v2',
			'demo3' => 'Home Page v3',
			'demo4' => 'Home Page v4',
			'demo5' => 'Home Page v5',
			'demo6' => 'Home Page v6',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}


	// Uncomment the below
	// add_action( 'wbc_importer_after_content_import', 'wbc_extended_example', 10, 2 );
}

?>
