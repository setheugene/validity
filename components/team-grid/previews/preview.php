<?php 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Our Team',
); 
$component_data['per_row'] = '6'; 
$component_data['members'] = array (
  0 => 624,
  1 => 622,
  2 => 620,
  3 => 609,
  4 => 625,
  5 => 619,
  6 => 623,
  7 => 621,
); 
?>
<?php ll_include_component('team-grid', $component_data, array("classes"=>array(),"id"=>"") );?>