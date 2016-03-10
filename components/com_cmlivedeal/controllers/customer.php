<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Coupon controller class for merchant.
 *
 * @since  1.0.0
 */
class CMLiveDealControllerCustomer extends JControllerForm
{
	/**
	 * The URL view item variable.
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $view_item = 'customer';

	/**
	 * The URL view list variable.
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $view_list = 'customers';

	/**
	 * Method override to check if user can edit an existing coupon.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key; default is id.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	protected function allowEdit($data = array(), $key = 'code')
	{
		$app		= JFactory::getApplication();
		$couponCode	= (int) isset($data[$key]) ? $data[$key] : '';
		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$asset		= 'com_cmlivedeal';

		// Need to do a lookup from the model.
		$coupon = $this->getModel()->getItem($couponCode);

		if (empty($coupon))
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_ERROR_COUPON_NOT_FOUND'), 'error');

			return false;
		}

		// Coupon is currently checked in by someone else. Can not edit.
		if ($coupon->checked_out != 0 && $coupon->checked_out != $userId)
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_COUPON_CHECKED_OUT'), 'error');

			return false;
		}

		// Get the owner of the deal.
		$dealId = $coupon->deal_id;
		$deal = JModelLegacy::getInstance('Deal', 'CMLiveDealModel')->getItem($dealId);

		if (empty($deal))
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_ERROR_COUPON_DEAL_NOT_FOUND'), 'error');

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
	 * Method to edit an existing record.
	 *
	 * @param   string  $key     The name of the primary key of the URL variable.
	 * @param   string  $urlVar  The name of the URL variable if different from the primary key
	 * (sometimes required to avoid router collisions).
	 *
	 * @return  boolean  True if access level check and checkout passes, false otherwise.
	 *
	 * @since   1.0.0
	 */
	public function edit($key = 'code', $urlVar = null)
	{
		$app		= JFactory::getApplication();
		$model		= $this->getModel();
		$table		= $model->getTable();
		$cid		= $this->input->post->get('cid', array(), 'array');
		$context	= "$this->option.edit.$this->context";

		// Determine the name of the primary key for the data.
		if (empty($key))
		{
			$key = $table->getKeyName();
		}

		// To avoid data collisions the urlVar may be different from the primary key.
		if (empty($urlVar))
		{
			$urlVar = $key;
		}

		// Get the previous record id (if any) and the current record id.
		$couponCode = count($cid) ? $cid[0] : $this->input->get($urlVar, 'cmd');
		$checkin = property_exists($table, 'checked_out');

		// Access check.
		if (!$this->allowEdit(array($key => $couponCode), $key))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_EDIT_NOT_PERMITTED'));
			$this->setMessage($this->getError(), 'error');

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_list
					. $this->getRedirectToListAppend(), false
				)
			);

			return false;
		}

		// If coupon is not found, we already raise error in allowEdit().
		$coupon = $this->getModel()->getItem($couponCode);

		$recordId = $coupon->id;

		// Attempt to check-out the new record for editing and redirect.
		if ($checkin && !$model->checkout($recordId))
		{
			// Check-out failed, display a notice but allow the user to see the record.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_CHECKOUT_FAILED', $model->getError()));
			$this->setMessage($this->getError(), 'error');

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_item
					. $this->getRedirectToItemAppend($recordId, $urlVar), false
				)
			);

			return false;
		}
		else
		{
			// Check-out succeeded, push the new record id into the session.
			$this->holdEditId($context, $recordId);
			$app->setUserState($context . '.data', null);

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_item
					. $this->getRedirectToItemAppend($couponCode, $urlVar), false
				)
			);

			return true;
		}
	}

	/**
	 * Method to check if you can save a new or existing record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param   array   $data  An array of input data.
	 * @param   string  $key   The name of the key for the primary key.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	protected function allowSave($data, $key = 'code')
	{
		$recordId = isset($data[$key]) ? $data[$key] : '';

		if ($recordId)
		{
			return $this->allowEdit($data, $key);
		}
		else
		{
			return $this->allowAdd($data);
		}
	}

	/**
	 * Method to check if you can add a new record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param   array  $data  An array of input data.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	protected function allowAdd($data = array())
	{
		return false;
	}

	/**
	 * Method to save a record.
	 *
	 * @param   string  $key     The name of the primary key of the URL variable.
	 * @param   string  $urlVar  The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	 *
	 * @return  boolean  True if successful, false otherwise.
	 *
	 * @since   1.0.0
	 */
	public function save($key = 'code', $urlVar = null)
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app		= JFactory::getApplication();
		$lang		= JFactory::getLanguage();
		$model		= $this->getModel();
		$table		= $model->getTable();
		$data		= $this->input->post->get('jform', array(), 'array');
		$checkin	= property_exists($table, 'checked_out');
		$context	= "$this->option.edit.$this->context";

		// Determine the name of the primary key for the data.
		if (empty($key))
		{
			$key = $table->getKeyName();
		}

		// To avoid data collisions the urlVar may be different from the primary key.
		if (empty($urlVar))
		{
			$urlVar = $key;
		}

		$couponCode = $this->input->get($urlVar, 'cmd');

		// Populate the row id from the session.
		$data[$key] = $couponCode;

		// Access check.
		if (!$this->allowSave($data, $key))
		{
			$this->setError(JText::_('JLIB_APPLICATION_ERROR_SAVE_NOT_PERMITTED'));
			$this->setMessage($this->getError(), 'error');

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_list
					. $this->getRedirectToListAppend(), false
				)
			);

			return false;
		}

		// Validate the posted data.
		// Sometimes the form needs some posted data, such as for plugins and modules.
		$form = $model->getForm($data, false);

		if (!$form)
		{
			$app->enqueueMessage($model->getError(), 'error');

			return false;
		}

		// Test whether the data is valid.
		$validData = $model->validate($form, $data);

		// Check for validation errors.
		if ($validData === false)
		{
			// Get the validation messages.
			$errors = $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else
				{
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState($context . '.data', $data);

			// Redirect back to the edit screen.
			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_item
					. $this->getRedirectToItemAppend($recordId, $urlVar), false
				)
			);

			return false;
		}

		if (!isset($validData['tags']))
		{
			$validData['tags'] = null;
		}

		// If coupon is not found, we already raise error in allowEdit().
		$coupon = $this->getModel()->getItem($couponCode);

		$validData['id'] = $recordId = $coupon->id;

		// Attempt to save the data.
		if (!$model->save($validData))
		{
			// Save the data in the session.
			$app->setUserState($context . '.data', $validData);

			// Redirect back to the edit screen.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_SAVE_FAILED', $model->getError()));
			$this->setMessage($this->getError(), 'error');

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_item
					. $this->getRedirectToItemAppend($recordId, $urlVar), false
				)
			);

			return false;
		}

		// Save succeeded, so check-in the record.
		if ($checkin && $model->checkin($coupon->id) === false)
		{
			// Save the data in the session.
			$app->setUserState($context . '.data', $validData);

			// Check-in failed, so go back to the record and display a notice.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError()));
			$this->setMessage($this->getError(), 'error');

			$this->setRedirect(
				JRoute::_(
					'index.php?option=' . $this->option . '&view=' . $this->view_item
					. $this->getRedirectToItemAppend($recordId, $urlVar), false
				)
			);

			return false;
		}

		$this->setMessage(
			JText::_(
				($lang->hasKey($this->text_prefix . ($recordId == 0 && $app->isSite() ? '_SUBMIT' : '') . '_SAVE_SUCCESS')
					? $this->text_prefix
					: 'JLIB_APPLICATION') . ($recordId == 0 && $app->isSite() ? '_SUBMIT' : '') . '_SAVE_SUCCESS'
			)
		);

		// Clear the record id and data from the session.
		$this->releaseEditId($context, $recordId);
		$app->setUserState($context . '.data', null);

		// Redirect to the list screen.
		$this->setRedirect(
			JRoute::_(
				'index.php?option=' . $this->option . '&view=' . $this->view_list
				. $this->getRedirectToListAppend(), false
			)
		);

		// Invoke the postSave method to allow for the child class to access the model.
		$this->postSaveHook($model, $validData);

		return true;
	}

	/**
	 * Method to cancel an edit.
	 *
	 * @param   string  $key  The name of the primary key of the URL variable.
	 *
	 * @return  boolean  True if access level checks pass, false otherwise.
	 *
	 * @since   1.0.0
	 */
	public function cancel($key = null)
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app = JFactory::getApplication();
		$model = $this->getModel();
		$table = $model->getTable();
		$checkin = property_exists($table, 'checked_out');
		$context = "$this->option.edit.$this->context";

		if (empty($key))
		{
			$key = $table->getKeyName();
		}

		$couponCode = $this->input->get($urlVar, 'cmd');

		$coupon = $this->getModel()->getItem($couponCode);

		if (empty($coupon))
		{
			$app->enqueuemessage(JText::_('COM_CMLIVEDEAL_ERROR_COUPON_NOT_FOUND'), 'error');

			return false;
		}

		$recordId = $coupon->id;

		// Attempt to check-in the current record.
		if ($recordId)
		{
			if ($checkin)
			{
				if ($model->checkin($recordId) === false)
				{
					// Check-in failed, go back to the record and display a notice.
					$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError()));
					$this->setMessage($this->getError(), 'error');

					$this->setRedirect(
						JRoute::_(
							'index.php?option=' . $this->option . '&view=' . $this->view_item
							. $this->getRedirectToItemAppend($recordId, $key), false
						)
					);

					return false;
				}
			}
		}

		// Clean the session data and redirect.
		$this->releaseEditId($context, $recordId);
		$app->setUserState($context . '.data', null);

		$this->setRedirect(
			JRoute::_(
				'index.php?option=' . $this->option . '&view=' . $this->view_list
				. $this->getRedirectToListAppend(), false
			)
		);

		return true;
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
		$task = $this->getTask();

		if ($task == 'save')
		{
			$this->setRedirect(JRoute::_('index.php?option=com_cmlivedeal&view=customers', false));
		}
	}
}
