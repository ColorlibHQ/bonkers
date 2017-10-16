<?php

/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class Bonkers_Multiple_Checkbox_Control extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'bonkers-checkbox-multiple';

	/**
	 * @since  1.0.0
	 * @access public
	 * @var array
	 */
	public $choices = array();

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function json() {

		$json            = parent::json();
		$json['id']      = $this->id;
		$json['link']    = $this->get_link();
		$json['value']   = $this->value();
		$json['choices'] = $this->choices;

		return $json;

	}

	public function render_content() { }

	public function content_template() {
	?>
		<# var values = _.invert( data.value ); #>
		<label>
			<span class="customize-control-title">
				{{{ data.label }}}
				<# if( data.description ){ #>
					<i class="dashicons dashicons-editor-help" style="vertical-align: text-bottom; position: relative;">
						<span class="mte-tooltip">
							{{{ data.description }}}
						</span>
					</i>
				<# } #>
			</span>
			<ul>
				<# for ( choice in data.choices ) { #>
				<li>
					<label>
						<input type="checkbox" value="{{ choice }}" <# if( _.has( values, choice ) ){ #> checked="checked" <# } #> class="bonkers-multi-checkbox" /> 
						{{ data.choices[choice] }}
					</label>
				</li>
				<# } #>
			</ul>
		</label>



	<?php
	}

}
