<?php

class mirya_testimonials_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-testimonials';
	}
	
	public function get_title() {
		return 'Mirya Testimonials';
	}
	
	public function get_icon() {
		return 'fa fa-quote-left';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'testimonials_section',
			[
				'label' => __( 'Testimonials Items', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'item_image',
			[
				'label' => __( 'Choose Image', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'item_name',
			[
				'label' => __( 'Name', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the name', 'mirya' ),
			]
		);

		$repeater->add_control(
			'item_subtitle',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the subtitle', 'mirya' ),
			]
		);

		$repeater->add_control(
			'item_text',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);
 
		$this->add_control(
			'testimonials_list',
			[
				'label'   => __( 'Testimonials List', 'mirya' ),
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
				<div class="col-md-8 col-md-offset-2">
					<!--Testimonials Item -->
					<div class="owl-carousel" id="testimonial-slider">
					    <?php foreach ( $settings['testimonials_list'] as $item ) : ?>
						<!-- New Item -->
						<div class="item">
							<div class="client-pic">
								<?php echo '<img src="' . $item['item_image']['url'] . '" alt="client">'; ?>
							</div>
							<div class="client-info">
								<h3><?php echo $item['item_name'] ?></h3>
								<span><?php echo $item['item_subtitle'] ?></span>
							</div>
							<div class="clearfix"></div>
							<div class="description">
								<p><?php echo $item['item_text'] ?></p>
								<span class="desc-one"></span>
								<span class="desc-two"></span>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

        <?php
	}
	
	
}