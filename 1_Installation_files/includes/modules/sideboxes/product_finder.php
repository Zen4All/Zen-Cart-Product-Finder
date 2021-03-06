<?php

/* Product Finder module
 * @version 1.0.0
 * @author Zen4All
 * @copyright (c) 2014-2019, Zen4All
 * @license http://www.gnu.org/licenses/gpl.txt GNU General Public License V2.0
 */

// test if box should display
$show_product_finder = true;

if ($show_product_finder == true) {

  $pf_base_category = PRODUCT_FINDER_PARENT_ID; //USER defined base category
  $pf_category_depth = PRODUCT_FINDER_CATEGORY_DEPTH; //USER defined base category
//check the current page location and separate the category and subcategory cPaths into an array
  if (isset($_GET['cPath']) && $_GET['cPath'] != '') {
    $pf_cPaths = explode("_", $_GET['cPath']);
  }

//check if the current page is a possible Product Finder category to pre-populate the dropdowns with the current category id/values
  if ((int)$pf_cPaths['0'] == $pf_base_category && count($pf_cPaths) == $pf_category_depth) {
//do nothing
  } else {//otherwise it is some other category 
    unset($pf_cPaths); //this location is NOT a Product Finder category so do not pre-populate the dropdowns
  }

  require($template->get_template_dir('tpl_product_finder.php', DIR_WS_TEMPLATE, $current_page_base, 'sideboxes') . '/tpl_product_finder.php');
  $title = BOX_HEADING_PRODUCT_FINDER;
  $title_link = false;
  require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base, 'common') . '/' . $column_box_default);
}
