<?php

global $gravityview_view;

extract( $gravityview_view->field_data );

// Only show the link to logged-in users with the rigth caps.
if( !GravityView_Delete_Entry::check_user_cap_delete_entry( $entry, $field_settings ) ) {
	return;
}

$link_text = empty( $field_settings['delete_link'] ) ? __('Delete Entry', 'gravityview') : $field_settings['delete_link'];

$link_text = apply_filters( 'gravityview_entry_link', GravityView_API::replace_variables( $link_text, $form, $entry ) );

$href = GravityView_Delete_Entry::get_delete_link( $entry );

$attributes = array(
	'onclick' => GravityView_Delete_Entry::get_confirm_dialog()
);

echo gravityview_get_link( $href, $link_text, $attributes );
