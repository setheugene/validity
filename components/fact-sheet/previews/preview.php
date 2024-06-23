<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['content'] = '<p class="hdg-3">Verification Fact Sheet</p>
<p>In case you or your boss still need convincing, our fact sheet contains even more info on the benefits of partnering with Validity.</p>
'; 
$component_data['button_text'] = 'Download the Fact Sheet'; 
$component_data['downloadable_file'] = 'http://validity-screening-solutions.local/wp-content/uploads/2023/11/sample.pdf'; 
?>
<?php ll_include_component('fact-sheet', $component_data, array("classes"=>array(),"id"=>"") );?>