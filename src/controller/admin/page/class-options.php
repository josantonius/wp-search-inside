<?php
/**
 * Search Inside WordPress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.1.7
 */

namespace SearchInside\Controller\Admin\Page;

use Josantonius\WP_Register\WP_Register;
use Josantonius\WP_Menu\WP_Menu;
use Josantonius\Hook\Hook;
use Eliasis\Framework\App;
use Eliasis\Framework\Controller;

/**
 * Handler options page.
 */
class Options extends Controller {

	/**
	 * Slug for this administration page.
	 *
	 * @var string $page
	 */
	public $slug = 'search-inside-options';

	/**
	 * Data for the view.
	 *
	 * @var array $data
	 */
	public $data;

	/**
	 * Add menu and instance to associated method to display the page.
	 */
	public function set_menu() {

		WP_Menu::add(
			'menu',
			App::SearchInside()->getOption( 'menu', 'top-level' ),
			[ $this, 'render' ],
			[ $this, 'add_scripts' ],
			[ $this, 'add_styles' ]
		);
	}

	/**
	 * Add submenu for this page.
	 *
	 * @uses add_submenu_page() → add a submenu page
	 */
	public function set_submenu() {

		WP_Menu::add(
			'submenu',
			App::SearchInside()->getOption( 'submenu', 'options' ),
			[ $this, 'render' ]
		);
	}

	/**
	 * Load scripts.
	 */
	public function add_scripts() {

		WP_Register::add(
			'script',
			App::SearchInside()->getOption( 'assets', 'js', 'searchInsideAdmin' )
		);
	}

	/**
	 * Load styles.
	 */
	public function add_styles() {

		WP_Register::add(
			'style',
			App::SearchInside()->getOption( 'assets', 'css', 'searchInsideAdmin' )
		);
	}

	/**
	 * Check request before loading page.
	 *
	 * @uses get_option() → retrieves an option value
	 */
	public function check_request() {

		$this->data = $this->model->get_settings();

		$this->data['caseSensitive'] = false;

		if ( isset( $_POST['submit'] ) ) {

			$fields = [

				'idContainer',
				'searchIn',
				'executeWith',
				'searchMode',
				'wordColors',
				'caseSensitive',
			];

			foreach ( $fields as $field ) {

				if ( ! isset( $_POST[ $field ] ) ) {
					continue;
				}

				$this->data[ $field ] = sanitize_text_field( $_POST[ $field ] );

				if ( 'wordColors' === $field ) {
					$colors = explode( ',', $this->data[ $field ] );

					$this->data[ $field ]    = $colors;
					$this->data['wordColor'] = $colors[0];
				}
			}

			if ( 'shortcode' === $this->data['executeWith'] ) {
				$this->data['idContainer'] = 'search-inside-sc';
			}

			$sensitive = ( 'on' === $this->data['caseSensitive'] );

			$this->data['caseSensitive'] = $sensitive;
			$this->model->set_settings( $this->data );
		}

		$sensitive = ( $this->data['caseSensitive'] ) ? 'checked' : '';

		$this->data['case-sensitive'] = $sensitive;
	}

	/**
	 * Options for the first select box.
	 *
	 * @return string → options html code.
	 */
	public function select_options_one() {

		$execute_with = [
			'off'          => __(
				'Off - Don\'t show',
				'search-inside'
			),
			'alphanumeric' => __(
				'Show by pressing alphanumeric key',
				'search-inside'
			),
			'alphabetic'   => __(
				'Show by pressing alphabetic key',
				'search-inside'
			),
			'numeric'      => __(
				'Show by pressing numeric key',
				'search-inside'
			),
			'append'       => __(
				'Append to a html tag',
				'search-inside'
			),
			'shortcode'    => __(
				'Add from shortcode',
				'search-inside'
			),
		];

		$options = '';

		foreach ( $execute_with as $key => $value ) {
			$exec_with = $this->data['executeWith'];
			$selected  = ( $exec_with == $key ) ? 'selected' : '';

			$options .= '<option value="' . $key . '" ' . $selected . '>' .
							$value .
						'</option>';
		}

		print( $options );
	}

	/**
	 * Options for the second select box.
	 */
	public function select_options_two() {

		$search_mode = [
			'quotes' => __( 'Phrases and paragraphs', 'search-inside' ),
			'words'  => __( 'Words', 'search-inside' ),
		];

		$options = '';

		foreach ( $search_mode as $key => $value ) {
			$mode     = $this->data['searchMode'];
			$selected = ( $mode == $key ) ? 'selected' : '';

			$options .= '<option value="' . $key . '" ' . $selected . '>' .
							$value .
						'</option>';
		}

		print( $options );
	}

	/**
	 * Renderizate admin page.
	 */
	public function render() {

		$this->check_request();

		Hook::getInstance( App::getCurrentID() );

		$page   = App::SearchInside()->getOption( 'path', 'page' );
		$layout = App::SearchInside()->getOption( 'path', 'layout' );

		$this->view->renderizate( $layout, 'header' );
		$this->view->renderizate( $page, 'options', $this->data );
		$this->view->renderizate( $layout, 'footer' );
	}
}
