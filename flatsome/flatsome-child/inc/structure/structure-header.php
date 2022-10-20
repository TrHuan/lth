<?php
/**
 * Flatsome Structure.
 *
 * Header Structure.
 *
 * @package Flatsome\Structures
 */


/**
 * Header Viewport Meta.
 *
 * @return void
 */

function gco_flatsome_viewport_meta( $output ) {
    $output = '<meta name="viewport" content="width=device-width, initial-scale=1" />';
    return $output;
}
add_filter( 'flatsome_viewport_meta', 'gco_flatsome_viewport_meta', 1 );