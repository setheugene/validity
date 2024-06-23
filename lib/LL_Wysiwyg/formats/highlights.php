<?php

LL_Wysiwyg()->add_format( array(
  'title' => 'Highlight',
  'items' => array(
    array(
      'title'    => 'White',
      'classes'  => 'text-white',
      'selector' => 'p, a, span, li, h1, h2, h3, h4, h5, h6',
      'wrapper'  => false,
      'inline'   => 'span'
    )
  )
) );
