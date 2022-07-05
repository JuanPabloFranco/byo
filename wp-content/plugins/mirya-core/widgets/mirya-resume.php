<?php

class mirya_resume_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-resume';
	}
	
	public function get_title() {
		return 'Mirya Resume';
	}
	
	public function get_icon() {
		return 'fa fa-graduation-cap';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'education_section',
			[
				'label' => __( 'Education Content', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'education_main_title',
			[
				'label' => __( 'Main Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'education_date',
			[
				'label' => __( 'Date', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the date', 'mirya' ),
			]
		);

		$repeater->add_control(
			'education_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'education_desc',
			[
				'label' => __( 'Description', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the description', 'mirya' ),
			]
		);

		$this->add_control(
			'education_list',
			[
				'label'   => __( 'Education List', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'experience_section',
			[
				'label' => __( 'Experience Content', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'experience_main_title',
			[
				'label' => __( 'Main Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'experience_date',
			[
				'label' => __( 'Date', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the date', 'mirya' ),
			]
		);

		$repeater->add_control(
			'experience_title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'mirya' ),
			]
		);

		$repeater->add_control(
			'experience_desc',
			[
				'label' => __( 'Description', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the description', 'mirya' ),
			]
		);

		$this->add_control(
			'experience_list',
			[
				'label'   => __( 'Experience List', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Resume Button', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'buttontext',
			[
				'label' => __( 'Button Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter Button Text', 'mirya' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Button URL', 'mirya' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mirya' ),
				'default' => [
					'url' => '',
				]
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {

		$settings = $this->get_settings_for_display();
		$url = $settings['link']['url'];
		?>

		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="education">
						<div class="resume-title">
							<i class="fa fa-graduation-cap fa-2x"></i>
							<h3><?php echo $settings['education_main_title'] ?></h3>
						</div>
						<div class="resume-content">
						    <?php foreach ( $settings['education_list'] as $item ) : ?>
							<div class="resume-item">
								<div class="resume-year"><?php echo $item['education_date'] ?></div>
								<div class="resume-details">
									<i class="fa fa-graduation-cap fa-2x"></i>
									<span><?php echo $item['education_title'] ?></span>
									<p><?php echo $item['education_desc'] ?></p>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="experience">
						<div class="resume-title">
							<i class="fa fa-suitcase fa-2x"></i>
							<h3><?php echo $settings['experience_main_title'] ?></h3>
						</div>
						<div class="resume-content">
						    <?php foreach ( $settings['experience_list'] as $item ) : ?>
							<div class="resume-item">
								<div class="resume-year"><?php echo $item['experience_date'] ?></div>
								<div class="resume-details">
									<i class="fa fa-suitcase fa-2x"></i>
									<span><?php echo $item['experience_title'] ?></span>
									<p><?php echo $item['experience_desc'] ?></p>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="download-resume text-center">
				<a href="<?php echo esc_url($url) ?>" class="main-btn"><span><?php echo $settings['buttontext'] ?></span></a>
			</div>
		</div>

        <?php
	}
	
	
}