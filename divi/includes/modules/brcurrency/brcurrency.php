<?php

class ET_Builder_Module_brcurrency extends ET_Builder_Module {
	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);
    function init() {
		$this->name            = esc_html__( 'BeRocket Currency Exchange', 'et_builder' );
		$this->slug            = 'et_pb_brcurrency';
		$this->main_css_element = '%%order_class%%';
		$this->vb_support      = 'on';
		$this->child_slug      = 'et_pb_brcurrency_item';
		$this->child_item_text = esc_html__( 'Currency Line Text', 'et_builder' );
		$this->folder_name = 'et_pb_berocket_modules';

        $this->whitelisted_fields = array(
            'type',
        );

        $this->fields_defaults = array(
            'type'                => array('select'),
        );
		$this->advanced_fields = array(
			'fonts'         => array(
				'body'   => array(
					'css'          => array(
						'main'      => "{$this->main_css_element} select, {$this->main_css_element} label, {$this->main_css_element} label span",
						'important' => 'plugin_only',
					),
					'label' => esc_html__( 'Select', 'simp-simple' ),
                    'hide_line_height' => true,
				),
            ),
			'link_options'  => false,
			'visibility'    => false,
			'text'          => false,
			'transform'     => false,
			'animation'     => false,
			'background'    => false,
			'borders'       => false,
			'box_shadow'    => false,
			'button'        => false,
			'filters'       => false,
			'margin_padding'=> false,
			'max_width'     => false,
		);
    }

    function get_fields() {
        $fields = array(
            'type' => array(
                "label"           => esc_html__( 'Widget Type', 'currency-exchange-for-woocommerce' ),
                'type'            => 'select',
                'options'         => array(
                    'select'        => esc_html__( 'Select', 'currency-exchange-for-woocommerce' ),
                    'radio'         => esc_html__( 'Radio', 'currency-exchange-for-woocommerce' ),
                    'floating-bar'  => esc_html__( 'Floating Bar', 'currency-exchange-for-woocommerce' ),
                )
            ),
        );

        return $fields;
    }

    function render( $atts, $content = null, $function_name = '' ) {
        $atts = $this->props;
        $atts = BRCE_CurrencyExtension::convert_on_off($atts);
        $line_text = $this->content;
        $line_text = explode(',', $line_text);
        $correct_line_text = array();
        foreach($line_text as $line_text_el) {
            $line_text_el = sanitize_textarea_field($line_text_el);
            $line_text_el = trim($line_text_el);
            if( ! empty($line_text_el) ) {
                $correct_line_text[] = $line_text_el;
            }
        }
        $atts['currency_text'] = $correct_line_text;
        ob_start();
        the_widget( 'berocket_ce_widget', $atts );
        return ob_get_clean();
    }
}

new ET_Builder_Module_brcurrency;
