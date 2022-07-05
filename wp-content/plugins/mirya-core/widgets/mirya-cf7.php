<?php

class mirya_cf7_shortcode_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-cf7-shortcode';
	}
	
	public function get_title() {
		return 'Mirya CF7 Shortcode';
	}
	
	public function get_icon() {
		return 'fa fa-location-arrow';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => __( 'Shortcode', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the shortcode', 'mirya' ),
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();		
		?>
       
	    <div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="contact-form">
						<?php echo do_shortcode($settings['shortcode']); ?>
					</div>
				</div>
			</div>
	    </div>

        <?php
	}
	
	
}