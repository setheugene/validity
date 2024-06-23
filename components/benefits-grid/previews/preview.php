<?php 
$component_data['top_spacing'] = 'pt-16 lg:pt-24'; 
$component_data['bottom_spacing'] = 'pb-16 lg:pb-24'; 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Why Choose Validity Screening Services?',
); 
$component_data['benefits'] = array (
  0 => 
  array (
    'animated_icon' => 'concierge-service',
    'title' => 'Concierge Service',
    'description' => '<p>With Clients in all 50 states and 180 countries, thousands of organizations across a broad range of industries have trusted us with their screening needs.</p>
',
  ),
  1 => 
  array (
    'animated_icon' => 'dedicated-support',
    'title' => 'Dedicated Support',
    'description' => '<p>No matter your issues, Clients will have access to friendly and knowledgeable screening experts who will work tirelessly to meet their needs.</p>
',
  ),
  2 => 
  array (
    'animated_icon' => 'exceptional-care',
    'title' => 'Exceptional Care',
    'description' => '<p>Clients will have access to friendly and knowledgeable screening experts who will work tirelessly to meet their, no matter your issues, Clients will have access to friendly and knowledgeable screening experts who will work tirelessly to meet their needs.</p>
',
  ),
  3 => 
  array (
    'animated_icon' => 'flexible-solutions',
    'title' => 'Flexible Solutions',
    'description' => '<p>Whether you’re a freight company with drivers nationwide or a university medical program with strict admission requirements, we’ve got you covered.</p>
',
  ),
); 
?>
<?php ll_include_component('benefits-grid', $component_data, array("classes"=>array(),"id"=>"") );?>