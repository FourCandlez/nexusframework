<?php

function nxs_widgets_formbox_geticonid() {
	//$widget_name = basename(dirname(__FILE__));
	return "nxs-icon-contact";
}

// Setting the widget title
function nxs_widgets_formbox_gettitle() {
	return nxs_l18n__("Form", "nxs_td");
}

// Unistyle
function nxs_widgets_formbox_getunifiedstylinggroup() {
	return "formboxwidget";
}

// Used by the individual formitem widgets to determine an automated unique ID
function nxs_widgets_formbox_getclientsideprefix($postid, $placeholderid) {
	$result = "nxs_fb_" . md5($postid) . "_" . $placeholderid . "_";
	return $result;
}

function nxs_widgets_renderinformbox($widget, $args) 
{
	// we invoke the method of the contactbox, same as formbox
	$functionnametoinvoke = 'nxs_widgets_' . $widget . '_renderinformbox';
	// invokefunction
	if (function_exists($functionnametoinvoke)) {
		$result = call_user_func($functionnametoinvoke, $args);
	} else {
		nxs_webmethod_return_nack("function not found; " . $functionnametoinvoke);	
	}
	return $result;
}

function nxs_widgets_formbox_getstoragefileextension($metadata)
{
	// the file will be stored in a .php file extension,
	// which will help to ensure the file is not downloadable
	return "php";
}

function nxs_widgets_formbox_getstorageabsfolder($metadata)
{
	$upload_dir_meta = wp_upload_dir();
	$upload_dir = $upload_dir_meta["basedir"];
	$storagerelfolder = "nxsforms";
	$storageabsfolder = $upload_dir . "/" . $storagerelfolder;
	
	if(!is_dir($storageabsfolder)) 
	{
		// if the folder doesn't yet exist, create it!
		mkdir($storageabsfolder, 0750, true);
	}

	return $storageabsfolder;
}

function nxs_widgets_formbox_getfileuploadstorageabsfolder($metadata)
{
	$upload_dir_meta = wp_upload_dir();
	$upload_dir = $upload_dir_meta["basedir"];
	
	$formidentifier = nxs_widgets_formbox_getidentifier($metadata);

	$storagerelfolder = "nxsformsfiles";
	$storageabsfolder = "{$upload_dir}/{$storagerelfolder}/{$formidentifier}/";

	if(!is_dir($storageabsfolder)) 
	{
		// if the folder doesn't yet exist, create it!
		mkdir($storageabsfolder, 0755, true);
	}

	return $storageabsfolder;
}

function nxs_widgets_formbox_getfileuploadstorageabsfolderurl($metadata)
{
	$upload_dir_meta = wp_upload_dir();
	$upload_dir = $upload_dir_meta["baseurl"];
	
	$formidentifier = nxs_widgets_formbox_getidentifier($metadata);

	$storagerelfolder = "nxsformsfiles";
	$storageabsfolder = "{$upload_dir}/{$storagerelfolder}/{$formidentifier}/";
	
	return $storageabsfolder;
}

function nxs_widgets_formbox_getidentifier($metadata)
{
	extract($metadata);
	// remove any strange characters
	$formidentifier = nxs_stripspecialchars($formidentifier);
	if ($formidentifier == "")
	{
		$formidentifier = "default";
	}
	return $formidentifier;
}

function nxs_widgets_formbox_shouldstoreonfilesystem($metadata)
{
	return false;
	/*
	$result = $metadata["storeonfs"] != "";
	return $result;
	*/
}

function nxs_widgets_formbox_getpath($metadata)
{
	extract($metadata);
	
	// store submitted form on the filesystem or in the DB
	$shouldstoreonfs = nxs_widgets_formbox_shouldstoreonfilesystem($metadata);
	if ($shouldstoreonfs)
	{		
		$storageabsfolder = nxs_widgets_formbox_getstorageabsfolder($metadata);

		// remove any strange characters
		$formidentifier = nxs_widgets_formbox_getidentifier($metadata);
		$fileextension = nxs_widgets_formbox_getstoragefileextension($metadata);
		$storagefilename = "{$formidentifier}.{$fileextension}";
		
		$storageabspath = $storageabsfolder . "/" . $storagefilename;
		if (!is_file($storageabspath))
		{
			// append header
			
			file_put_contents($storageabspath, "<?php header('HTTP/1.1 403 Unauthorized'); echo '403 Unauthorized'; exit; ?>This file is auto generated by Nexus Themes. It contains submitted form data.\r\n", FILE_APPEND | LOCK_EX);
			// set permissions to limited
			chmod($storageabspath, 0750);
		}
		
		$result = $storageabspath;
	}
	else
	{
		$result = "";
	}
	
	return $result;
}

function nxs_widgets_formbox_submittedforms($optionvalues, $args, $runtimeblendeddata) 
{
	nxs_ob_start();
	
	extract($optionvalues);

	$storageabspath = nxs_widgets_formbox_getpath($runtimeblendeddata);
	
	if ($storageabspath != "")
	{
		?>
		<div>
			Data of submitted forms are stored in the following file:<br />
			<pre><?php echo $storageabspath; ?></pre>
		</div>
		<?php
	}

	$fileextension = nxs_widgets_formbox_getstoragefileextension($runtimeblendeddata);
	$formidentifier = nxs_widgets_formbox_getidentifier($runtimeblendeddata);
 	$itemdetailurl = home_url('/') . "?nxs_admin=admin&backendpagetype=formdetail&formname=" . $formidentifier . "." . $fileextension;

	?>
    <div class="nxs-float-left" style="width: 100%;">
    	<a href='<?php echo $itemdetailurl;?>'>Open persisted forms</a>
    </div>		
    <div class="nxs-clear"></div>
  	<?php
	$result = nxs_ob_get_contents();
	nxs_ob_end_clean();
	return $result;
}

/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_formbox_home_getoptions($args) 
{
	$options = array
	(
		"sheettitle" 		=> nxs_widgets_formbox_gettitle(),
		"sheeticonid" 		=> nxs_widgets_formbox_geticonid(),
		"supporturl" => "https://www.wpsupporthelp.com/wordpress-questions/forms-wordpress-questions-62/",
		"unifiedstyling" 	=> array("group" => nxs_widgets_formbox_getunifiedstylinggroup(),),		
		"fields" 			=> array
		(
			array
			( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Lookups",
				"initial_toggle_state"	=> "closed-if-empty",
				"initial_toggle_state_id" => "lookups",
			),
			array
			(
				"id" 				=> "lookups",
				"type" 				=> "textarea",
				"label" 			=> nxs_l18n__("Lookups", "nxs_td"),
			),
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),
			
			/*
			
			// DATA PROTECTION
			
			array
			( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Control processing of Personal Data",
			),
			array
			(
				"id" 				=> "dataprotection_controller_label",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Controller label", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("", "nxs_td"),
			),
			array
			(
				"id" 				=> "dataprotection_control_option",
				"type" 				=> "select",
				"dropdown" => nxs_widgets_formbox_getcontroloptions(),
				"label" 			=> nxs_l18n__("Control option", "nxs_td"),
			),			
			array
			(
				"id" 				=> "dataprotection_data_retention",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Data retention", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("", "nxs_td"),
			),

			array
			(
				"id" 				=> "dataprotection_why",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Why", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("", "nxs_td"),
			),
			array
			(
				"id" 				=> "dataprotection_security",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Security", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("", "nxs_td"),
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),
			
			*/
												
			// TITLE	
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Title",
				"initial_toggle_state"	=> "closed-if-empty",
				"initial_toggle_state_id" => "title",
			),
			
			array(
				"id" 				=> "title",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Title", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Title goes here", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "title_heading",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Title importance", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("title_heading"),
				"unistylablefield"	=> true
			),
			
			array(
				"id" 				=> "title_alignment",
				"type" 				=> "radiobuttons",
				"subtype" 			=> "halign",
				"label" 			=> nxs_l18n__("Title alignment", "nxs_td"),
				"unistylablefield"	=> true
			),
						
			array(
				"id" 				=> "title_fontsize",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Override title fontsize", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("fontsize"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "top_info_color",
				"type" 				=> "colorzen",
				"label" 			=> nxs_l18n__("Top info color", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id"     			=> "top_info_padding",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Top info padding", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("padding"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "icon",
				"type" 				=> "icon",
				"label" 			=> nxs_l18n__("Icon", "nxs_td"),
			),
			array(
				"id"     			=> "icon_scale",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Icon scale", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("icon_scale"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),	
			
			// TEXT
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Text", "nxs_td"),
				"initial_toggle_state"	=> "closed-if-empty",
				"initial_toggle_state_id" => "text",
			),
			array(
				"id" 				=> "text",
				"type" 				=> "tinymce",
				"label" 			=> nxs_l18n__("Text", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Text goes here", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "text_alignment",
				"type" 				=> "radiobuttons",
				"subtype" 			=> "halign",
				"label" 			=> nxs_l18n__("Text alignment", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),	
			
			// FORM CONFIGURATION
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Form configuration", "nxs_td"),
			),
			
			array(
				"id" 				=> "items_genericlistid",
				"type" 				=> "staticgenericlist_link",
				"tooltip" 			=> nxs_l18n__("Each form can have a custom set of input fields (text fields, dates, selections). Press the Edit button to the right to modify the fields used on this form.", "nxs_td"),
				"label" 			=> nxs_l18n__("Form fields", "nxs_td"),
				"unicontentablefield" => true,
			),
			
			array
			(
				"id" 				=> "items_data",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Form fields (programmatic)", "nxs_td"),
				"unicontentablefield" => true,
			),
			
			array(
				"id" 				=> "formidentifier",
				"type" 				=> "input",
				"label" 			=> "Identifier",
				"placeholder" 		=> "Title goes here",
				"tooltip" 			=> nxs_l18n__("Semantic and identifying name of this form. This identifies the container used to store submitted forms.", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),
			array( 
				"id" 				=> "items_colorzen",
				"type" 				=> "colorzen",
				"label" 			=> nxs_l18n__("Form fields color", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),		
			
			// BUTTON		
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Button", "nxs_td"),
				// "initial_toggle_state"	=> "closed",
			),

			array(
				"id" 				=> "button_text",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Button text", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Read more", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "button_scale",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Button size", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("button_scale"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "button_alignment",
				"type" 				=> "radiobuttons",
				"subtype" 			=> "halign",
				"label" 			=> nxs_l18n__("Button alignment", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "button_color",
				"type" 				=> "colorzen", // "select",
				"label" 			=> nxs_l18n__("Button color", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "button_border_radius",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Button border radius", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("border_radius"),
				"unistylablefield"	=> true
			),

			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
			),
			
			
			
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Submit handling - Email",	
			),
			
			/*			
			array
			( 
				"id" 				=> "sendoutmail",
				"type" 				=> "custom",
				"layouttype" => "",
				"label" 			=> nxs_l18n__("Send mail to recipient?", "nxs_td"),
				"customcontent" => "<input type='checkbox' disabled='disabled' checked='checked' />",
			),
			*/
			
			array(
				"id" 				=> "internal_email",
				"type" 				=> "input",
				"label" 			=> "Email address to notify",
				"placeholder" 		=> "Internal email",
				"tooltip" 			=> nxs_l18n__("Enter here a valid existing e-mail address (most likely: your e-mail address) that should be notified when this form is submitted, for example yourname@yourdomain.com", "nxs_td"),
				"footernote" => "<div class='content' style='font-size: smaller; font-style: italic;'><a target='_blank' href='https://www.wpsupporthelp.com/answer/the-e-mail-is-not-working-sending-i-m-not-receiving-emails-from-294/'>Not receiving e-mails? Click here</a></div>",
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "subject_email",
				"type" 				=> "input",
				"label" 			=> "Subject email",
				"placeholder" 		=> "Subject email",
				"tooltip" 			=> nxs_l18n__("Is there a particular subject you want to use for the notification e-mail? If so, enter it here (for example: information request from website)", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "sender_email",
				"type" 				=> "input",
				"label" 			=> "Sender email",
				"placeholder" 		=> "Internal email",
				"tooltip" 			=> nxs_l18n__("Enter a valid e-mail address here to use as the sender of the notification mails (for example: site@yourname.com).", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "sender_name",
				"type" 				=> "input",
				"label" 			=> "Sender name",
				"placeholder" 		=> "Name of email sender",
				"tooltip" 			=> nxs_l18n__("What should be the name of the sender of the notifications? (for example: Your Name)", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "mail_body_includesourceurl",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Include form source URL", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("When checked, the source URL from where this form was posted will be included in the email send", "nxs_td"),
				"unicontentablefield" => true,
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),	
			/*
			array
			( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Submit handling - File system",
				"initial_toggle_state"	=> "closed-if-empty",
				"initial_toggle_state_id" => "storeonfs",			
			),
			
			array
			( 
				"id" 				=> "storeonfs",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Persist on file system?", "nxs_td"),
			),
			array
			( 
				"id" 				=> "submittedforms",
				"type" 					=> "custom",
				"customcontenthandler"	=> "nxs_widgets_formbox_submittedforms",
				"label" 			=> nxs_l18n__("", "nxs_td"),
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),	
			*/
			array
			( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Submit handling - Thank you page",
			),
			
			array(
				"id" 				=> "destination_articleid",
				"type" 				=> "article_link",
				"label" 			=> nxs_l18n__("Thank you page", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("Use this to thank the visitor for taking the time to send an email by redirecting them to this page.", "nxs_td"),
				"unistylablefield"	=> true,
			),
			
			array
			( 
				"id" 				=> "destination_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Thank you URL", "nxs_td"),
				"unistylablefield"	=> true,
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),	
			/*			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Debug",
				"initial_toggle_state"	=> "closed",
			),
			array
			(
				"id" 				=> "debug",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Debug", "nxs_td"),
			),
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),
			*/
		)
	);
	
	nxs_extend_widgetoptionfields($options, array("backgroundstyle"));
	
	return $options;
}

/* WIDGET HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_formbox_render_webpart_render_htmlvisualization($args) 
{	
	// Importing variables
	extract($args);
	
	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// Set options with unistyled params
	$unistyle = $temp_array["unistyle"];
	if (isset($unistyle) && $unistyle != "") {
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_formbox_getunifiedstylinggroup(), $unistyle);
		$temp_array = array_merge($temp_array, $unistyleproperties);	
	}
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = array_merge($temp_array, $args);
	
	// Translate model magical fields
	if (true)
	{
		global $nxs_g_modelmanager;
		
		$combined_lookups = nxs_lookups_getcombinedlookups_for_currenturl();
		$combined_lookups = array_merge($combined_lookups, nxs_parse_keyvalues($mixedattributes["lookups"]));
		$combined_lookups = nxs_lookups_evaluate_linebyline($combined_lookups);
		
		// replace values in mixedattributes with the lookup dictionary
		$magicfields = array("title", "text", "button_text", "internal_email", "sender_email", "items_data", "destination_url");
		$translateargs = array
		(
			"lookup" => $combined_lookups,
			"items" => $mixedattributes,
			"fields" => $magicfields,
		);
		$mixedattributes = nxs_filter_translate_v2($translateargs);
	}
	
	// Output the result array and setting the "result" position to "OK"
	$result = array();
	$result["result"] = "OK";
	
	// Widget specific variables
	extract($mixedattributes);

	if ($render_behaviour == "code")
	{
		//
	}
	else
	{
		//		
		$hovermenuargs = array();
		$hovermenuargs["postid"] = $postid;
		$hovermenuargs["placeholderid"] = $placeholderid;
		$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
		$hovermenuargs["metadata"] = $mixedattributes;	
		nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);
	}
	
	// Turn on output buffering
	nxs_ob_start();
	
	// Setting the widget name variable to the folder name
	$widget_name = basename(dirname(__FILE__));

	global $nxs_global_row_render_statebag;
	global $nxs_global_placeholder_render_statebag;
		
	// Appending custom widget class
	$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-form ";
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */

	$structure = nxs_parsepoststructure($items_genericlistid);
	
	if ($button_text == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: no button text", "nxs_td");
	}
	
	if ($destination_url == "" && $destination_articleid == "")
	{
		$alternativemessage = nxs_l18n__("Warning: thank you page is not set", "nxs_td");
	}
	
	if ($internal_email == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: internal email is not set", "nxs_td");
	}
	else
	{
		// ensure its valid
		if (!nxs_isvalidemailaddress($internal_email))
		{
			$alternativemessage = nxs_l18n__("Warning: internal email is not filled with a valid email address", "nxs_td") . " ($internal_email)";
		}	
	}
	
	if ($sender_email == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: sender email is not set", "nxs_td");
	}
	else
	{
		// ensure its valid
		if (!nxs_isvalidemailaddress($sender_email))
		{
			$alternativemessage = nxs_l18n__("Warning: sender email is not filled with a valid email address ($sender_email)", "nxs_td");
		}	
	}
	
	if ($sender_name == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: sender name is not set", "nxs_td");
	}
	
	if (count($structure) == 0 && $items_data == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: add at least one form field", "nxs_td");
	}
	
	
		
	$button_scale_cssclass = nxs_getcssclassesforlookup("nxs-button-scale-", $button_scale);
	$button_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $button_alignment);
	$button_border_radius_cssclass = nxs_getcssclassesforlookup("nxs-border-radius-", $button_border_radius);
	$button_color_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $button_color);
	
	// combine
	
	$buttoncssclasses = nxs_concatenateargswithspaces("nxs-form-submit", "nxs-button", $button_color_cssclass, $button_scale_cssclass, $button_border_radius_cssclass);
	
	$semilazyinvoke = "nxs_js_lazyexecute('/nexuscore/widgets/formbox/js/formbox.js?v=f" . nxs_getthemeversion(). "', true, 'nxs_js_log();');";
	
	$invoke = "nxs_js_formbox_send(&quot;" .  $postid . "&quot;, &quot;" . $placeholderid . "&quot;);";

	$destination_js = $invoke . "; return false;";
	$destination_relation = "nofollow";
	$destination_target = "_current";
	
	$buttonargs = array
	(
		"title" => $button_title,
		"text" => $button_text,
		"scale" => $button_scale,
		"colorzen" => $button_color,
		"destination_target" => $destination_target,
		"align" => $button_alignment,
		// note; don't pass the destination_articleid nor destination_url; we explicitly need the JS since this submits the form
		"destination_js" => $destination_js,
		"text_heightiq" => $text_heightiq,
		"fontzen" => $button_fontzen,
		"destination_relation" => $destination_relation,
		"waitwhileloading" => "default",
	);
	$htmlbutton = nxs_gethtmlforbutton_v2($buttonargs);
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */

	$shouldrenderalternative = false;
	
	/*
	if ($someinvalidcondition)
	{
		$shouldrenderalternative = true;
		$alternativehint = nxs_l18n__("Some error message", "nxs_td");
	}
	*/
	
	/* TITLE
	---------------------------------------------------------------------------------------------------- */
	
	// Title heading
	if ($title_heading != "") {
		$title_heading = "h" . $title_heading;	
	} else {
		$title_heading = "h1";
	}

	// Title alignment
	$title_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $title_alignment);
	
	if ($title_alignment == "center") { $top_info_title_alignment = "margin: 0 auto;"; } else
	if ($title_alignment == "right")  { $top_info_title_alignment = "margin-left: auto;"; } 
	
	// Title fontsize
	$title_fontsize_cssclass = nxs_getcssclassesforlookup("nxs-head-fontsize-", $title_fontsize);

	// Title height (across titles in the same row)
	// This function does not fare well with CSS3 transitions targeting "all"
	/*$heightiqprio = "p1";
	$title_heightiqgroup = "title";
  	$titlecssclasses = $title_fontsize_cssclass;
	$titlecssclasses = nxs_concatenateargswithspaces($titlecssclasses, "nxs-heightiq", "nxs-heightiq-{$heightiqprio}-{$title_heightiqgroup}");*/
	
	// Top info padding and color
	$top_info_color_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $top_info_color);
	$top_info_padding_cssclass = nxs_getcssclassesforlookup("nxs-padding-", $top_info_padding);
	
	// Icon scale
	$icon_scale_cssclass = nxs_getcssclassesforlookup("nxs-icon-scale-", $icon_scale);
		
	// Icon
	if ($icon != "") {$icon = '<span class="'.$icon.' '.$icon_scale_cssclass.'"></span>';}
	
	// Title
	$titlehtml = '<'.$title_heading.' class="nxs-title '.$title_alignment_cssclass.' '.$title_fontsize_cssclass.' '.$titlecssclasses.'">'.$title.'</'.$title_heading.'>';	
	
	// Filler
	$htmlfiller = nxs_gethtmlforfiller();
	
	/* TEXT
	---------------------------------------------------------------------------------------------------- */
	
	// Text alignment
	$text_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $text_alignment);
	
	// Text height (across paragraphs in the same row)
	// This function does not fare well with CSS3 transitions targeting "all"
	if ($text_heightiq != "") {
		$heightiqprio = "p1";
		$text_heightiqgroup = "text";
		$textcssclasses = nxs_concatenateargswithspaces($cssclasses, "nxs-heightiq", "nxs-heightiq-{$heightiqprio}-{$text_heightiqgroup}");
	}
	
	// Text	
	$textoutput = '<div class="nxs-text nxs-default-p nxs-applylinkvarcolor nxs-padding-bottom0 ' . $text_alignment_cssclass . ' ' . $textcssclasses . '">' . $text . '</div>';
	

	/* OUTPUT
	---------------------------------------------------------------------------------------------------- */
	
	if ($alternativemessage != "" && $alternativemessage != null)
	{
		nxs_renderplaceholderwarning($alternativemessage);
	} 
	else 
	{
		?>
		<script>
			// opens a form thumbnail in a lightbox
			function nxs_js_openformitemlightbox(element)
			{
				if (nxs_js_popup_anyobjectionsforopeningnewpopup())
				{
					// opening a new popup is not allowed; likely some other popup is already opened
					return;
				}
				
				var formitem = jQuery(element).closest(".nxs-formitem")[0];
				//nxs_js_log("formitem:");
				//nxs_js_log(formitem);
				var formitemid = formitem.id;	// bijv. nxs-formitem-{formid}-{index}-{imageid}
				var formid = formitemid.split("-")[2];
				var index = formitemid.split("-")[3];
				var imageid = formitemid.split("-")[4];
				
				// initiate a new popupsession data as this is a new session
				nxs_js_popupsession_startnewcontext();
				
				// move formbox sheet implementation to seperate file, not in site.php
				nxs_js_popup_setsessioncontext("popup_current_dimensions", "formbox");
				nxs_js_popup_setsessioncontext("contextprocessor", "formbox");
				nxs_js_popup_setsessioncontext("formid", formid);
				nxs_js_popup_setsessioncontext("imageid", imageid);
				nxs_js_popup_setsessioncontext("index", '' + index + '');
			
				// show the popup
				nxs_js_popup_navigateto("detail");
			}
		</script>
		
		<?php
		
		// load the script that handles the submit after some secs
		// way beyond the load so the page loads fast,
		// and way prior to the form being submitted such that its as responsive as we would like
		if (true)
		{
			?>
			<script>
				setTimeout(function(){ <?php echo $semilazyinvoke; ?> }, 3000);				
			</script>
			<?php
		}
		
		if ($icon == "" && $title == "")
		{
			// nothing to show
		}		
		else if (($top_info_padding_cssclass != "") || ($icon != "") || ($top_info_color_cssclass != "")) {
			 
			// Icon title
			echo '
			<div class="top-wrapper nxs-border-width-1-0 '.$top_info_color_cssclass.' '.$top_info_padding_cssclass.'">
				<div class="nxs-table" style="'.$top_info_title_alignment.'">';
				
					// Icon
					echo $icon;
					
					// Title
					if ($title != "")
					{
						echo $titlehtml;
					}
					echo '
				</div>
			</div>';
		
		} else {
		
			// Default title
			if ($title != "")
			{
				echo $titlehtml;
			}
		
		}
		
		if ($title != "" || $icon != "") { 
			echo $htmlfiller; 
		}
		
		
		/* Text and filler
		----------------------------------------------------------------------------------------------------*/
		echo $textoutput;
		
		if (
			$text != "" ) { 
			echo $htmlfiller; 
		}

		// determine all combined lookups for the url plus this widget		
		$combined_lookups = nxs_lookups_getcombinedlookups_for_currenturl();
		$combined_lookups = array_merge($combined_lookups, nxs_parse_keyvalues($mixedattributes["lookups"]));
		$combined_lookups = nxs_lookups_evaluate_linebyline($combined_lookups);

		echo "<div class='nxs-form'>";
		
		$index = -1;
		foreach ($structure as $pagerow)
		{
			$index = $index + 1;
			$rowcontent = $pagerow["content"];
			$currentplaceholderid = nxs_parsepagerow($rowcontent);
			$currentplaceholdermetadata = nxs_getwidgetmetadata($items_genericlistid, $currentplaceholderid);
			$widget = $currentplaceholdermetadata["type"];
			
			if ($widget != "" && $widget != "undefined")
			{
				$requirewidgetresult = nxs_requirewidget($widget);
			 	if ($requirewidgetresult["result"] == "OK")
			 	{
			 		// now that the widget is loaded, instruct the widget to register the needed hooks
			 		// if it has some
			 		$hookargs = array();
			 		$hookargs["postid"] = $postid;
			 		$hookargs["placeholderid"] = $placeholderid;
			 		$hookargs["form_metadata"] = $mixedattributes;	// metadata of form itself
			 		$hookargs["metadata"] = $currentplaceholdermetadata;
			 		
			 		$subresult = nxs_widgets_renderinformbox($widget, $hookargs);
			 		if ($subresult["result"] == "OK")
			 		{		 			
			 			// apply lookup tables to the fields
			 			if (nxs_stringcontains($subresult["html"], "{{"))
			 			{			 					
							// replace values in mixedattributes with the lookup dictionary
							$magicfields = array("html");
							$translateargs = array
							(
								"lookup" => $combined_lookups,
								"items" => $subresult,
								"fields" => $magicfields,
							);
							$subresult = nxs_filter_translate_v2($translateargs);
			 			}
			 			
			 			$subhtml = $subresult["html"];
			 			
			 			// append subresult to the overall result
			 			echo $subhtml;
			 		}
			 		else
			 		{
			 			echo "[warning, widget found, but returned an error?]";
			 			var_dump($subresult);
			 		}
			 	}
			 	else
			 	{
			 		// 
			 		echo "[warning, widget not found?]";
			 	}
			}
			else
			{
				// empty widget is ignored
			}
		}
		
		$otheritems = array();
		if ($items_data == "")
		{
			// ignore
		}
		else if (nxs_stringstartswith($items_data, "json:"))
		{
			// see "form_items_data" operator of "nxs_string" shortcode on how to use this
			$json = substr($items_data, 5);
			$otheritems = json_decode($json, true);
		}
		else
		{
			// ignore
		}
		foreach ($otheritems as $otheritem)
		{
			if ($otheritem == "")
			{
				continue;
			}
			
			$index = $index + 1;
			$widget = $otheritem["type"];
			
			// override the elementid
			$otheritem["overriddenelementid"] = "nxs_fb_{$postid}_{$placeholderid}_{$index}";
			
			if ($widget != "" && $widget != "undefined")
			{
				$requirewidgetresult = nxs_requirewidget($widget);
			 	if ($requirewidgetresult["result"] == "OK")
			 	{
			 		// now that the widget is loaded, instruct the widget to register the needed hooks
			 		// if it has some
			 		$hookargs = array();
			 		$hookargs["postid"] = $postid;
			 		$hookargs["placeholderid"] = $placeholderid;
			 		$hookargs["form_metadata"] = $mixedattributes;	// metadata of form itself
			 		$hookargs["metadata"] = $otheritem;
			 		$hookargs["index"] = $index;
			 		$hookargs["items_data"] = $items_data;
			 		
			 		
			 		$subresult = nxs_widgets_renderinformbox($widget, $hookargs);
			 		if ($subresult["result"] == "OK")
			 		{		 			
			 			// apply lookup tables to the fields
			 			if (nxs_stringcontains($subresult["html"], "{{"))
			 			{			 					
							// replace values in mixedattributes with the lookup dictionary
							$magicfields = array("html");
							$translateargs = array
							(
								"lookup" => $combined_lookups,
								"items" => $subresult,
								"fields" => $magicfields,
							);
							$subresult = nxs_filter_translate_v2($translateargs);
			 			}
			 			
			 			$subhtml = $subresult["html"];
			 			
			 			// append subresult to the overall result
			 			echo $subhtml;
			 		}
			 		else
			 		{
			 			echo "[warning, widget found, but returned an error?]";
			 			var_dump($subresult);
			 		}
			 	}
			 	else
			 	{
			 		// 
			 		echo "[warning, widget not found?]";
			 	}
			}
			else
			{
				// empty widget is ignored
			}
		}
		
		echo $htmlfiller;
		echo $htmlbutton;
		
		
		echo "</div>";	// end of nxs-form
		
		echo "<div class='nxs-clear'></div>";
	} 
	
	/* ------------------------------------------------------------------------------------------------- */
	 
	// Setting the contents of the output buffer into a variable and cleaning up te buffer
	$html = nxs_ob_get_contents();
	nxs_ob_end_clean();
	
	// Setting the contents of the variable to the appropriate array position
	// The framework uses this array with its accompanying values to render the page
	$result["html"] = $html;	
	$result["replacedomid"] = 'nxs-widget-' . $placeholderid;
	
	return $result;
}

/* INITIATING WIDGET DATA
----------------------------------------------------------------------------------------------------*/
function nxs_widgets_formbox_initplaceholderdata($args)
{
	// delegate to generic implementation
	$widgetname = basename(dirname(__FILE__));
	
	// create a new generic list with subtype form
	// assign the newly create list to the list property
	
	$subargs = array();
	$subargs["nxsposttype"] = "genericlist";
	$subargs["nxssubposttype"] = "form";	// NOTE!
	$subargs["poststatus"] = "publish";
	$random = nxs_generaterandomstring(6);
	$subargs["titel"] = nxs_l18n__("form items", "nxs_td") . " " . $random;
	$subargs["slug"] = $subargs["titel"] . " " . $random;
	$subargs["postwizard"] = "defaultgenericlist";
	
	$response = nxs_addnewarticle($subargs);
	if ($response["result"] == "OK")
	{
		$args["items_genericlistid"] = $response["postid"];
		$args["items_genericlistid_globalid"] = nxs_get_globalid($response["postid"], true);
	}
	else
	{
		var_dump($response);
		nxs_webmethod_return_nack("unsupported result");
	}
	
	// Title
	$args["title_heading"] = "2";
	
	// Form
	$args["internal_email"] = "{{email}}"; // $current_user->user_email;
	$args["sender_email"] = "{{email}}";
	$args["sender_name"] = "Website name";
	$args['mail_body_includesourceurl'] = "true";
	$args["subject_email"] = nxs_l18n__("form submit", "nxs_td");
		
	// Button
	$args["button_text"] = nxs_l18n__("Send", "nxs_td");
	$args["button_color"] = "base2";
	$args["button_scale"] = "1-4";
	$args["button_alignment"] = "left";
	
	$args["formidentifier"] = "default";
	
	// if there's a page/post with title "Thank You",
	// we will assume that one is the one we should default to
	$thankyoupageid = nxs_getpostid_for_title_and_wpposttype("thank you", "page");
	if ($thankyoupageid == "")
	{
		$thankyoupageid = nxs_getpostid_for_title_and_wpposttype("thank you", "post");
	}
	
	if ($thankyoupageid != "")
	{
		// its found!
		$args["destination_articleid"] = $thankyoupageid;
		$args["destination_articleid_globalid"] = nxs_get_globalid($thankyoupageid, true);
	}
	
	// current values as defined by unistyle prefail over the above "default" props
	$unistylegroup = nxs_widgets_formbox_getunifiedstylinggroup();
	$args = nxs_unistyle_blendinitialunistyleproperties($args, $unistylegroup);
	
	$result = nxs_widgets_initplaceholderdatageneric($args, $widgetname);
	return $result;
}

function nxs_widgets_formbox_getcontroloptions()
{
	$result =  array
	(
		"" => "Enabled (no consent required) (default)",
		"enabled" => "Enabled (no consent required)",
		"explicit_user_content_at_submit" => "Explicit user consent at submit",
		// no 'disabled' option here; if the controller doesn't want this form, he should remove it from the site
	);
	return $result;
}

function nxs_dataprotection_nexusframework_widget_formbox_getprotecteddata($args)
{
	$subactivities = array();
	
	// locate all forms defined in this website
	$filter = array
	(
		"widgettype" => "formbox",
	);
	$formsfound = nxs_getwidgetsmetadatainsite($filter);
	foreach ($formsfound as $postid => $placeholdersonpost)
	{
		//echo "processing $postid <br />";
		
		foreach ($placeholdersonpost as $placeholderid => $meta)
		{
			// echo "processing $placeholderid <br />";
			
			$instance = "{$postid}_{$placeholderid}";
			$subactivities[] = "nexusframework:widget:formbox@{$instance}";	
		}
	}
	
	$subactivities = array_unique($subactivities);
	
	$result = array
	(
		"subactivities" => $subactivities,
		"dataprocessingdeclarations" => array	
		(
			// intentionally left blank
		),
		"status" => "final",
	);
	
	return $result;
}

function nxs_dataprotection_nexusframework_widget_formbox_instance_getprotecteddata($instance, $args)
{	
	// instance consists of "postid_placeholderid"
	$pieces = explode("_", $instance);
	$postid = $pieces[0];
	$placeholderid = $pieces[1];
	
	// simple approach would be; pull the information from the properties of the widget
	// clean approach would be to seperate the properties; on one hand there's the style and content properties of the widget
	// (stored as widget meta), and there's also the data protected properties (stored on site level?))
	
	$whats = array();
	
	$widgetmeta = nxs_getwidgetmetadata($postid, $placeholderid);
	$items_genericlistid = $widgetmeta["items_genericlistid"];
	$structure = nxs_parsepoststructure($items_genericlistid);
	foreach ($structure as $pagerow)
	{
		$rowcontent = $pagerow["content"];
		$currentplaceholderid = nxs_parsepagerow($rowcontent);
		$formitemmeta = nxs_getwidgetmetadata($items_genericlistid, $currentplaceholderid);
		$formlabel = $formitemmeta["formlabel"];	
		$whats[]= $formlabel;
	}
	
	$what = $widgetmeta["dataprotection_what"];
	if ($what == "")
	{
		$whats[]= "Also the IP address of the (belongs_to_whom_id) as well as 'Request header fields' send by browser of ((belongs_to_whom_id)) (https://en.wikipedia.org/wiki/List_of_HTTP_header_fields#Request_fields)";
		$what = implode(", ", $whats);
	}
	
	// we could perhaps allow website_owners to fill in the data retention, the why, security, controller label in
	// the widget; as this is not needed for now we will leave it as is.
	$data_retention = "";
	$why = "";
	$security = "";
	$controller_label = "";
	if ($controller_label == "")
	{
		$controller_label = "Form $instance";
	}
	
	// the active "current" controller option is defined in the site meta for this formbox;
	// its not a widget meta property (since popups can only have one 'context'; site or widget)
	$controller_options = nxs_widgets_formbox_getcontroloptions();
	
	// 
	$result = array
	(
		"controller_label" => $controller_label,
		"subactivities" => $subactivities,
		"dataprocessingdeclarations" => array	
		(
			array
			(
				"use_case" => "(belongs_to_whom_id) can submit this form",
				"what" => $what,
				"belongs_to_whom_id" => "website_visitor", // (has to give consent for using the "what")
				"controller" => "website_owner",	// who is responsible for this?
				"controller_options" => $controller_options,
				"data_processor" => "hosting_provider",	// the name of the data_processor or data_recipient
				"data_retention" => $data_retention,
				"program_lifecycle_phase" => "runtime",
				"why" => $why,
				"security" => $security,
			),			
		),
		"status" => "final",
	);
	
	return $result;
}