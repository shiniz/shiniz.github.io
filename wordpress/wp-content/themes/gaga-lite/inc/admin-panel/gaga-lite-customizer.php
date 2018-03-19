<?php
/**
 * Enqueue scripts and styles for admin.
 */
function gaga_lite_customizer_scripts() {
    wp_enqueue_style( 'gaga-lite-customizer-style' , get_template_directory_uri().'/css/customizer-custom.css');
    wp_localize_script( 'gaga-lite-customizer-script' , 'gaga_lite_template_path'  , array('template_path'=> get_template_directory_uri()));
}

add_action( 'customize_controls_enqueue_scripts', 'gaga_lite_customizer_scripts');


add_action('customize_register','gaga_lite_add_customizer');
function gaga_lite_add_customizer($wp_customize){
    
    require get_template_directory().'/inc/admin-panel/gaga-lite-options.php';
    require get_template_directory().'/inc/admin-panel/gaga-lite-sanitize.php';

    /** Remove unuse default section**/
    $wp_customize->remove_section( 'header_image');
    $wp_customize->remove_section( 'background_image');

    /** Add panel loop**/
    foreach($gaga_lite_panels as $gaga_lite_panel):
        $wp_customize->add_panel($gaga_lite_panel['id'],$gaga_lite_panel['args']);
    endforeach;
    
    /** Add section loop**/
    foreach($gaga_lite_sections as $gaga_lite_section):
        $wp_customize->add_section($gaga_lite_section['id'],$gaga_lite_section['args']);
    endforeach;

    /** Add controls loop**/
    foreach($gaga_lite_controls as $gaga_lite_control) :
        $wp_customize->add_control($gaga_lite_control['id'], $gaga_lite_control['args']);
    endforeach;

    /** Add bg color loop**/
    foreach($gaga_lite_bg_color_controls as $gaga_lite_bg_color_control):
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,$gaga_lite_bg_color_control['id'],$gaga_lite_bg_color_control['args']));
    endforeach;
    /** Add bg image loop**/
    foreach($gaga_lite_bg_image_controls as $gaga_lite_bg_image_control):
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,$gaga_lite_bg_image_control['id'],$gaga_lite_bg_image_control['args']));
    endforeach;
    
     function bg_image_option_about( $control ) {
            if($control->manager->get_setting('gaga-lite-about_bg_image')->value() != ''){
                return true;
                
            }else{
                return false;
            }
        }
        function bg_image_option_portfolio( $control ) {
            if($control->manager->get_setting('gaga-lite-portfolio_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        } 
        function bg_image_option_service( $control ) {
            if($control->manager->get_setting('gaga-lite-service_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        } 
        function bg_image_option_blog( $control ) {
            if($control->manager->get_setting('gaga-lite-blog_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_shop( $control ) {
            if($control->manager->get_setting('gaga-lite-shop_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_cta( $control ) {
            if($control->manager->get_setting('gaga-lite-cta_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_testimonial( $control ) {
            if($control->manager->get_setting('gaga-lite-testimonial_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_team( $control ) {
            if($control->manager->get_setting('gaga-lite-team_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        
        function bg_image_option_client( $control ) {
            if($control->manager->get_setting('gaga-lite-client_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_skill( $control ) {
            if($control->manager->get_setting('gaga-lite-skill_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
        function bg_image_option_pricing( $control ) {
            if($control->manager->get_setting('gaga-lite-pricing_bg_image')->value() != ''){
                return true;
            }else{
                return false;
            }
        }
}

if( class_exists( 'WP_Customize_Control' ) || class_exists( 'WP_Customize_Section' ) ) :
    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Gaga_Lite_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'gaga-pro';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';
        public $pro_text1 = '';
        public $title1 = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';
        public $pro_url1 = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['title1'] = $this->title1;
            $json['pro_text1'] = $this->pro_text1;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['pro_url1']  = $this->pro_url1;
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
                <h3 class="accordion-section-title">
                    {{ data.title1 }}
                    <# if ( data.pro_text1 && data.pro_url1 ) { #>
                        <a href="{{ data.pro_url1 }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text1 }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
endif;
?>