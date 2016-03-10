<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Controller for saving and editting a deal.
 *
 * @since  1.0.0
 */
class CMLiveDealControllerDealForm extends JControllerForm
{
	/**
	 * The URL view item variable.
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $view_item = 'dealform';

	/**
	 * The URL view list variable.
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $view_list = 'dealmanagement';

	/**
	 * The URL edit variable.
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $urlVar = 'a.id';

	/**
	 * Method to check if user can add a new record.
	 *
	 * @param   array  $data  An array of input data.
	 *
	 * @return  boolean
	 *
	 * @since   1.2.0
	 */
	protected function allowAdd($data = array())
	{
		$allowed = true;
		$integration = JComponentHelper::getParams('com_cmlivedeal')->get('membership_integration', '');
		$user = JFactory::getUser();

		if ($integration != '')
		{
			$limit = CMLiveDealHelper::getMerchantLimit($user->id, $integration);
			$current = CMLiveDealHelper::getMerchantDealQuantity($user->id);

			if ($limit != -1 && $current >= $limit)
			{
				$allowed = false;
			}
		}

		return ($user->authorise('core.create', $this->option)
			|| count($user->getAuthorisedCategories($this->option, 'core.create')))
			&& $allowed;
	}

	/**
	 * Method override to check if user can edit an existing deal.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key; default is id.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		$app		= JFactory::getApplication();
		$dealId		= (int) isset($data[$key]) ? $data[$key] : 0;
		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$asset		= 'com_cmlivedeal';

		// Need to do a lookup from the model.
		$deal = $this->getModel()->getItem($dealId);

		if (empty($deal))
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'), 'error');

			return false;
		}

		// Deal is currently checked in by someone else. Can not edit.
		if ($deal->checked_out != 0 && $deal->checked_out != $userId)
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_DEAL_CHECKED_OUT'), 'error');

			return false;
		}

		$ownerId = $deal->user_id;

		// First check if the permission is available.
		if ($user->authorise('core.edit.own', $asset))
		{
			// Then check if user is the merchant for this deal.
			if ($ownerId == $userId)
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.0.0
	 */
	public function getModel($name = 'DealForm', $prefix = 'CMLiveDealModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	/**
	 * Function that allows child controller access to model data after the data has been saved.
	 *
	 * @param   JModelLegacy  $model      The data model object.
	 * @param   array         $validData  The validated data.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function postSaveHook(JModelLegacy $model, $validData = array())
	{
		// Send notification email to administrator if this is a new deal.
		if ($validData['id'] == 0)
		{
			$params = JComponentHelper::getParams('com_cmlivedeal');
			$email = $params->get('new_deal_notify', '1');

			if ($email)
			{
				$config = JFactory::getConfig();
				$siteName = $config->get('sitename');
				$fromName = $config->get('fromname');
				$mailFrom = $config->get('mailfrom');
				$siteURL = JUri::root();

				// Get all administrators.
				$db = JFactory::getDbo();
				$query = $db->getQuery(true)
					->select($db->qn(array('name', 'email', 'sendEmail')))
					->from($db->qn('#__users'))
					->where($db->qn('sendEmail') . ' = ' . 1);

				$admins = $db->setQuery($query)->loadObjectList();

				$emailSubject = JText::sprintf(
					'COM_CMLIVEDEAL_EMAIL_NEW_DEAL_SUBJECT',
					$siteName
				);

				if (!empty($admins))
				{
					$mailer = JFactory::getMailer();
					$user = JFactory::getUser();

					foreach ($admins as $admin)
					{
						$emailBody = JText::sprintf(
							'COM_CMLIVEDEAL_EMAIL_NEW_DEAL_BODY',
							$admin->name,
							$validData['title'],
							$siteURL,
							$user->name,
							$user->username
						);

						$mailer->sendMail($mailFrom, $fromName, $admin->email, $emailSubject, $emailBody);
					}
				}
			}
		}

		$this->setRedirect(JRoute::_('index.php?option=com_cmlivedeal&view=dealmanagement'));
	}
}
