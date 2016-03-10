<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for merchant.
 *
 * @since  1.5.0
 */
class CMLiveDealModelMerchant extends JModelLegacy
{
	/**
	 * Method to get a single record.
	 *
	 * @param   string  $username  The Joomla's username of merchant.
	 *
	 * @return  mixed    Object on success, false on failure.
	 *
	 * @since   1.5.0
	 */
	public function getMerchantIdByUsername($username = null)
	{
		$app = JFactory::getApplication();

		if ($username === null)
		{
			$username = $app->input->get('merchant', '', 'string');
			$username = urldecode($username);
		}

		if (empty($username))
		{
			return null;
		}

		$db = $this->getDbo();
		$query = $db->getQuery(true)
			->select($db->qn('id'))
			->from($db->qn('#__users'))
			->where($db->qn('username') . ' = ' . $db->q($username));
		$userId = $db->setQuery($query)->loadResult();

		return $userId;
	}
}
