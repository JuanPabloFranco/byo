<?php

class mirya_service_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-service';
	}
	
	public function get_title() {
		return 'Mirya Service';
	}
	
	public function get_icon() {
		return 'fa fa-tasks';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label' => __( 'Services Items', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the icon name(ex: fa-pencil)', 'mirya' ),
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'desc',
			[
				'label' => __( 'Description', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the description', 'mirya' ),
			]
		);
 
		$this->add_control(
			'services_list',
			[
				'label'   => __( 'Services List', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();		
		?>

		<div class="container">
			<div class="row">
			    <?php foreach ( $settings['services_list'] as $item ) : ?>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="service-icon">
							<i class="fa <?php echo $item['icon'] ?> fa-lg"></i>
						</div>
						<h4><?php echo $item['title'] ?></h4>
						<p><?php echo $item['desc'] ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

        <?php
	}
	
	
}