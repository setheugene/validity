<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => '<br />
The Latest From Validity<br />
',
); 
$component_data['posts'] = ''; 
?>
<?php ll_include_component('featured-blogs', $component_data, array("classes"=>array(),"id"=>"") );?>