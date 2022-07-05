<?php

class mirya_about_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-about';
	}
	
	public function get_title() {
		return 'Mirya About';
	}
	
	public function get_icon() {
		return 'fa fa-vcard';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'About', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		$this->add_control(
			'intro',
			[
				'label' => __( 'Intro', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter about intro', 'mirya' ),
			]
        );
        
        $this->add_control(
			'text1',
			[
				'label' => __( 'Text1', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter text', 'mirya' ),
			]
        );
        
        $this->add_control(
			'text2',
			[
				'label' => __( 'Text2', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter text', 'mirya' ),
			]
        );
        
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'info',
			[
				'label' => __( 'Info', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter The text', 'mirya' ),
			]
		);

		$repeater->add_control(
			'value',
			[
				'label' => __( 'Value', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter The text', 'mirya' ),
			]
		);

		$this->add_control(
			'personal_info_list',
			[
				'label'   => __( 'Personal Info List', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);

		$this->add_control(
			'facebook_link',
			[
				'label' => __( 'Facebook Link', 'mirya' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mirya' ),
				'default' => [
					'url' => '',
				]
			]
		);

		$this->add_control(
			'twitter_link',
			[
				'label' => __( 'Twitter Link', 'mirya' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mirya' ),
				'default' => [
					'url' => '',
				]
			]
		);

		$this->add_control(
			'googleplus_link',
			[
				'label' => __( 'Google Plus Link', 'mirya' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mirya' ),
				'default' => [
					'url' => '',
				]
			]
		);

		$this->add_control(
			'linkedin_link',
			[
				'label' => __( 'Linkedin Link', 'mirya' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'mirya' ),
				'default' => [
					'url' => '',
				]
			]
		);

		$this->add_control(
			'behance_link',
			[
				'label' => __( 'Behance Link', 'mirya' ),
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
		
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="about-image">
					    <?php echo '<img class="img-responsive" src="' . $settings['image']['url'] . '" alt="about image">'; ?>
					</div>
				</div>
				<div class="col-md-7">
					<div class="about-info">
						<h3><?php echo $settings['title'] ?></h3>
						<h4><?php echo $settings['intro'] ?></h4>
						<p><?php echo $settings['text1'] ?></p>
						<p><?php echo $settings['text2'] ?></p>
						<div class="personal-info">
							<div class="row">
								<ul class="list-unstyled">
							        <?php foreach ( $settings['personal_info_list'] as $item ) : ?>
									<li class="col-xs-6 info-item"><span><?php echo $item['info']; ?>: </span><?php echo $item['value']; ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<div class="social-icons">
                                <a href="<?php echo esc_url( $settings['facebook_link']['url'] ); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo esc_url( $settings['twitter_link']['url'] ); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo esc_url( $settings['googleplus_link']['url'] ); ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="<?php echo esc_url( $settings['linkedin_link']['url'] ); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                <a href="<?php echo esc_url( $settings['behance_link']['url'] ); ?>" class="behance"><i class="fa fa-behance"></i></a>
                            </div>
						</div>    
					</div>
				</div>
			</div>
		</div>

        <?php
	}
	
	
}