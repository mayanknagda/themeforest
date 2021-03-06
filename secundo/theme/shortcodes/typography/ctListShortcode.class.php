<?php
/**
 * List shortcode
 */
class ctListShortcode extends ctShortcode {

	/**
	 * Returns name
	 * @return string|void
	 */
	public function getName() {
		return 'List';
	}

	/**
	 * Shortcode name
	 * @return string
	 */
	public function getShortcodeName() {
		return 'list';
	}

	/**
	 * Returns shortcode type
	 * @return mixed|string
	 */

	public function getShortcodeType() {
		return self::TYPE_SHORTCODE_ENCLOSING;
	}


	/**
	 * Handles shortcode
	 * @param $atts
	 * @param null $content
	 * @return string
	 */

	public function handle($atts, $content = null) {
		extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));

		switch ($style) {
			case 1:
				$type = 'simple';
				break;
			case 2:
				$type = 'dots';
				break;
			default:
				$type = 'simple';
		}

		return do_shortcode('<ul class="' . $type . '">' . $content . '</ul>');
	}

	/**
	 * Returns config
	 * @return null
	 */
	public function getAttributes() {
		//example param - used by theme shortcode tester
		return array(
			'content' => array('label' => __('content', 'ct_theme'), 'default' => '', 'type' => 'textarea', 'help' => "html li elements", 'example' => '<li>list item</li><li>list item</li><li>list item</li><li>list item</li><li>list item</li>'),
			'style' => array('label' => __('style', 'ct_theme'), 'default' => '1', 'type' => 'select', 'choices' => array('1' => '1', '2' => '2'), 'help' => __('List style', 'ct_theme')),
		);
	}
}

new ctListShortcode();