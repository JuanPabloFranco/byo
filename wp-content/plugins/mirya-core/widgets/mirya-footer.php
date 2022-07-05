<?php

class mirya_footer_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-footer';
	}
	
	public function get_title() {
		return 'Mirya Footer';
	}
	
	public function get_icon() {
		return 'fa fa-copyright';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'social_section',
			[
				'label' => __( 'Social Icons', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' => __( 'Icon', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the icon font name (ex: fa-facebook)', 'mirya' ),
			]
		);

		$repeater->add_control(
			'social_link',
			[
				'label'         => __( 'Link', 'mirya' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'mirya' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);

		$this->add_control(
			'social_list',
			[
				'label'   => __( 'Social list', 'mirya' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'copyright_section',
			[
				'label' => __( 'Copyright', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Copyright Text', 'mirya' ),
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
			<ul class="footer-social-icons list-unstyled">
			    <?php foreach ( $settings['social_list'] as $item ) : ?>
				<li>
					<a href="<?php echo esc_url( $item['social_link']['url'] ); ?>">
						<i class="fa <?php echo $item['social_icon']; ?>"></i>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="copyright">
				<p><?php echo $settings['text'] ?></p>
			</div>
		</div>

        <?php
	}
	
	
}