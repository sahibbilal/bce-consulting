<?php

class Custom_Walker_Category extends Walker_Category {

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        $output .= "\n<li" . ( $depth ? ' class="child-category"' : '' ) . '>' .
            '<label class="selectit ' . esc_attr( $category->slug ) . '"><input value="' . $category->term_id . '" type="checkbox" name="post_category[]" id="in-category-' . $category->term_id . '"' . ( in_array( $category->term_id, $args['selected_cats'] ) ? ' checked="checked"' : '' ) . ' /> ' .
            esc_attr( $category->name ) . '</label>';
    }
}