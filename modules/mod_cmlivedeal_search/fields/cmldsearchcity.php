<?php
/**
 * @package    CMLiveDealSearch
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/models/fields/cmldcity.php';

/**
 * Supports an HTML select list of cities in CM Live Deal Search module.
 *
 * @since  1.5.0
 */
class JFormFieldCMLDSearchCity extends JFormFieldCMLDCity
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 *
	 * @since  1.5.0
	 */
	public $type = 'CMLDSearchCity';

	/**
	 * Method to get the options to populate list.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   1.0.0
	 */
	protected function getOptions()
	{
		$options = array();

		$params = JComponentHelper::getParams('com_cmlivedeal');
		$geolocation = $params->get('geolocation_service', '');

		if ($geolocation == 'html5' || $geolocation == 'maxmind')
		{
			$options[] = JHtml::_('select.option', '*', JText::_('MOD_CMLIVEDEAL_SEARCH_YOUR_LOCATION'));
		}

		$options[] = JHtml::_('select.option', '', JText::_('MOD_CMLIVEDEAL_SEARCH_ALL_CITIES'));

		$options = array_merge($options, parent::getOptions());

		return $options;
	}
}
