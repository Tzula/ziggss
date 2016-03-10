<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Controller class for list of merchant's deals.
 *
 * @since  1.0.0
 */
class CMLiveDealControllerList extends JControllerAdmin
{
	protected $text_prefix = 'COM_CMLIVEDEAL_LIST';

	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  The array of possible config values. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.0.0
	 */
	public function getModel($name = 'List', $prefix = 'CMLiveDealModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/**
	 * Delete is not allowed.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function delete()
	{
		JFactory::getApplication()->close();
	}
}
