<?php

class CSL_Team_Member extends Cornerstone_Element_Base {

  public function data() {
    return array(
      'name'        => 'teammember',
      'title'       => __( 'Team Member', csl18n() ),
      'section'     => 'marketing',
      'description' => __( 'A team member with pop-up bio.', csl18n() ),
      'supports'    => array( 'id', 'class', 'style' )
    );
  }


  public function controls() {

    $this->addControl(
      'name',
      'text',
      __( 'Name', csl18n() ),
      __( 'Enter team member\'s name.', csl18n() ),
      ''
    );

    $this->addControl(
      'title',
      'text',
      __( 'Job Title', csl18n() ),
      __( 'Enter team member\'s job title.', csl18n() ),
      ''
    );

    $this->addControl(
      'color',
      'color',
      __( 'Highlight Color', csl18n() ),
      __( 'Choose the highlight color', csl18n() ),
      ''
    );

    $this->addControl(
      'image',
      'image',
      __( 'Team Member Image &amp; Alt Text', csl18n() ),
      __( 'Select the image of your teammember. Alt text is used to describe an image to search engines.', csl18n() ),
      CS()->common()->placeholderImage( 500, 600 )
    );

    $this->addControl(
      'alt',
      'text',
      __( 'Image Alt Text', csl18n() ),
      NULL,
      ''
    );

    $this->addControl(
      'content',
      'editor',
      __( 'Member Bio &amp; Info.', csl18n() ),
      __( 'The content will be shown in a lightbox when the user clicks on this team member.', csl18n() ),
      ''
    );

  }

  public function render( $atts ) {

    extract( $atts );

    $shortcode = "[csl_teammember name=\"$name\" title=\"$title\" color=\"$color\" image=\"$image\" alt=\"$alt\"{$extra}]{$content}[/csl_teammember]";

    return $shortcode;

  }

}