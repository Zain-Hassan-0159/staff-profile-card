<?php
   /**
    * Profile Cards
    *
    * @package           Widget
    * @author            Zain Hassan
    * @copyright         2021 hassanzain.com
    * @license           GPL-2.0-or-later
    *
   */
   
   class staff_profile_cards_widget extends \Elementor\Widget_Base {
   
   	/**
   	 * Get widget name.
   	 *
   	 * Retrieve Profile Cards widget name.
   	 *
   	 * @since 1.0.0
   	 * @access public
   	 *
   	 * @return string Widget name.
   	 */
   	public function get_name() {
   		return 'spcw';
   	}
   
   	/**
   	 * Get widget title.
   	 *
   	 * Retrieve Profile Cards widget title.
   	 *
   	 * @since 1.0.0
   	 * @access public
   	 *
   	 * @return string Widget title.
   	 */
   	public function get_title() {
   		return __( 'Staff Profile Cards', 'profile-cards' );
   	}
   
   	/**
   	 * Get widget icon.
   	 *
   	 * Retrieve spcw widget icon.
   	 *
   	 * @since 1.0.0
   	 * @access public
   	 *
   	 * @return string Widget icon.
   	 */
   	public function get_icon() {
		return 'eicon-person'; 
   	}
   
   	/**
   	 * Get widget categories.
   	 *
   	 * Retrieve the list of categories the Profile Cards widget belongs to.
   	 *
   	 * @since 1.0.0
   	 * @access public
   	 *
   	 * @return array Widget categories.
   	 */
   	public function get_categories() {
   		return [ 'general' ];
   	}
   
   	/**
   	 * Register Profile Cards widget controls.
   	 *
   	 * Adds different input fields to allow the user to change and customize the widget settings.
   	 *
   	 * @since 1.0.0
   	 * @access protected
   	 */
   	protected function _register_controls() {
   
   	
   
   		$this->start_controls_section(
   			'content_section',
   			[
   				'label' => __( 'Content', 'profile-cards' ),
   				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
   			]
   		);

		$this->add_control(
			'bg_card_color',
			[
				'label' => __( 'Background and Icons Color', 'profile-cards' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);


   		$repeater = new \Elementor\Repeater();

   		$repeater->add_control(
   			'card_title',
   			[
   				'label' => __( 'Name', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => __( 'Name', 'profile-cards' ),
   				'placeholder' => __( 'Type your title here', 'profile-cards' ),
   			]
   		);
   
   		$repeater->add_control(
   			'card_subtitle',
   			[
   				'label' => __( 'Tag Line', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::TEXT,
   				'default' => __( 'Your Tag line here...', 'profile-cards' ),
   				'placeholder' => __( 'Type your title here', 'profile-cards' ),
   			]
   		);
   
   		$repeater->add_control(
   			'card_description',
   			[
   				'label' => __( 'Description', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::TEXTAREA,
   				'rows' => 10,
   				'default' => __( 'Description', 'profile-cards' ),
   				'placeholder' => __( 'Type your description here', 'profile-cards' ),
   			]
   		);
   
   		$repeater->add_control(
   			'image_profilee',
   			[
   				'label' => __( 'Choose Image', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::MEDIA,
   				'default' => [
   					'url' => 'https://images.unsplash.com/photo-1558222218-b7b54eede3f3',
   				],
   			]
   		);

		$repeater->add_control(
			'card_color',
			[
				'label' => __( 'Card Color', 'profile-cards' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);
   
   
   		$repeater->add_control(
   			'email_link',
   			[
   				'label' => __( 'Enter Email here', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::URL,
   				'placeholder' => __( 'https://your-link.com', 'profile-cards' ),
   				'show_external' => true,
   				'default' => [
   					'url' => 'zainhassan.dev@gmail.com',
   					'is_external' => true,
   					'nofollow' => true,
   				],
   			]
   		);
   
   		$repeater->add_control(
   			'twitter_link',
   			[
   				'label' => __( 'Twitter Link', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::URL,
   				'placeholder' => __( 'https://your-link.com', 'profile-cards' ),
   				'show_external' => true,
   				'default' => [
   					'url' => 'https://twitter.com/zainhassanPAK',
   					'is_external' => true,
   					'nofollow' => true,
   				],
   			]
   		);
   
   		$repeater->add_control(
   			'linkedin_link',
   			[
   				'label' => __( 'Linkedin Link', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::URL,
   				'placeholder' => __( 'https://your-link.com', 'profile-cards' ),
   				'show_external' => true,
   				'default' => [
   					'url' => 'https://www.linkedin.com/in/zainhassanpak/',
   					'is_external' => true,
   					'nofollow' => true,
   				],
   			]
   		);

   		$this->add_control(
   			'staff_card',
   			[
   				'label' => __( 'Cards List', 'profile-cards' ),
   				'type' => \Elementor\Controls_Manager::REPEATER,
   				'fields' => $repeater->get_controls(),
   				'default' => [
   					[
   						'list_title' => __( 'Card', 'profile-cards' ),
   						'list_content' => __( 'Item content. Click the edit button to change this text.', 'profile-cards' ),
   					],
   				],
   				'title_field' => '{{{ list_title }}}',
   			]
   		);

   		$this->end_controls_section();
   	}
   
   	/**
   	 * Render Profile Cards widget output on the frontend.
   	 *
   	 * Written in PHP and used to generate the final HTML.
   	 *
   	 * @since 1.0.0
   	 * @access protected
   	 */
   	protected function render() {
   
   		$settings = $this->get_settings_for_display();

   		if ( $settings['staff_card'] ) {
			?>
				<!-- Staff Section Start -->
				<section class="staff-card-widget-generic staff-card-widget">
					<div>
						<div class="cards">
							<?php
								foreach (  $settings['staff_card'] as $item ) {
									?>
							<div class="">
								<div data-description="<?php echo $item['card_description']; ?>" class="card" data-twitter="<?php echo $item['twitter_link']['url']; ?>" data-linkedin="<?php echo $item['linkedin_link']['url']; ?>" data-email="mailto:<?php echo $item['email_link']['url']; ?>">
								<div class="card-head">
									<img class="card__image" src="<?php echo $item['image_profilee']['url'] ?>" alt="Barrett">
								</div>
								<div style="background-color: <?php echo $item['card_color']; ?>;" class="card-body card__overlay">
									<div class="text">
										<h4><?php echo $item['card_title']; ?></h4>
										<span><?php echo $item['card_subtitle']; ?></span>
									</div>
									<div class="btn-a">Learn More</div>
								</div>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					</div>
				</section>
				<div style="background-color: <?php echo $settings['bg_card_color']?>d4;" class="staff-card-widget-details staff-card-widget-generic d-none">
					<div>
						<div>
							<div>
								<div class="data">
								<div class="card">
									<div class="card-body">
										<div class="outline-btn">
											<i style="color: <?php echo $settings['bg_card_color']?>;" class="far fa-times-circle"></i>
										</div>
										<div class="staff-img">
											<img src="images/Barrett.png" alt="">
										</div>
										<div class="staff-name">
											<h3>Michael Barrett</h3>
										</div>
										<div class="job-title">
											<h4>Executive Director</h4>
										</div>
										<div class="about">
											<h4>
											Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
											<h4>
										</div>
										<div class="bottom-icons">
											<div class="social">
											<a class="linkedin" href="https://www.linkedin.com/in/zainhassanpak/"><i style="color: <?php echo $settings['bg_card_color']?>;" class="fab fa-linkedin-in"></i></a>
											<a class="twitter" href="https://twitter.com/zainhassanPAK"><i style="color: <?php echo $settings['bg_card_color']?>;" class="fab fa-twitter"></i></a>
											<a class="email" type="email" href="mailto:zainhassan.dev@gmail.com"><i style="color: <?php echo $settings['bg_card_color']?>;" class="fas fa-at"></i></a>
											</div>
											<div class="buttons">
											<div class="left">
												<i style="color: <?php echo $settings['bg_card_color']?>;" class="far fa-arrow-alt-circle-left"></i>
											</div>
											<div class="right">
												<i style="color: <?php echo $settings['bg_card_color']?>;" class="far fa-arrow-alt-circle-right"></i>
											</div>
											</div>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Staff Section End -->
			<?php
		}
	}
}