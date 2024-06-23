<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Our Comprehensive Screening Process',
); 
$component_data['steps'] = array (
  0 => 
  array (
    'title' => 'Step 1',
    'description' => 'To start the screening process, Clients will submit a candidate’s applicable information through iDsource or through eJobApp.',
  ),
  1 => 
  array (
    'title' => 'Step 2',
    'description' => 'Once submitted, information is sent to Validity’s Verification Team, where it is divided amongst Validity’s network of specialized verifiers.',
  ),
  2 => 
  array (
    'title' => 'Step 3',
    'description' => 'Validity\'s verifier network will reach out to individual sources to verify the information provided by your candidate.',
  ),
); 
?>
<?php ll_include_component('process-steps', $component_data, array("classes"=>array(),"id"=>"") );?>