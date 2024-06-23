<?php

LL_Wysiwyg()->add_format( array(
  'title' => 'Buttons & Links',
  'items' => array(
    array(
      'title'    => 'Standard Button - Green',
      'classes'  => 'primary-btn green',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-white-arrow' => "true"
      )
    ),
    array(
      'title'    => 'Large Button - Green',
      'classes'  => 'primary-btn large green',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-white-arrow' => "true"
      )
    ),
    array(
      'title'    => 'Standard Button - White',
      'classes'  => 'primary-btn white',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-black-arrow' => "true"
      )
    ),
    array(
      'title'    => 'Large Button - White',
      'classes'  => 'primary-btn large white',
      'selector' => 'a',
      'wrapper'  => false,
      'attributes' => array(
        'data-black-arrow' => "true"
      )
    ),
    array(
      'title' => 'Button Group',
      'classes' => 'btn-group', // if changing class update line 15 of LL_Wysiwyg>plugins>buttonGroup>plugin.js to include your new class(es)
      'wrapper' => true,
      'block' => 'div',
    )
  )
) );
