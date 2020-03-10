<?php
/**
 * Customizer Settings and Controls
 *
 * @package Loader
 * @since 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

	/**
	* Quote Options
	*
	* @package Loader
	* @since 1.0.0
	*/


// Custom range slider control

if( class_exists( 'WP_Customize_Control' ) ) {
  class Loader_Customize_Range extends WP_Customize_Control {
    public $type = 'range';

        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            $defaults = array(
                'min' => 50,
                'max' => 200,
                'step' => 1
            );
            $args = wp_parse_args( $args, $defaults );

            $this->min = $args['min'];
            $this->max = $args['max'];
            $this->step = $args['step'];
        }

    public function render_content() {
    ?>
    <style>input[type=range]{-webkit-appearance:none;margin:10px 0;background-color:#fff}input[type=range]:focus{outline:0}input[type=range]::-webkit-slider-runnable-track{width:100%;height:12.8px;cursor:pointer;animate:.2s;box-shadow:0 0 0 #222,0 0 0 #222;background:#85d6ff;border-radius:25px;border:0 solid #222}input[type=range]::-webkit-slider-thumb{box-shadow:0 0 0 #222,0 0 0 #222;border:0 solid #222;height:20px;width:39px;border-radius:7px;background:#007cba;cursor:pointer;-webkit-appearance:none;margin-top:-3.6px}input[type=range]:focus::-webkit-slider-runnable-track{background:#85d6ff}input[type=range]::-moz-range-track{width:100%;height:12.8px;cursor:pointer;animate:.2s;box-shadow:0 0 0 #222,0 0 0 #222;background:#85d6ff;border-radius:25px;border:0 solid #222}input[type=range]::-moz-range-thumb{box-shadow:0 0 0 #222,0 0 0 #222;border:0 solid #222;height:20px;width:39px;border-radius:7px;background:#007cba;cursor:pointer}input[type=range]::-ms-track{width:100%;height:12.8px;cursor:pointer;animate:.2s;background:0 0;border-color:transparent;border-width:39px 0;color:transparent}input[type=range]::-ms-fill-lower{background:#85d6ff;border:0 solid #222;border-radius:50px;box-shadow:0 0 0 #222,0 0 0 #222}input[type=range]::-ms-fill-upper{background:#85d6ff;border:0 solid #222;border-radius:50px;box-shadow:0 0 0 #222,0 0 0 #222}input[type=range]::-ms-thumb{box-shadow:0 0 0 #222,0 0 0 #222;border:0 solid #222;height:20px;width:39px;border-radius:7px;background:#007cba;cursor:pointer}input[type=range]:focus::-ms-fill-lower{background:#85d6ff}input[type=range]:focus::-ms-fill-upper{background:#85d6ff}.value-show{color:#007caa;background:#fff;border-radius:20px;font-size:12px!important;border-bottom-left-radius:0;border-top-left-radius:0;margin-top:8px!important;padding:0;position:absolute}</style>
    <label>
      <span class="customize-control-title" style="font-weight: bold;"><?php echo esc_html( $this->label ); ?></span>
      <input class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>" step="<?php echo $this->step ?>" style='width:80%;'type='range' <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
            <input class="value-show" style="border:0;font-size:20px;font-weight:bold;width:20%;float:right;margin-top:-5px;" onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='button' disabled value='<?php echo esc_attr( $this->value() ); ?>'>
    </label>
    <?php
    }
  }
}





	//quotes setting
	$wp_customize->add_setting( 'loader_all_quotes',
	   array(
	      'default' => 'Add all your quotes here (one each line)!',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'sanitize_textarea_field'
	   )
	);

	//quotes control
	$wp_customize->add_control( 'loader_all_quotes', array(
	  'type' => 'textarea',
	  'settings'   => 'loader_all_quotes', 
	  'section' => 'loader_quotes',
	  'label' => __( 'Quotes', 'loader' ),
	  'description' => __( 'Add one quote per line to display them randomly on preloader screen.', 'loader' ),
      'description_hidden' => false, 
      'input_attrs' => array(
         'class' => 'wootext-input',
         'style' => 'border: 1px solid #0085ba; color: #0085ba; ',
         'placeholder' => __( 'Add one quote per line to display them randomly on preloader screen.', 'loader' ),),
	) );





	/**
	* Settings
	*
	* @package Loader
	* @since 1.0.0
	*/
	// Enable preloader setting
	$wp_customize->add_setting( 'enable_preloader',
	   array(
	      'default' => '1',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_checkbox'
	   )
	);
	 
	// Enable preloader control
	$wp_customize->add_control( 'enable_preloader', array(
	  'type' => 'checkbox',
	  'settings'   => 'enable_preloader', 
	  'section' => 'loader_settings',
	  'label' => __( 'Preloader', 'loader' ),
	  'description' => __( 'Enable or disable the preloader.', 'loader' ),
      'description_hidden' => false, 
	) );




	// Enable quotes setting
	$wp_customize->add_setting( 'enable_quotes',
	   array(
	      'default' => '1',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_checkbox'
	   )
	);
	 
	// Enable quotes control
	$wp_customize->add_control( 'enable_quotes', array(
	  'type' => 'checkbox',
	  'settings'   => 'enable_quotes', 
	  'section' => 'loader_settings',
	  'label' => __( 'Display Random Quotes', 'loader' ),
	  'description' => __( 'Enable to show a random quote on preloader screen.', 'loader' ),
      'description_hidden' => false, 
	) );




	// Enable preload on hover setting
	$wp_customize->add_setting( 'enable_preload',
	   array(
	      'default' => '1',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_checkbox'
	   )
	);
	 
	// Enable preload on hover control
	$wp_customize->add_control( 'enable_preload', array(
	  'type' => 'checkbox',
	  'settings'   => 'enable_preload',
	  'section' => 'loader_settings',
	  'label' => __( 'Preload Pages on Hover', 'loader' ),
	  'description' => __( 'Preloads links on hover for faster page load and better user experience.', 'loader' ),
      'description_hidden' => false, 
	) );





	/**
	* Preloader styles
	*
	* @package Loader
	* @since 1.0.0
	*/


	// select font setting
	$wp_customize->add_setting( 'loader_style_select',
	   array(
	      'default' => '1',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_select'
	   )
	);
	 
	 //select font control

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, 
	 'loader_style_select', 
	 array(
	    'label'      => __( 'Preloader Style', 'loader' ), 
	    'description' => __( 'Choose a preloader style.', 'loader' ),
	    'settings'   => 'loader_style_select', 
	    'priority'   => 10, 
	    'section'    => 'loader_style',
	    'type'    => 'select',
	    'choices' => array(
	        '1' => 'Preloader 1',
	        '2' => 'Preloader 2',
	        '3' => 'Preloader 3',
	        '4' => 'Preloader 4',
	        '5' => 'Preloader 5',
	        '6' => 'Preloader 6',
	        'image' => 'Custom Image',
	    )
	)
	) );




	// Loader background color setting
	$wp_customize->add_setting( 'loader_bg_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'refresh',
	  	'sanitize_callback' => 'sanitize_hex_color',
	) );
	 

	// Loader background color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loader_bg_color', array(
		'label'        => 'Background Color',
		'section'    => 'loader_style',
		'settings'   => 'loader_bg_color',
	) ) );


	// Loader primary color setting
	$wp_customize->add_setting( 'loader_primary_color' , array(
	    'default'     => '#222222',
	    'transport'   => 'refresh',
	  	'sanitize_callback' => 'sanitize_hex_color',
	) );
	 

	// Loader primary color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loader_primary_color', array(
		'label'        => 'Primary Color',
		'section'    => 'loader_style',
		'settings'   => 'loader_primary_color',
	) ) );   
          
     

    // Loader secondary color setting
	$wp_customize->add_setting( 'loader_secondary_color' , array(
	    'default'     => '#f2f2f2',
	    'transport'   => 'refresh',
	  	'sanitize_callback' => 'sanitize_hex_color',
	) );
	 

	// Loader secondary color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loader_secondary_color', array(
		'label'        => 'Secondary Color',
		'section'    => 'loader_style',
		'settings'   => 'loader_secondary_color',
	) ) );  


	// Loader quote color setting
	$wp_customize->add_setting( 'loader_quote_color' , array(
	    'default'     => '#222222',
	    'transport'   => 'refresh',
	  	'sanitize_callback' => 'sanitize_hex_color',
	) );
	 

	// Loader quote color control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loader_quote_color', array(
		'label'        => 'Quote Color',
		'section'    => 'loader_style',
		'settings'   => 'loader_quote_color',
	) ) );  

	// Quote font size
	$wp_customize->add_setting( 'loader_quote_size' , array(
	    'default'     => 20,
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	//Quote font size
	$wp_customize->add_control( new Loader_Customize_Range( $wp_customize, 'loader_quote_size', array(
	  'label' =>  'Quote Font Size',
	    'min' => 0,
	    'max' => 100,
	    'step' => 1,
	  'section' => 'loader_style',
	) ) );




	// preloader size
	$wp_customize->add_setting( 'loader_size' , array(
	    'default'     => 50,
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	//preloader size
	$wp_customize->add_control( new Loader_Customize_Range( $wp_customize, 'loader_size', array(
	  'label' =>  'Preloader Size',
	    'min' => 10,
	    'max' => 200,
	    'step' => 1,
	  'section' => 'loader_style',
	) ) );
  

          




	// Loader image setting
    $wp_customize->add_setting( 
        'loader_image', 
        array(
	      'transport' => 'refresh',
          'sanitize_callback' => 'loader_sanitize_image_upload'
        )
    );
      
    // Loader image control
    $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'loader_image', 
        array(
            'label'      => __( 'Preloader Image', 'loader' ),
            'section'    => 'loader_style'                   
        )

    ) ); 


    // select font setting
	$wp_customize->add_setting( 'loader_style_image',
	   array(
	      'default' => '1',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_select'
	   )
	);
	 
	 //select font control

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, 
	 'loader_style_image', 
	 array(
	    'label'      => __( 'Image Effect', 'loader' ), 
	    'description' => __( 'Select image preloader effect.', 'loader' ),
	    'settings'   => 'loader_style_image', 
	    'section'    => 'loader_style',
	    'type'    => 'select',
	    'choices' => array(
	        'none' => 'None',
	        'rotate' => 'Rotate',
	        'blink' => 'Blink',
	        'scale' => 'Scale',
	        'flip' => 'Flip',
	    )
	)
	) );





	/**
	* Preloader Only On Homepage
	*
	* @package Loader
	* @since 1.2.2
	*/

	// Enable preload on home setting
	$wp_customize->add_setting( 'only_home',
	   array(
	      'default' => '0',
	      'transport' => 'refresh',
	      'sanitize_callback' => 'loader_sanitize_checkbox'
	   )
	);
	 
	// Enable preload on home control
	$wp_customize->add_control( 'only_home', array(
	  'type' => 'checkbox',
	  'settings'   => 'only_home',
	  'section' => 'loader_settings',
	  'label' => __( 'Only on homepage', 'loader' ),
	  'description' => __( 'Display preloader screen only on homepage.', 'loader' ),
      'description_hidden' => false, 
	) );