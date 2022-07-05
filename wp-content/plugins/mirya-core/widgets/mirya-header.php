<?php

class mirya_header_widget extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'mirya-header';
	}
	
	public function get_title() {
		return 'Mirya Header';
	}
	
	public function get_icon() {
		return 'fa fa-home';
	}
	
	public function get_categories() {
		return [ 'mirya-category' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'mirya' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text1',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Text', 'mirya' ),
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'mirya' ),
			]
		);

		$this->add_control(
			'text2',
			[
				'label' => __( 'Text', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Text', 'mirya' ),
			]
		);

		$this->add_control(
			'firststring',
			[
				'label' => __( 'First String', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter First String', 'mirya' ),
			]
        );
        
        $this->add_control(
			'secondstring',
			[
				'label' => __( 'Second String', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter Second String', 'mirya' ),
			]
        );
        
        $this->add_control(
			'thirdstring',
			[
				'label' => __( 'Third String', 'mirya' ),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __( 'Enter Third String', 'mirya' ),
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
            <div class="intro display-table">
                <div class="display-table-cell">
					<h3><?php echo $settings['text1'] ?></h3>
					<h1><?php echo $settings['title'] ?></h1>
					<h3><?php echo $settings['text2'] ?> <span></span></h3>
					<a href="<?php echo esc_url($url) ?>" class="main-btn"><span><?php echo $settings['buttontext'] ?></span></a>
				</div>
			</div>
			<div class="arrow">
				<a href="#about" class="main-btn"><i class="fa fa-angle-down"></i></a>
			</div>
			<div class="divider">
				<svg class="wave" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1920px" height="322.61px" viewBox="0 0 1920 322.61" enable-background="new 0 0 1920 322.61" xml:space="preserve">
					<path opacity="0.3" fill="rgba(249,249,249,.2)" d="M1920,0.125c-119.022-1.873-267.412,16.756-405.666,93.152
					C1217.826,257.123,1036.001,280.94,802.595,239.68s-268.61-60.067-530.169,3.501C161.642,270.105,69.463,273.733,0,268.972v53.639
					h1920V0.125z"/>
					<path opacity="0.5" fill="rgba(207,156,99,.4)" d="M1920,41.35c-111.979-14.35-253.634-4.298-401.009,78.27
					C1186.982,305.628,981,284.61,781.744,247.61s-216.231-44.568-477.79,19C183.522,295.88,78.391,296.893,0,289.466v33.145h1920V41.35
					z"/>
					<path fill="#232222" d="M1920,55.904c-99.143-1.178-229.965,20.125-392.831,92.893
					c-419.874,187.597-610.347,138.584-745.425,111.032s-204.133-34.643-465.692,28.926C192.241,318.846,81.893,318.814,0,310.438
					v12.173h1920V55.904z"/>  
				</svg>
			</div>
		</div>

		<script>

			var typed = new Typed('.home h3 span', {
				strings: ["<?php echo $settings['firststring'] ?>", "<?php echo $settings['secondstring'] ?>", "<?php echo $settings['thirdstring'] ?>"],
                cursorChar: "",
                typeSpeed: 30,
                loop: true,
                backSpeed: 30
			});

		</script>

        <?php
	}
	
}