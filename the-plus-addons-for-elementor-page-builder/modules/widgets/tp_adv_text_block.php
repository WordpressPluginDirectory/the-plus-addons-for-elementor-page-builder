<?php 
/**
 * Widget Name: TP Text Block
 * Description: Content of text text block.
 * Author: Theplus
 * Author URI: https://posimyth.com
 *
 * @package ThePlus
 */

namespace TheplusAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

use TheplusAddons\L_Theplus_Element_Load;

/**
 * Exit if accessed directly.
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class L_ThePlus_Post_Content
 */
class L_ThePlus_Adv_Text_Block extends Widget_Base {

	/**
	 * Document Link For Need help.
	 *
	 * @since 5.3.3
	 * @access private
	 * 
	 * @var TpDoc of the class.
	 */
	public $TpDoc = L_THEPLUS_Tpdoc;
		
	/**
	 * Get Widget Name.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'tp-adv-text-block';
	}

	/**
	 * Get Widget Title.
	 *
	 * @since 1.0.0
	 * @access public
	 */
    public function get_title() {
        return esc_html__('TP Text Block', 'tpebl');
    }

	/**
	 * Get Widget Icon.
	 *
	 * @since 1.0.0
	 * @access public
	 */
    public function get_icon() {
        return 'fa fa-file-text theplus_backend_icon';
    }

	/**
	 * Get Widget categories.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
        return array('plus-essential');
    }

	/**
	 * Get Widget keywords.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
        return [ 'Advance Text Block', 'Advanced Text Block', 'Text Block', 'Text Box', 'Enhanced Text Block', 'Improved Text Block', 'Customizable Text Block', 'Stylish Text Block', 'Unique Text Block', 'Elementor Text Block', 'Elementor Advanced Text Block', 'Elementor Enhanced Text Block', 'Elementor Customizable Text Block', 'Elementor Stylish Text Block, Elementor Unique Text Block', 'Elementor Addon Text Block', 'Text Editor', 'Rich Text Editor', 'Elementor Text Editor', 'Elementor Rich Text Editor' ];
    }

	/**
	 * Get Widget Custom Help Url.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_custom_help_url() {
		$DocUrl =  $this->TpDoc . "advanced-text";

		return esc_url($DocUrl);
	}    

	/**
	 * Register controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function register_controls() {
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Advanced Text Block', 'tpebl' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'content_description',
			[
				'label' => wp_kses_post( "Description <a class='tp-docs-link' href='" . esc_url($this->TpDoc) . "advanced-text-block-elementor?utm_source=wpbackend&utm_medium=elementoreditor&utm_campaign=widget' target='_blank' rel='noopener noreferrer'> <i class='eicon-help-o'></i> </a>", 'theplus' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'tpebl' ),
				'placeholder' => esc_html__( 'Type your description here', 'tpebl' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'tpebl' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'tpebl' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'tpebl' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'tpebl' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'tpebl' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'prefix_class' => 'text-%s',
			]
		);
		$this->add_control(
			'display_count',
			[
				'label' => wp_kses_post( "Description Limit <a class='tp-docs-link' href='" . esc_url($this->TpDoc) . "limit-wordcount-text-widget-elementor?utm_source=wpbackend&utm_medium=elementoreditor&utm_campaign=widget' target='_blank' rel='noopener noreferrer'> <i class='eicon-help-o'></i> </a>", 'theplus' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tpebl' ),
				'label_off' => esc_html__( 'Hide', 'tpebl' ),
				'default' => 'no',
				'separator' => 'before',
			]
		);
		$this->add_control(
            'display_count_by', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Limit on', 'tpebl'),
                'default' => 'char',
                'options' => [
                    'char' => esc_html__('Character', 'tpebl'),
                    'word' => esc_html__('Word', 'tpebl'),                    
                ],
				'condition'   => [
					'display_count'    => 'yes',
				],
            ]
        );
		$this->add_control(
			'display_count_input',
			[
				'label' => esc_html__( 'Count', 'tpebl' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 1000,
				'step' => 1,
				'condition'   => [
					'display_count'    => 'yes',
				],
			]
		);
		$this->add_control(
			'display_3_dots',
			[
				'label' => esc_html__( 'Display Dots', 'tpebl' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tpebl' ),
				'label_off' => esc_html__( 'Hide', 'tpebl' ),
				'default' => 'yes',
				'condition'   => [
					'display_count'    => 'yes',
				],
			]
		);	
		$this->end_controls_section();
		
		$this->start_controls_section(
            'section_styling',
            [
                'label' => esc_html__('Typography', 'tpebl'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
            'content_color',
            [
                'label' => esc_html__('Text Color', 'tpebl'),
                'type' => Controls_Manager::COLOR,
                'default' => '#888',
                'selectors' => [
                    '{{WRAPPER}} .pt_plus_adv_text_block .text-content-block p,{{WRAPPER}} .pt_plus_adv_text_block .text-content-block' => 'color:{{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__('Typography', 'tpebl'),
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT
				],
                'selector' => '{{WRAPPER}} .pt_plus_adv_text_block .text-content-block,{{WRAPPER}} .pt_plus_adv_text_block .text-content-block p',
            ]
        );
		
		$this->end_controls_section();
		/*Adv tab*/
		$this->start_controls_section(
            'section_plus_extra_adv',
            [
                'label' => esc_html__('Plus Extras', 'tpebl'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );
		$this->end_controls_section();
		/*Adv tab*/
		$this->start_controls_section(
            'section_animation_styling',
            [
                'label' => esc_html__('On Scroll View Animation', 'tpebl'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'animation_effects',
			[
				'label'   => esc_html__( 'In Animation Effect', 'tpebl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no-animation',
				'options' => l_theplus_get_animation_options(),
			]
		);
		$this->add_control(
            'animation_delay',
            [
                'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Animation Delay', 'tpebl'),
				'default' => [
					'unit' => '',
					'size' => 50,
				],
				'range' => [
					'' => [
						'min'	=> 0,
						'max'	=> 4000,
						'step' => 15,
					],
				],
				'condition' => [
					'animation_effects!' => 'no-animation',
				],
            ]
        );
		$this->add_control(
            'animation_duration_default',
            [
				'label'   => esc_html__( 'Animation Duration', 'tpebl' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'animation_effects!' => 'no-animation',
				],
			]
		);
		$this->add_control(
            'animate_duration',
            [
                'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Duration Speed', 'tpebl'),
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min'	=> 100,
						'max'	=> 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'animation_effects!' => 'no-animation',
					'animation_duration_default' => 'yes',
				],
            ]
        );
		$this->add_control(
			'animation_out_effects',
			[
				'label'   => esc_html__( 'Out Animation Effect', 'tpebl' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no-animation',
				'options' => l_theplus_get_out_animation_options(),
				'separator' => 'before',
				'condition' => [
					'animation_effects!' => 'no-animation',
				],
			]
		);
		$this->add_control(
            'animation_out_delay',
            [
                'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Out Animation Delay', 'tpebl'),
				'default' => [
					'unit' => '',
					'size' => 50,
				],
				'range' => [
					'' => [
						'min'	=> 0,
						'max'	=> 4000,
						'step' => 15,
					],
				],
				'condition' => [
					'animation_effects!' => 'no-animation',
					'animation_out_effects!' => 'no-animation',
				],
            ]
        );
		$this->add_control(
            'animation_out_duration_default',
            [
				'label'   => esc_html__( 'Out Animation Duration', 'tpebl' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'animation_effects!' => 'no-animation',
					'animation_out_effects!' => 'no-animation',
				],
			]
		);
		$this->add_control(
            'animation_out_duration',
            [
                'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Duration Speed', 'tpebl'),
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'min'	=> 100,
						'max'	=> 10000,
						'step' => 100,
					],
				],
				'condition' => [
					'animation_effects!' => 'no-animation',
					'animation_out_effects!' => 'no-animation',
					'animation_out_duration_default' => 'yes',
				],
            ]
        );
		$this->end_controls_section();

		include L_THEPLUS_PATH. 'modules/widgets/theplus-needhelp.php';
	}
	
	/**
	 * limit Words.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function l_limit_words($string, $word_limit){
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
	
	/**
	 * Render Progress Bar
	 *
	 * Written in PHP and HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

        $settings = $this->get_settings_for_display();
		
		if((!empty($settings['display_count']) && $settings['display_count']=='yes') && !empty($settings['display_count_input'])){			
			if(!empty($settings['display_count_by'])){				
				if($settings['display_count_by']=='char'){
					$content_description = substr($settings['content_description'],0,$settings['display_count_input']);										
				}else if($settings['display_count_by']=='word'){
					$content_description = $this->l_limit_words($settings['content_description'],$settings['display_count_input']);					
				}
			}	
				if($settings['display_count_by']=='char'){
					if(strlen($settings["content_description"]) > $settings['display_count_input']){
						if(!empty($settings['display_3_dots']) && $settings['display_3_dots']=='yes'){
							$content_description .='...';
						}
					}
				}else if($settings['display_count_by']=='word'){
					if(str_word_count($settings["content_description"]) > $settings['display_count_input']){
						if(!empty($settings['display_3_dots']) && $settings['display_3_dots']=='yes'){
							$content_description .='...';
						}
					}
				}						
		}else{
			$content_description = $settings['content_description'];
		}
		
		
			$animation_effects=$settings["animation_effects"];
			$animation_delay= (!empty($settings["animation_delay"]["size"])) ? $settings["animation_delay"]["size"] : 50;
			if($animation_effects=='no-animation'){
				$animated_class = '';
				$animation_attr = '';
			}else{
				$animate_offset = l_theplus_scroll_animation();
				$animated_class = 'animate-general';
				$animation_attr = ' data-animate-type="'.esc_attr($animation_effects).'" data-animate-delay="'.esc_attr($animation_delay).'"';
				$animation_attr .= ' data-animate-offset="'.esc_attr($animate_offset).'"';
				if($settings["animation_duration_default"]=='yes'){
					$animate_duration=$settings["animate_duration"]["size"];
					$animation_attr .= ' data-animate-duration="'.esc_attr($animate_duration).'"';
				}
				if(!empty($settings["animation_out_effects"]) && $settings["animation_out_effects"]!='no-animation'){
					$animation_attr .= ' data-animate-out-type="'.esc_attr($settings["animation_out_effects"]).'" data-animate-out-delay="'.esc_attr($settings["animation_out_delay"]["size"]).'"';					
					if($settings["animation_out_duration_default"]=='yes'){						
						$animation_attr .= ' data-animate-out-duration="'.esc_attr($settings["animation_out_duration"]["size"]).'"';
					}
				}
			}			
			
			$text_block ='<div class="pt-plus-text-block-wrapper" >';
				$text_block .='<div class="text_block_parallax">';
					$text_block .='<div class="pt_plus_adv_text_block '.$animated_class.'" '.$animation_attr.'>';
						$text_block .= '<div class="text-content-block">';
							$text_block .= $content_description;
						$text_block .= '</div>';
					$text_block .='</div>';
				$text_block .='</div>';
			$text_block .='</div>';
			
		echo $text_block;
	}

	/**
	 * Load Widget content template
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function content_template() {}

}
