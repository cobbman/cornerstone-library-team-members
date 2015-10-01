<?php

// Promo
// =============================================================================

function csl_shortcode_teammember( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'style' => '',
    'name'  => '',
    'title' => '',
    'color' => '',
    'image' => '',
    'alt'   => ''
  ), $atts, 'csl_teammember' ) );

  $id    = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"'     : '';
  $class = ( $class != '' ) ? 'teammember ' . esc_attr( $class ) : 'teammember';
  $style = ( $style != '' ) ? 'style="' . $style . '"'           : '';
  $name  = ( $name  != '' ) ? esc_attr( $name )                  : '';
  $title = ( $title != '' ) ? esc_attr( $title )                 : '';
  $color = ( $color != '' ) ? $color                             : '#00a94e';
  $image = ( $image != '' ) ? $image                             : '';
  $alt   = ( $alt   != '' ) ? 'alt="' . $alt . '"'               : '';

  if ( is_numeric( $image ) ) {
    $image_info = wp_get_attachment_image_src( $image, 'full' );
    $image      = $image_info[0];
  }

  $output = "<div {$id} class=\"{$class}\" {$style}>"
            . '<div class="teammember-image-wrap">'
              . "<img src=\"{$image}\" {$alt}/>"
              . "<div class=\"teammember-info\" style=\"background-color:{$color};\">"
                . "<div class=\"teammember-name\">$name</div>"
                . "<div class=\"teammember-title\">$title</div>"
              . '</div>'
              . "<div class=view-profile style=\"background-color:{$color};\">View Profile</div>"
            . '</div>'
            . '<div class="teammember-bio-overlay">'
              . '<div class="x-container max width">'
                . "<a href=# class=t-close style=\"background-color:{$color};\">x</a>"
                . '<div class="teammember-bio-content">'
                  . "<img src=\"{$image}\" class=\"alignleft\"/>"
                  . "<div class=\"teammember-name\">$name</div>"
                  . "<div class=\"teammember-title\">$title</div>"
                  . do_shortcode( $content )
                . '</div>'
              . '</div>'
            . '</div>'
          . "</div>";

  return $output;
}

add_shortcode( 'csl_teammember', 'csl_shortcode_teammember' );