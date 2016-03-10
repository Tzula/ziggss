<?php
/**
 * @package    CMLiveDealMerchants
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/helpers/cmlivedeal.php';
require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/helpers/cmldmerchant.php';


$merchantIdsStr = $params->get('merchants');

if (!empty($merchantIdsStr))
{
	$merchantIds = explode(',', $merchantIdsStr);
}
else
{
	$merchantIds = array();
}

if (!empty($merchantIds))
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

	$merchants = array();
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);

	foreach ($merchantIds as $merchantId)
	{
		$merchant = new StdClass;
		$m = new CMLDMerchant($merchantId);

		$merchant->name = $m->get('name');

		// If merchant doesn't provide business, we don't display merchant in the list.
		if (!empty($merchant->name))
		{
			$merchant->url = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=merchant&merchant=' . $m->get('username'));

			$query->clear()
				->select('COUNT(' . $db->qn('a.id') . ') AS deal_quantity')
				->from($db->qn('#__cmlivedeal_deals') . ' AS a')
				->where($db->qn('a.published') . ' = ' . $db->q('1'))
				->where($db->qn('a.approved') . ' = ' . $db->q('1'))
				->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
				->where($db->qn('a.ending_time') . ' >= ' . $db->q($now))
				->where($db->qn('a.user_id') . ' = ' . $db->q((int) $merchantId))
				->group($db->qn('a.user_id'));

			$result = $db->setQuery($query)->loadObject();

			if (isset($result->deal_quantity))
			{
				$merchant->deal_quantity = $result->deal_quantity;
			}
			else
			{
				$merchant->deal_quantity = 0;
			}

			$merchants[] = $merchant;
		}
	}
}

$moduleClassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cmlivedeal_merchants', $params->get('layout', 'default'));
