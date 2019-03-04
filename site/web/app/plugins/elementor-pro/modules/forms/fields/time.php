<?php
namespace ElementorPro\Modules\Forms\Fields;

use ElementorPro\Modules\Forms\Classes;
use Elementor\Controls_Manager;
use ElementorPro\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Time extends Field_Base {

	public $depended_scripts = [
		'flatpickr',
	];

	public $depended_styles = [
		'flatpickr',
	];

	public function get_type() {
		return 'time';
	}

	public function get_name() {
		return __( 'Time', 'elementor-pro' );
	}

	public function update_controls( $widget ) {
		$elementor = Plugin::elementor();

		$control_data = $elementor->controls_manager->get_control_from_stack( $widget->get_unique_name(), 'form_fields' );

		if ( is_wp_error( $control_data ) ) {
			return;
		}

		$use_native = [
			'name' => 'use_native_time',
			'label' => __( 'Native HTML5', 'elementor-pro' ),
			'type' => Controls_Manager::SWITCHER,
			'condition' => [
				'field_type' => $this->get_type(),
			],
			'tab' => 'content',
			'inner_tab' => 'form_fields_content_tab',
			'tabs_wrapper' => 'form_fields_tabs',
		];

		foreach ( $control_data['fields'] as $index => $field ) {
			if ( 'placeholder' !== $field['name'] ) {
				continue;
			}
			foreach ( $field['conditions']['terms'] as $condition_index => $terms ) {
				if ( ! isset( $terms['name'] ) || 'field_type' !== $terms['name'] || ! isset( $terms['operator'] ) || 'in' !== $terms['operator'] ) {
					continue;
				}
				$control_data['fields'][ $index ]['conditions']['terms'][ $condition_index ]['value'][] = $this->get_type();
				break;
			}
			break;
		}

		$new_order = [];
		foreach ( $control_data['fields'] as $index => $field ) {
			if ( 'required' === $field['name'] ) {
				$new_order[] = $field;
				$new_order[] = $use_native;
			} else {
				$new_order[] = $field;
			}
		}

		$control_data['fields'] = $new_order;
		unset( $new_order );

		$widget->update_control( 'form_fields', $control_data );
	}

	public function render( $item, $item_index, $form ) {
		$form->add_render_attribute( 'input' . $item_index, 'class', 'elementor-field-textual elementor-time-field' );
		if ( isset( $item['use_native_time'] ) && 'yes' === $item['use_native_time'] ) {
			$form->add_render_attribute( 'input' . $item_index, 'class', 'elementor-use-native' );
		}
		echo '<input ' . $form->get_render_attribute_string( 'input' . $item_index ) . '>';
	}

	public function validation( $field, Classes\Form_Record $record, Classes\Ajax_Handler $ajax_handler ) {
		if ( preg_match( '/^(([0-1][0-9])|(2[0-3])):[0-5][0-9]$/', $field['value'] ) !== 1 ) {
			$ajax_handler->add_error( $field['id'], __( 'Invalid Time, Time should be in HH:MM format!', 'elementor-pro' ) );
		}
	}
}