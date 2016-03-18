<?php

/**
 * Add "Styles" drop-down
 */ 
add_filter( 'mce_buttons_2', 'ht_mce_editor_buttons' );

function ht_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 */ 
add_filter( 'tiny_mce_before_init', 'ht_mce_before_init' );

function ht_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Introduction Paragraph',
            'selector' => 'p',
            'classes' => 'intro'
            ),
        array(
            'title' => 'PullQuote - Left',
            'selector' => 'p',
            'classes' => 'pullquote-left',
        ),
        array(
            'title' => 'PullQuote - Right',
            'block' => 'p',
            'classes' => 'pullquote-right',
            'wrapper' => true
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}