<?php 
$component_data['global_spacing_options'] = array (
  'top_spacing' => 'pt-16 lg:pt-24',
  'bottom_spacing' => 'pb-16 lg:pb-24',
); 
$component_data['heading'] = array (
  'tag' => 'h2',
  'text' => 'Who We Serve',
); 
$component_data['items'] = array (
  0 => 
  array (
    'title' => 'Employment',
    'description' => 'Businesses nationwide choose Validity to assist in the creation and enhancement of their employment screening program. We’ll give you the resources you need to build the team you’ve always wanted.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => '#',
      'target' => '',
    ),
  ),
  1 => 
  array (
    'title' => 'Volunteering',
    'description' => 'It’s incumbent upon every organization to properly screen their volunteers, but no one passed along the “how-to” manual. Fortunately, we’ve authored our own manual and can help you create an efficient, cost-effective, and compliant (yes, there are laws to address) volunteer screening program.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => '#',
      'target' => '',
    ),
  ),
  2 => 
  array (
    'title' => 'Academics',
    'description' => 'Do you need to create a new student screening program based on a clinical site’s requirements, or do you simply need to add an automated drug testing program? We work with you to successfully (and easily) implement such programs.',
    'link' => 
    array (
      'title' => 'Learn More',
      'url' => '#',
      'target' => '',
    ),
  ),
); 
?>
<?php ll_include_component('line-list', $component_data, array("classes"=>array(),"id"=>"") );?>