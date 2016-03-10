<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

/**
 * Helper for mod_articles_featured
 *
 * @package     Joomla.Site
 * @subpackage  mod_articles_featured
 *
 * @since       1.6.0
 */
abstract class ModArticlesFeaturedHelper
{
	/**
	 * Get a list of popular articles from the articles model
	 *
	 * @param   \Joomla\Registry\Registry  &$params  object holding the models parameters
	 *
	 * @return mixed
	 */
	public static function getList(&$params)
	{
		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('count', 8));
		$model->setState('filter.published', 1);


		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));




		// Ordering
		$model->setState('list.ordering', 'a.created');
		$model->setState('list.direction', 'DESC');

		$items = $model->getItems();

		foreach ($items as &$item)
		{
			$item->slug = $item->id . ':' . $item->alias;
			$item->catslug = $item->catid . ':' . $item->category_alias;


			// We know that user has the privilege to view the article
			$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));

		}

		return $items;
	}
	
}
