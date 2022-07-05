<?php

class mirya_fact_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-fact';
	}
	
	public function get_title() {
		return 'Mirya Fact';
	}
	
	public function get_icon() {
		return 'fa fa-clock-o';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'facts_section',
			[
				'label' => __( 'Counter Items', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'fact_number',
			[
				'label'   => __( 'Counter Value', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 100000000,
				'step'    => 1,
				'default' => 0,
			]
		);

		$repeater->add_control(
			'fact_title',
			[
				'label' => __( 'Counter Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$this->add_control(
			'facts_list',
			[
				'label'   => __( 'Counter List', 'mirya' ),
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
			    <?php foreach ( $settings['facts_list'] as $item ) : ?>
				<div class="col-md-3 col-sm-6">
					<div class="fact-item">
						<span class="fact-number" data-from="0" data-to="<?php echo esc_attr( $item['fact_number'] ) ?>" data-speed="2500"><?php echo esc_attr( $item['fact_number'] ) ?></span>
						<h4><?php echo $item['fact_title'] ?></h4>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

        <?php
	}
	
	
}