<?php
/**
 * @package    CMLiveDealCities
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/helpers/cmlivedeal.php';

$db = JFactory::getDbo();
$query = $db->getQuery(true)
	->select($db->qn(array('id', 'alias', 'name', 'radius', 'latitude', 'longitude')))
	->from($db->qn('#__cmlivedeal_cities'))
	->where($db->qn('published') . ' = ' . $db->q(1))
	->order($db->qn('name'));

	$cities = $db->setQuery($query)->loadObjectList();

if (!empty($cities))
{
	$comParams = JComponentHelper::getParams('com_cmlivedeal');
	$integration = $comParams->get('membership_integration', '');
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

	foreach ($cities as &$city)
	{
		$distance = $city->radius;
		$latitude = $city->latitude;
		$longitude = $city->longitude;

		$city->url = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals&city=' . $city->alias);
		$city->deal_quantity = 0;

		if ($latitude !== '' && $longitude !== '' && $distance > 0)
		{
			// Earth radius is about 6,371 kilometers (3,959 miles).
			$earthRadius = 6371;

			// Get merchant in this city.
			$query->clear()
				->select('DISTINCT(' . $db->qn('m.user_id') . ') AS id')
				->select("($earthRadius * acos(cos(radians($latitude)) * cos(radians(m.latitude)) * cos(radians(m.longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(m.latitude)))) AS distance")
				->from($db->qn('#__cmlivedeal_merchants') . ' AS m')
				->having("(distance != 0 AND distance <= $distance)");

			$merchants = $db->setQuery($query)->loadObjectList();

			if (!empty($merchants))
			{
				$merchantIds = array();

				foreach ($merchants as $merchant)
				{
					$merchantIds[] = $merchant->id;
				}

				$query->clear()
					->select('COUNT(' . $db->qn('a.id') . ') AS deal_quantity')
					->from($db->qn('#__cmlivedeal_deals') . ' AS a')
					->where($db->qn('a.published') . ' = ' . $db->q('1'))
					->where($db->qn('a.approved') . ' = ' . $db->q('1'))
					->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
					->where($db->qn('a.ending_time') . ' >= ' . $db->q($now))
					->where($db->qn('a.user_id') . ' IN (' . implode(',', $merchantIds) . ')');

				$result = $db->setQuery($query)->loadObject();
				$city->deal_quantity = isset($result->deal_quantity) ? $result->deal_quantity : 0;
			}
			else
			{
				$city->deal_quantity = 0;
			}
		}
		else
		{
			$city->deal_quantity = 0;
		}
	}
}

$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cmlivedeal_cities', $params->get('layout', 'default'));
