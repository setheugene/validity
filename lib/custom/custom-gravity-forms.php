<?php
add_filter( 'gform_disable_form_theme_css', '__return_true' );

/*
 * Change the submit button to be an actual button element rather
 * than input submit. This is so we can style the inputs the exact
 * same as other buttons, which often have pseudo elements that aren't
 * allowed on inputs
 */
function ll_custom_gform_submit( $submit_button, $form ) {
  if(!empty($form['cssClass'])) {
    if ( strpos( $form['cssClass'], 'form-skin' ) !== false || strpos( $form['cssClass'], 'inline-form' ) !== false ) {
      $submit_button = "<button class='primary-btn green' id='gform_submit_button_{$form['id']}' type='submit'><span class='circle'><svg class='right-arrow-btn-icon' width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><g><path class='right' d='M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z' fill='white'></path><path class='line' d='M12 8.10022L2 8.10022' stroke='white' stroke-linecap='round'></path></g></svg></span><span class='duration-200 btn-title'>{$form['button']['text']}</span></button>";
    }
  }
  return $submit_button;
}
add_filter( 'gform_submit_button', 'll_custom_gform_submit', 10, 2 );

function ll_custom_gform_next( $next_button, $form ) {
  if(!empty($form['cssClass'])) {
    if ( strpos( $form['cssClass'], 'form-skin' ) !== false || strpos( $form['cssClass'], 'inline-form' ) !== false ) {
      $next_button = "<button class='mt-6 button primary-btn green next-btn gform_next_button' id='gform_next_button_{$form['id']}' type='submit'><span style='margin-top: 1px;' class='circle'><svg class='right-arrow-btn-icon' width='16' height='16' viewBox='0 0 16 16' fill='none' xmlns='http://www.w3.org/2000/svg'><g><path class='right' d='M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z' fill='white'></path><path class='line' d='M12 8.10022L2 8.10022' stroke='white' stroke-linecap='round'></path></g></svg></span><span class='duration-200 btn-title'>{$next_button}</span></button>";
    }
  }
  return $next_button;
}
add_filter( 'gform_next_button', 'll_custom_gform_next', 10, 2 );

function ll_edit_choice_fields_markup( $field_content, $field ) {
  /*
   * Only continue if we're not on the form editor screen
   * and we're not on the entry screen. This is to ensure
   * we're only editing markup on the front end of the site
   */
  if ( $field->is_entry_detail() || $field->is_form_editor() )
    return $field_content;

  switch ( $field->type ) {
    case 'select':
      /*
       * Add a chevron icon right after select inputs
       */
      $field_content =  str_replace( '</select>', '</select><svg class="pointer-events-none fill-current icon icon-chevron-down select-dropdown-arrow"><use xlink:href="#icon-chevron-down"></use></svg>' , $field_content );
      break;

      case 'address':
        $field_content = str_replace( '<select', '<span class="relative block"><select', $field_content );
        $field_content = str_replace( '</select>', '</select><svg class="pointer-events-none fill-current icon icon-chevron-down select-dropdown-arrow"><use xlink:href="#icon-chevron-down"></use></svg></span>', $field_content);
        return $field_content;
      break;

    /*
     * Add selected / unselected icons for radios and checkboxes
     */
    // case 'checkbox':
    //   if ( $field->choices ) {
    //     foreach( $field->choices as $field_choice ) {
    //       $field_content =  str_replace( "{$field_choice['text']}</label>", "<svg class='fill-current icon icon-checkbox'><use xlink:href='#icon-checkbox'></use></svg><svg class='fill-current icon icon-checkbox-checked'><use xlink:href='#icon-checkbox-checked'></use></svg>{$field_choice['text']}</label>" , $field_content );
    //     }

    //     return $field_content;
    //   }
    //   break;
    // case 'radio':
    //   if ( $field->choices ) {
    //     foreach( $field->choices as $field_choice ) {
    //       $field_content =  str_replace( "{$field_choice['text']}</label>", "<svg class='fill-current icon icon-radio'><use xlink:href='#icon-radio'></use></svg><svg class='fill-current icon icon-radio-selected'><use xlink:href='#icon-radio-selected'></use></svg>{$field_choice['text']}</label>" , $field_content );
    //     }

    //     return $field_content;
    //   }
    //   break;

    /*
     * Add selected / unselected icon for consent field
     */
    // case 'consent' :
    //   $field_content =  str_replace( "{$field['checkboxLabel']}</label>", "<svg class='fill-current icon icon-checkbox'><use xlink:href='#icon-checkbox'></use></svg><svg class='fill-current icon icon-checkbox-checked'><use xlink:href='#icon-checkbox-checked'></use></svg>{$field['checkboxLabel']}</label>" , $field_content );
    //   return $field_content;
    //   break;

    default:
      break;
  }

  return $field_content;
}
add_filter( 'gform_field_content', 'll_edit_choice_fields_markup', 10, 2 );

/*
* Add class based on the field type to the fields parent wrapper
*/
add_filter( 'gform_field_css_class', 'add_gfield_type_class', 10, 3 );
function add_gfield_type_class( $classes, $field, $form ) {
  $classes .= ' ll_gfield_type_' . $field->type;
  return $classes;
}

/* Prevent page from jumping to top of form on submit
 * Note: This will also effect multipage forms and exceptions may need to be handled for
 * them
 * TODO : check if a form is multipaged and return something other than false
 */
if ( function_exists( 'gravity_form' ) ) {
  add_filter( 'gform_confirmation_anchor', '__return_false' );
}

add_action( 'gform_field_appearance_settings', 'll_add_radio_style_setting', 10, 2 );
function ll_add_radio_style_setting( $position, $form_id ) {
    if ( $position == 50 ) {
        ?>
        <li class="ll_radio_style_setting field_setting">
            <label for="field_ll_radio_style_value">
              <?php _e("Radio Style", "ll"); ?>
            </label>
            <select id="field_ll_radio_style_value" onchange="SetFieldProperty('llRadioStyle', this.value);">
              <option value="ll-radio-style--default">Default</option>
              <option value="ll-radio-style--buttons">Buttons</option>
            </select>

        </li>
        <?php
    }
}

// Show the appearance setting on radio and checkbox fields
add_action( 'gform_editor_js', 'll_editor_script' );
function ll_editor_script(){
    ?>
    <script type='text/javascript'>
        //adding setting to fields of type "text"
        fieldSettings.radio += ', .ll_radio_style_setting';
        //binding to the load field settings event to initialize the checkbox
        jQuery(document).on('gform_load_field_settings', function(event, field, form){
            jQuery( '#field_ll_radio_style_value' ).val( rgar( field, 'llRadioStyle' ) );
        });
    </script>
    <?php
}

// add class to field if setting is checked
add_filter( 'gform_field_css_class', 'll_radio_style_field', 10, 3 );
function ll_radio_style_field( $classes, $field, $form ) {
    $classes .= ' ' . $field['llRadioStyle'];
    return $classes;
}

function add_white_arrow_to_confirmation_content( $confirmation, $form, $entry, $ajax ) {
  $confirmation = str_replace('data-white-arrow="true">', '><span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"/><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"/></g></svg></span>', $confirmation);
  return $confirmation;
}
add_filter( 'gform_confirmation', 'add_white_arrow_to_confirmation_content', 10, 4 );
