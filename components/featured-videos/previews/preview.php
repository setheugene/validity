<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => '0',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Featured Videos',
); 
$component_data['description'] = ''; 
$component_data['link'] = ''; 
$component_data['videos'] = array (
  0 => 659,
  1 => 651,
  2 => 656,
); 
?>
<?php ll_include_component('featured-videos', $component_data, array("classes"=>array(),"id"=>"") );?>