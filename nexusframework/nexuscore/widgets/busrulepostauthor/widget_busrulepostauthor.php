<?php

function nxs_widgets_busrulepostauthor_geticonid() {
	$widget_name = basename(dirname(__FILE__));
	return "nxs-icon-quill";
}

// Setting the widget title
function nxs_widgets_busrulepostauthor_gettitle() {
	return nxs_l18n__("Specific author", "nxs_td");
}

function nxs_widgets_busrulepostauthor_getauthors()
{
	$result = array();
	
	$authors = get_users();
	
	$result[""] = "";
	
	foreach ($authors as $user) 
	{
		$email = $user->user_email;
		$result[$email] = $email;
  }
  
  return $result;
}

/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_busrulepostauthor_home_getoptions($args) 
{
	// CORE WIDGET OPTIONS
	
	$options = array
	(
		"sheettitle" => nxs_widgets_busrulepostauthor_gettitle(),
		"sheeticonid" => nxs_widgets_busrulepostauthor_geticonid(),
		//"sheethelp" => nxs_l18n__("https://docs.google.com/spreadsheets/d/1lTcFyiKYRUiUdlJilsVaigkHT7a69eL-lVKKPp53v9c/edit#gid=1764396204"),
		"fields" => array
		(
			array( 
				"id" 					=> "wrapper_condition_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Condition", "nxs_td"),
			),
			array(
				"id" 					=> "filter_authoremail",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Author", "nxs_td"),
				"dropdown" 		=> nxs_widgets_busrulepostauthor_getauthors(),
			),	
			array( 
				"id" 					=> "wrapper_condition_end",
				"type" 				=> "wrapperend"
			),
			
			
		) 
	);
	
	$moreoptions = nxs_busrules_getgenericoptions($args);
	// optionally strip items here
	
	$options["fields"] = array_merge($options["fields"], $moreoptions["fields"]);
	
	return $options;
}

/* WIDGET HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_busrulepostauthor_render_webpart_render_htmlvisualization($args) 
{	
	// Importing variables
	extract($args);

	// Setting the widget name variable to the folder name
	$widget_name = basename(dirname(__FILE__));

	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = array_merge($temp_array, $args);
	
	// Output the result array and setting the "result" position to "OK"
	$result = array();
	$result["result"] = "OK";
	
	// Widget specific variables
	extract($mixedattributes);
	
		$hovermenuargs = array();
	$hovermenuargs["postid"] = $postid;
	$hovermenuargs["placeholderid"] = $placeholderid;
	$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
	$hovermenuargs["enable_decoratewidget"] = false;
	$hovermenuargs["enable_deletewidget"] = false;
	$hovermenuargs["enable_deleterow"] = true;
	$hovermenuargs["metadata"] = $mixedattributes;
	nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);

	
	// Turn on output buffering
	nxs_ob_start();
	
	global $nxs_global_placeholder_render_statebag;
	if ($shouldrenderalternative == true) {
		$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-" . $widget_name . "-warning ";
	} else {
		// Appending custom widget class
		$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-" . $widget_name . " ";
	}
	
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */
	// Check if specific variables are empty
	// If so > $shouldrenderalternative = true, which triggers the error message
	$shouldrenderalternative = false;
	/*
	if (
	$person == "" &&
	nxs_has_adminpermissions()) {
		$shouldrenderalternative = true;
	}
	*/
	
	/* OUTPUT
	---------------------------------------------------------------------------------------------------- */

	if ($shouldrenderalternative) 
	{
		nxs_renderplaceholderwarning(nxs_l18n__("Missing input", "nxs_td")); 
	} 
	else 
	{
		$filteritemshtml = "{$filter_authoremail}";
		nxs_widgets_busrule_pagetemplate_renderrow(nxs_widgets_busrulepostauthor_geticonid(), $filteritemshtml, $mixedattributes);
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

function nxs_widgets_busrulepostauthor_initplaceholderdata($args)
{
	extract($args);

	$args["flow_stopruleprocessingonmatch"] = "true";
	// add more initialization here if needed ...
	
	nxs_mergewidgetmetadata_internal($postid, $placeholderid, $args);
	
	$result = array();
	$result["result"] = "OK";
	
	return $result;
}

function nxs_busrule_busrulepostauthor_process($args, &$statebag)
{
	$result = array();
	$result["result"] = "OK";

	$metadata = $args["metadata"];
	$filter_authoremail = $metadata["filter_authoremail"];
	
	if (is_singular())
	{		
		$useremail = get_the_author_meta('user_email');
		if ($useremail)
		{
			if ($useremail == $filter_authoremail)
			{
				$result["ismatch"] = "true";
				
				// process configured site wide elements
				$sitewideelements = nxs_pagetemplates_getsitewideelements();
				foreach($sitewideelements as $currentsitewideelement)
				{
					$selectedvalue = $metadata[$currentsitewideelement];
					if ($selectedvalue == $filter_authoremail)
					{
						// skip
					} 
					else if ($selectedvalue == "@leaveasis")
					{
						// skip
					}
					else if ($selectedvalue == "@suppressed")
					{
						// reset
						$statebag["out"][$currentsitewideelement] = 0;
					}
					else
					{
						// set the value as selected
						$statebag["out"][$currentsitewideelement] = $metadata[$currentsitewideelement];
					}
				}

				// concatenate the modeluris and modelmapping (do NOT yet evaluate them; this happens in stage 2, see #43856394587)
				$statebag["out"]["templaterules_modeluris"] .= "\r\n" . $metadata["templaterules_modeluris"];
				$statebag["out"]["templaterules_lookups"] .= "\r\n" . $metadata["templaterules_lookups"];
	
				// instruct rule engine to stop further processing if configured to do so (=default)
				$flow_stopruleprocessingonmatch = $metadata["flow_stopruleprocessingonmatch"];
				if ($flow_stopruleprocessingonmatch != "")
				{
					$result["stopruleprocessingonmatch"] = "true";
				}
			}
			else
			{
				$result["ismatch"] = "false";
			}
		}
		else
		{
			$result["ismatch"] = "false";
		}
	}
	else
	{
		$result["ismatch"] = "false";
	}
	
	return $result;
}

