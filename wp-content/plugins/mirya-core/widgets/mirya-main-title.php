<?php

class mirya_main_title_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-main-title';
	}
	
	public function get_title() {
		return 'Mirya Title';
	}
	
	public function get_icon() {
		return 'fa fa-font';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Main Title', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();		
		?>

		<div class="container">
			<div class="main-title">
                <h2><?php echo $settings['title'] ?>
                    <span></span>
                </h2>
            </div>
        </div>

        <?php
	}
	
}