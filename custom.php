<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible. Ideally, you should namespace these with your theme name.

add_filter(array('Display', 'Item', 'Dublin Core', 'Title'), 'seasons_show_untitled_items');

function seasons_show_untitled_items($title)
{
    // Remove all whitespace and formatting before checking to see if the title 
    // is empty.
    $prepTitle = trim(strip_formatting($title));
    if (empty($prepTitle)) {
        return '[Untitled]';
    }
    return $title;
}

/**
 * This function checks the Logo theme option, then returns either an
 * image tag with the logo as the src, or returns null.
 *
 **/
function seasons_display_logo()
{
    if(function_exists('get_theme_option')) {
        
        $logo = get_theme_option('Logo');
        
        $logoPath = WEB_THEME_UPLOADS.DIRECTORY_SEPARATOR.$logo;
        
	    $siteTitle = $logo ? '<img src="'.$logoPath.'" title="'.settings('site_title').'" />' : null;
	
	    return $siteTitle;
    }
    
    return null;
}

/**
 * This function returns the style sheet for the theme. It will use the argument
 * passed to the function first, then the theme_option for Style Sheet, then
 * a default style sheet.
 *
 * @param $styleSheet The name of the style sheet to use. (null by default)
 *
 **/
function seasons_get_stylesheet($styleSheet = null)
{    
    if (!$styleSheet) {
        
        $styleSheet = get_theme_option('Style Sheet') ? get_theme_option('Style Sheet') : 'spring';
    }
    
    return $styleSheet; 
    
}

function seasons_show_item_metadata(array $options = array(), $item = null)
{
    if (!$item) {
        $item = get_current_item();
    }
	if ($dcFieldsList = get_theme_option('display_dublin_core_fields')) {
	    $html = '';
	    $dcFields = explode(',', $dcFieldsList);
	    foreach ($dcFields as $field) {
	        $field = trim($field);
	        if ($fieldValue = item('Dublin Core', $field)) {
	            $html .= '<div class="element">';
	            $html .= '<h3>'.$field.'</h3>';
	            $html .= $fieldValue;
	            $html .= '</div>';
	        }
	    }
	    $html .= show_item_metadata(array('show_element_sets' => array('Item Type Metadata')));
	    return $html;
	} else {
	    return show_item_metadata($options, $item); 
    }
}

function seasons_public_nav_header()
{
    if ($customHeaderNavigation = get_theme_option('custom_header_navigation')) {
        $navArray = array();
        $customLinkPairs = explode("\n", $customHeaderNavigation);
        foreach ($customLinkPairs as $pair) {
            $pair = trim($pair);
            if ($pair != '') {
                $pairArray = explode('|', $pair, 2);
                if (count($pairArray) == 2) {
                    $link = trim($pairArray[0]);
                    $url = trim($pairArray[1]); 
                    if (!strncmp($url, 'http://', strlen($url)) && !strncmp($url, 'https://', strlen($url))){
                        $url = uri($url);
                    }
                }
                $navArray[$link] = $url;
            }
        }
        return nav($navArray);
    } else {
        $navArray = array('Browse Items' => uri('items'), 'Browse Collections'=>uri('collections'));
        return public_nav_main($navArray);
    }
}

function seasons_display_random_featured_item($withImage=false)
{
    $displayFeatured = get_theme_option('Display Featured Item');
    $html = '';
    
    if ($displayFeatured == 1) {
        $html .= '<div id="featured-item">'."\n";
        $html .= display_random_featured_item($withImage)."\n";
        $html .= '</div>'."\n";
    }

    return $html;
}

function seasons_display_random_featured_collection()
{
    $displayFeatured = get_theme_option('Display Featured Collection');
    $html = '';
    
    if ($displayFeatured == 1) {
        $html .= '<div id="featured-collection">'."\n";
        $html .= display_random_featured_collection()."\n";
        $html .= '</div>'."\n";
    }

    return $html;
}

function seasons_display_random_featured_exhibit()
{
    $displayFeatured = get_theme_option('Display Featured Exhibit');
    $html = '';
    
    if ($displayFeatured == 1 && function_exists('exhibit_builder_display_random_featured_exhibit')) {
        $html .= exhibit_builder_display_random_featured_exhibit()."\n";
    }

    return $html;
}