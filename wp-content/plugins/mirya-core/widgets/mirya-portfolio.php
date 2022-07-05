<?php

class mirya_portfolio_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-portfolio';
	}
	
	public function get_title() {
		return 'Mirya Portfolio';
	}
	
	public function get_icon() {
		return 'fa fa-briefcase';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'filter_section',
			[
				'label' => __( 'Filter', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'filter1',
			[
				'label' => __( 'Filter1', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->add_control(
			'filter2',
			[
				'label' => __( 'Filter2', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->add_control(
			'filter3',
			[
				'label' => __( 'Filter3', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->add_control(
			'filter4',
			[
				'label' => __( 'Filter4', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the text', 'mirya' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item_section',
			[
				'label' => __( 'Portfolio Items', 'mirya' ),
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
			'item_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'item_category',
			[
				'label' => __( 'Category', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the category', 'mirya' ),
			]
		);

		$repeater->add_control(
            'item_control',
            [
                'label' => __('Choose Filter Name', 'mirya'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'one' => __('Category1', 'mirya'),
                    'two' => __('Category2', 'mirya'),
                    'three' => __('Category3', 'mirya'),
                ],
            ]
        );

		$this->add_control(
			'portfolio_list',
			[
				'label'   => __( 'Portfolio List', 'mirya' ),
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
			<ul class="portfolio-filter list-unstyled">
				<li class="active" data-filter="*"><?php echo $settings['filter1'] ?></li>
				<li data-filter=".one"><?php echo $settings['filter2'] ?></li>
				<li data-filter=".two"><?php echo $settings['filter3'] ?></li>
				<li data-filter=".three"><?php echo $settings['filter4'] ?></li>
			</ul>
			<div class="portfolio-content">
				<div class="row grid">
				    <?php foreach ( $settings['portfolio_list'] as $item ) : ?>
					<div class="col-md-4 col-sm-6 grid-item <?php echo esc_attr($item['item_control']); ?>">
						<div class="item">
						    <?php echo '<img class="img-responsive" src="' . $item['item_image']['url'] . '">'; ?>
							<div class="overlay">
								<h4><?php echo $item['item_title'] ?></h4>
								<a href="<?php echo $item['item_image']['url'] ?>"><i class="fa fa-link"></i></a>
								<span><?php echo $item['item_category'] ?></span>
							</div>
						</div>
					</div>			
					<?php endforeach; ?>
				</div>
			</div>
		</div>

        <?php
	}
	
	
}