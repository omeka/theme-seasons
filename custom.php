<?php 
// Use this file to define customized helper functions, filters or 'hacks' defined
// specifically for use in your Omeka theme. Note that helper functions that are
// designed for portability across themes should be grouped into a plugin whenever
// possible.

add_filter(array('Display', 'Item', 'Dublin Core', 'Title'), 'show_untitled_items');

function show_untitled_items($title)
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
    $logo = get_theme_option('Logo');
	
	$siteTitle = $logo ? '<img src="'.WEB_ROOT.'/archive/theme_uploads/'.$logo.'" title="'.settings('site_title').'" />' : null;
	
	return $siteTitle;
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