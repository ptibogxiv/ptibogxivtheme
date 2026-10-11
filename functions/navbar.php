<?php

class ptibogxivtheme_walker_nav_menu extends Walker_Nav_menu {
	private $has_children_at_depth = array();

	function start_lvl( &$output, $depth = 0, $args = array() ){ // ul
		$indent = str_repeat("\t",$depth); // indents the outputted HTML
		$output .= "\n$indent<div class=\"menu depth_$depth\">\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</div>\n";
	}

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span

    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

    $li_attributes = '';
		$class_names = $value = '';
		$has_children = ! empty( $args->walker->has_children );
		$this->has_children_at_depth[ $depth ] = $has_children;

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = $depth === 0 ? 'nav-item' : '';
		$classes[] = 'nav-item-' . $item->ID;

		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		if ( 0 === $depth ) {
			$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
		} elseif ( $has_children ) {
			$output .= $indent . '<div class="submenu">';
		}

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

		$link_class = $depth > 0 ? 'menu-item' : 'nav-link';
		$attributes .= ' class="' . $link_class . ' ' . ptibogxivtheme_NavbarTopFg() . '"';
		if ( $has_children ) {
			$attributes .= ' data-bs-toggle="menu" aria-expanded="false"';
			if ( $depth > 0 ) {
				$attributes .= ' data-bs-placement="right-start"';
			}
		}

		$item_output = $args->before;
		$item_output .= ( $has_children && $depth > 0 ? '<button type="button"' : '<a' ) . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $has_children && $depth > 0 ) ? '</button>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$has_children = ! empty( $this->has_children_at_depth[ $depth ] );
		unset( $this->has_children_at_depth[ $depth ] );

		if ( 0 === $depth ) {
			$output .= "</li>\n";
		} elseif ( $has_children ) {
			$output .= "</div>\n";
		}
	}
  
}

/*
Register Navbar
*/

register_nav_menu('navbar', __('Navbar', 'ptibogxivtheme'));
