<?php

class mirya_skills_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-skills';
	}
	
	public function get_title() {
		return 'Mirya Skills';
	}
	
	public function get_icon() {
		return 'fa fa-gears';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'left_section',
			[
				'label' => __( 'Skills Left Area', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'left_area_progress_title',
			[
				'label' => __( 'Progress Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'left_area_progress_percent',
			[
				'label'   => __( 'Progress Percent', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 10000,
				'step'    => 1,
				'default' => 100,
			]
		);

		$this->add_control(
			'left_area_skills_list',
			[
				'label'   => __( 'Left Area Skills List', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'right_section',
			[
				'label' => __( 'Skills Right Area', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'right_area_progress_title',
			[
				'label' => __( 'Progress Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'right_area_progress_percent',
			[
				'label'   => __( 'Progress Percent', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 10000,
				'step'    => 1,
				'default' => 100,
			]
		);

		$this->add_control(
			'right_area_skills_list',
			[
				'label'   => __( 'Right Area Skills List', 'mirya' ),
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
				<div class="col-sm-6">
					<?php foreach ( $settings['left_area_skills_list'] as $item ) : ?>
					<div class="progress-container">
						<span class="percent" data-from="0" data-to="<?php echo esc_attr( $item['left_area_progress_percent'] ) ?>" data-speed="1100" data-refresh-interval="50">0</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $item['left_area_progress_percent'] ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h3><?php echo $item['left_area_progress_title'] ?></h3>
					</div>
					<?php endforeach; ?>		
				</div>
				<div class="col-sm-6">
					<?php foreach ( $settings['right_area_skills_list'] as $item ) : ?>
					<div class="progress-container">
						<span class="percent" data-from="0" data-to="<?php echo esc_attr( $item['right_area_progress_percent'] ) ?>" data-speed="1100" data-refresh-interval="50">0</span>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $item['right_area_progress_percent'] ) ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h3><?php echo $item['right_area_progress_title'] ?></h3>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		
        <?php
	}
	
	
}