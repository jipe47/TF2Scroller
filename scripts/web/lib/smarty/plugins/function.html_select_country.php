<?php
function smarty_function_html_select_country($params, $template)
{
	$countries = array_key_exists('from', $params) ? $params['from'] : Country::getCountries();
	$format = array_key_exists('format', $params) && in_array($params['format'], array("select", "checkbox")) ? $params['format'] : "select";
	
	$field_name = array_key_exists('field_name', $params) ? $params['field_name'] : "country";
	$value = array_key_exists("value", $params) && array_key_exists($params['value'], $countries) ? $params['value'] : "";

	$separator_start = array_key_exists('separator_start', $params) ? $params['separator_start'] : "";
	$separator_end = array_key_exists('separator_end', $params) ? $params['separator_end'] : "<br />";
	
	$array_selected = array_key_exists('array_selected', $params) ? $params['array_selected'] : array();
	
	$showflag = array_key_exists('showflag', $params) ? $params['showflag'] : false;
	
	$uid = generateId(10);
	
	$html = "";
	switch($format)
	{	
		case "select":
			$html = '<select name="'.$field_name.'">';
			foreach($countries as $i => $c)
			{
				$selected = $value == $i ? ' selected="selected"' : '';
				$html .= '<option value="'.$i.'"'.$selected.'>'.$c.'</option>';
			}
			$html .= '</select>';
			break;
			
		case "checkbox";
			foreach($countries as $i => $c)
			{
				$checked = in_array($i, $array_selected) ? ' checked="checked"' : '';
				$html .= $separator_start;
				
				$html .= '<input type="checkbox" id="country_'.$i.'_'.$uid.'" name="'.$field_name.'[]" value="'.$i.'"'.$checked.' />&nbsp;';
				$html .= '<label for="country_'.$i.'_'.$uid.'">';
				if($showflag)
					$html .= '<img src="'.PATH_TPL_COMMON.'images/countries/'.strtolower($i).'.png" alt="" title="" />&nbsp;';
				$html .= $c.'</label>'.$separator_end;
			}
			break;
	}
	
	return $html;
}

?>