<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['add_microdata'] = false; 
$component_data['faq_categories'] = NULL; 
$component_data['faqs'] = NULL; 
$component_data['icon_type'] = 'plus-minus'; 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Frequently Asked Questions',
); 
$component_data['items'] = array (
  0 => 
  array (
    'title' => 'Can you perform verifications in other countries?',
    'content' => '<p>Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries? Can you perform verifications in other countries?</p>
',
  ),
  1 => 
  array (
    'title' => 'How do I get in touch with support if I need it?',
    'content' => '<p>You can get in touch with our Client Care team by giving us a call at <a href="tel:9133225999">913.322.5999</a>.</p>
',
  ),
); 
$component_data['show'] = 'manual'; 
?>
<?php ll_include_component('content-accordion', $component_data, array("classes"=>array(),"id"=>"") );?>