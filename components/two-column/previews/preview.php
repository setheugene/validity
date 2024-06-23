<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Service Options',
); 
$component_data['columns'] = array (
  0 => 
  array (
    'title' => 'Employment',
    'description' => 'We go straight to the source, ensuring that you receive only the most accurate and up-to-date information for your candidate\'s previous employment records.',
  ),
  1 => 
  array (
    'title' => 'Education',
    'description' => 'Validity adds simplicity and saves organizations valuable time by performing verifications of college degrees, vocational degrees, GEDs, and more.',
  ),
  2 => 
  array (
    'title' => 'Credential',
    'description' => 'You won\'t need to search for another issuing agency again. With thousands of resources in our library, Validity can efficiently verify any credential or license.',
  ),
); 
?>
<?php ll_include_component('two-column', $component_data, array("classes"=>array(),"id"=>"") );?>