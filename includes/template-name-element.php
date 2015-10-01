<?php
/**
 *
 * To discover more fields you can use, see examples from current Cornerstone elements! Here's where you'll find them:
 * In the Cornerstone plugin, look in /includes/modules/elements/ and /includes/modules/shortcodes
 *
 * You can find the function reference and inline documentation in this file (of the Cornerstone Plugin):
 *   -------------------------------------------
 *  |   /cornerstone/includes/utility/api.php   |
 *   -------------------------------------------
 *
 * For more documentation, please see: https://theme.co/community/kb/cornerstone-custom-elements/
 *
 **/
?>

<?php

class CSL_CSL_Team_Member extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'csl-csl-team-member',
      'title'       => __( 'CSL Team Member', csl18n() ),
      'section'     => 'content',
      'description' => __( 'CSL Team Member description.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' ),
      'childType'   => 'csl-csl-team-member-item',
      'renderChild' => true
    );
  }

  public function controls() {

    $this->addControl(
      'elements', // control name
      'sortable', // control type
      __( 'CSL Team Member Items', csl18n() ), // Message
      __( 'Add a new item to your CSL Team Member.', csl18n() ), // Tooltip text
      array(
        array( 'title' => __( 'CSL Team Member 1', csl18n() ), 'content' => __( 'Add some content to your CSL Team Member here.', csl18n() ) ),
        array( 'title' => __( 'CSL Team Member 2', csl18n() ), 'content' => __( 'Add some content to your CSL Team Member here.', csl18n() ) )
      ), // placeholder content or default items
      array(
        'newTitle' => __( 'CSL Team Member %s', csl18n() ),
        'floor'    => 1
      ) // new item format
    );

    $this->addSupport( 'id',
      array( 'options' => array( 'monospace' => true ) )
    );
  }

  public function render( $atts ) {

    extract( $atts );

    $contents = '';

    foreach ( $elements as $e ) {

      $item_extra = $this->extra( array(
        'id'    => $e['id'],
        'class' => $e['class'],
        'style' => $e['style']
      ) );

      $e['parent_id'] = ( $link_items == 'true' && $id != '' ) ? $id : '';

      $contents .= '[csl_csl_team_member_item title="' . $e['title'] . '" ';
      $contents .= 'open="' . $e['open']  . '"' . $item_extra . ']' . $e['content'] . '[/csl_csl_team_member_item]';

    }

    $shortcode = "[csl_csl_team_member{$extra}]{$contents}[/csl_csl_team_member]";

    return $shortcode;

  }

}