<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Spot These Resume “Red Flags”',
); 
$component_data['fact_one'] = 'Fibs on resumes are much more common than a criminal record'; 
$component_data['fact_two'] = 'The most common embellishments are skill sets, previous job titles, length of employment, and falsified degrees'; 
$component_data['fact_three'] = '78% of resumes contain misleading information'; 
?>
<?php ll_include_component('red-flags', $component_data, array("classes"=>array(),"id"=>"") );?>