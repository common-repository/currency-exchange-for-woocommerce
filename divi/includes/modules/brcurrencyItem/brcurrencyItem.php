<?php

class ET_Builder_Module_brcurrency_item extends ET_Builder_Module {
	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);
    function init() {
		$this->name                        = esc_html__( 'Currency Line Text', 'et_builder' );
		$this->slug                        = 'et_pb_brcurrency_item';
		$this->vb_support                  = 'on';
		$this->type                        = 'child';
		$this->child_title_var             = 'line_type';
		$this->advanced_setting_title_text = esc_html__( 'New Currency Line Text', 'et_builder' );
		$this->settings_text               = esc_html__( 'Currency Line Text Settings', 'et_builder' );
		$this->main_css_element            = '%%order_class%%';

        $this->whitelisted_fields = array(
            'line_type',
        );

        $this->fields_defaults = array(
            'line_type'                => array('text'),
        );
    }

    function get_fields() {
        $fields = array(
            'line_type' => array(
                "label"           => esc_html__( 'Item Type', 'currency-exchange-for-woocommerce' ),
                'type'            => 'select',
                'options'         => array(
                    'text'     => esc_html__( 'Text', 'currency-exchange-for-woocommerce' ),
                    'custom'     => esc_html__( 'Custom', 'currency-exchange-for-woocommerce' ),
                    'flag'     => esc_html__( 'Flag', 'currency-exchange-for-woocommerce' ),
                    'symbol'     => esc_html__( 'Symbol', 'currency-exchange-for-woocommerce' ),
                    'image'     => esc_html__( 'Image', 'currency-exchange-for-woocommerce' ),
                    'space'     => esc_html__( 'Space', 'currency-exchange-for-woocommerce' ),
                )
            ),
        );

        return $fields;
    }

    function render( $atts, $content = null, $function_name = '' ) {
        $props = $this->props;
        return esc_html($props['line_type']).',';
    }
}

new ET_Builder_Module_brcurrency_item;
