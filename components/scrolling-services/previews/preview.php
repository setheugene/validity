<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Our Services',
); 
$component_data['services'] = array (
  0 => 
  array (
    'title' => 'Verifications',
    'description' => 'Validity’s verifications team leverages thousands of our own verifying party sources with live researchers.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => 'http://$',
      'target' => '',
    ),
  ),
  1 => 
  array (
    'title' => 'Criminal Records',
    'description' => 'Validity provides the highest quality data via record searches from official court record repositories.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => '#',
      'target' => '',
    ),
  ),
  2 => 
  array (
    'title' => 'Driving Records',
    'description' => 'Validity will report any employee or applicant\'s moving violations, suspensions, revocations, or expirations.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => '#',
      'target' => '',
    ),
  ),
); 
?>
<?php ll_include_component('scrolling-services', $component_data, array("classes"=>array(),"id"=>"") );?>