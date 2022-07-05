<?php

class mirya_contact_info_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-contact-info';
	}
	
	public function get_title() {
		return 'Mirya Contact Info';
	}
	
	public function get_icon() {
		return 'fa fa-envelope';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'box1_section',
			[
				'label' => __( 'Box1', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'box1_icon',
			[
				'label' => __( 'Icon', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the icon font name  (ex: fa-phone)', 'mirya' ),
			]
		);

		$this->add_control(
			'box1_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$this->add_control(
			'box1_text',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'box2_section',
			[
				'label' => __( 'Box2', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'box2_icon',
			[
				'label' => __( 'Icon', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the icon font name (ex: fa-phone)', 'mirya' ),
			]
		);

		$this->add_control(
			'box2_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$this->add_control(
			'box2_text',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'box3_section',
			[
				'label' => __( 'Box3', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'box3_icon',
			[
				'label' => __( 'Icon', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the icon font name (ex: fa-phone)', 'mirya' ),
			]
		);

		$this->add_control(
			'box3_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$this->add_control(
			'box3_text',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
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
					<div class="row">
						<div class="col-sm-4">
							<div class="contact-box">
								<i class="fa <?php echo $settings['box1_icon'] ?>"></i>
								<h4><?php echo $settings['box1_title'] ?></h4>
								<p><?php echo $settings['box1_text'] ?></p>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact-box">
								<i class="fa <?php echo $settings['box2_icon'] ?>"></i>
								<h4><?php echo $settings['box2_title'] ?></h4>
								<p><?php echo $settings['box2_text'] ?></p>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact-box">
								<i class="fa <?php echo $settings['box3_icon'] ?>"></i>
								<h4><?php echo $settings['box3_title'] ?></h4>
								<p><?php echo $settings['box3_text'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php
	}
	
	
}