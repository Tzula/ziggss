<?php
/**
 * @package    CMLiveDealSearch
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

JForm::addFormPath(JPATH_SITE . '/modules/mod_cmlivedeal_search/forms');

$app = JFactory::getApplication();
$filterContext = 'com_cmlivedeal.deals.';

$filters = array(
	'keyword'	=> $app->getUserState($filterContext . 'keyword', '', 'string'),
	'category'	=> $app->getUserState($filterContext . 'category', '', 'string'),
	'city'		=> $app->getUserState($filterContext . 'city', '', 'string'),
	'latitude'	=> $app->getUserState($filterContext . 'latitude', '', 'float'),
	'longitude'	=> $app->getUserState($filterContext . 'longitude', '', 'float'),
);

if ($filters['city'] == '' && $filters['latitude'] !== '' && $filters['longitude'] !== '')
{
	$filters['city'] = '*';
}

$form = JForm::getInstance('cmlivedeal.search', 'search', array(), false, false);
$form->bind($filters);

$menuItemId		= (int) $params->get('deal_list');
$moduleclassSfx	= htmlspecialchars($params->get('moduleclass_sfx'));
$display		= htmlspecialchars($params->get('form_display'));
$keywordCSS		= htmlspecialchars($params->get('keyword_css'));
$categoryCSS	= htmlspecialchars($params->get('category_css'));
$searchCSS		= htmlspecialchars($params->get('search_css'));
$clearCSS		= htmlspecialchars($params->get('clear_css'));
$cityCSS		= htmlspecialchars($params->get('city_css'));
$clearButton	= htmlspecialchars($params->get('clear_button', 1));
$buttonLabel	= htmlspecialchars($params->get('button'));

// CSS for buttons.
if ($searchCSS != '')
{
	$searchCSS = ' ' . $searchCSS;
}

if ($clearCSS != '')
{
	$clearCSS = ' ' . $clearCSS;
}

// Button label.
if ($buttonLabel == 'icon')
{
	$searchLabel = '<i class="icon-search"></i>';
	$clearLabel = '<i class="icon-remove"></i>';
}
elseif ($buttonLabel == 'text')
{
	$searchLabel = JText::_('MOD_CMLIVEDEAL_SEARCH_SEARCH');
	$clearLabel = JText::_('MOD_CMLIVEDEAL_SEARCH_CLEAR');
}
else
{
	$searchLabel = '<i class="icon-search"></i> ' . JText::_('MOD_CMLIVEDEAL_SEARCH_SEARCH');
	$clearLabel = '<i class="icon-remove"></i> ' . JText::_('MOD_CMLIVEDEAL_SEARCH_CLEAR');
}

// Form's class.
$formClass = (in_array($display, array('inline', 'vertical', 'horizontal'))) ? $display : '';

// Fields's classes.
if ($keywordCSS != '')
{
	$form->setFieldAttribute('keyword', 'class', $keywordCSS);
}

if ($categoryCSS != '')
{
	$form->setFieldAttribute('category', 'class', $categoryCSS);
}


if ($cityCSS != '')
{
	$form->setFieldAttribute('city', 'class', $cityCSS);
}

require JModuleHelper::getLayoutPath('mod_cmlivedeal_search', $params->get('layout', 'default'));
