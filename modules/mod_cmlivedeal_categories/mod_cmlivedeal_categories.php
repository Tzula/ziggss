<?php
/**
 * @package    CMLiveDealCategories
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/helpers/cmlivedeal.php';

$db = JFactory::getDbo();
$query = $db->getQuery(true)
	->select($db->qn(array('id', 'alias', 'title', 'level', 'lft')))
	->from($db->qn('#__categories'))
	->where($db->qn('published') . ' = ' . $db->q(1))
	->where($db->qn('parent_id') . ' > ' . $db->q(0))
	->where($db->qn('extension') . ' = ' . $db->q('com_cmlivedeal'))
	->order($db->qn('lft'));

	$categories = $db->setQuery($query)->loadObjectList();

if (!empty($categories))
{
	$comParams = JComponentHelper::getParams('com_cmlivedeal');
	$now = JFactory::getDate()->toSql();
	$showDealQuantity = $params->get('show_deal_quantity', 0);
	$ulClass = $params->get('ul_class', '');
	$liClass = $params->get('li_class', '');
	$dealQuantityClass = $params->get('deal_quantity_class', '');
	$ulStyle = $params->get('ul_style', '');
	$liStyle = $params->get('li_style', '');
	$dealQuantityStyle = $params->get('deal_quantity_style', '');

	if (!empty($ulClass))
	{
		$ulClass = ' class="' . $ulClass . '"';
	}

	if (!empty($liClass))
	{
		$liClass = ' class="' . $liClass . '"';
	}

	if (!empty($dealQuantityClass))
	{
		$dealQuantityClass = ' class="pull-right ' . $dealQuantityClass . '"';
	}
	else
	{
		$dealQuantityClass = ' class="pull-right"';
	}

	if (!empty($ulStyle))
	{
		$ulStyle = ' style="' . $ulStyle . '"';
	}

	if (!empty($liStyle))
	{
		$liStyle = ' style="' . $liStyle . '"';
	}

	if (!empty($dealQuantityStyle))
	{
		$dealQuantityStyle = ' style="' . $dealQuantityStyle . '"';
	}

	foreach ($categories as &$category)
	{
		$repeat = ($category->level - 1 >= 0) ? $category->level - 1 : 0;
		$category->title = str_repeat('- ', $repeat) . $category->title;
		$category->url = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals&category=' . $category->alias);

		// Count deals in the category and its child categories.
		$catIds = array();
		$catIds[] = $category->id;
		CMLiveDealHelper::getChildrenCategories($category->id, $catIds);

		$query->clear()
			->select('COUNT(' . $db->qn('a.id') . ') AS deal_quantity')
			->from($db->qn('#__cmlivedeal_deals') . ' AS a')
			->where($db->qn('a.published') . ' = ' . $db->q('1'))
			->where($db->qn('a.approved') . ' = ' . $db->q('1'))
			->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
			->where($db->qn('a.ending_time') . ' >= ' . $db->q($now))
			->where($db->qn('a.category_id') . ' IN (' . implode(',', $catIds) . ')')
			->group($db->qn('a.category_id'));

		$result = $db->setQuery($query)->loadObject();
		$category->deal_quantity = isset($result->deal_quantity) ? $result->deal_quantity : 0;
	}
}

$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cmlivedeal_categories', $params->get('layout', 'default'));
