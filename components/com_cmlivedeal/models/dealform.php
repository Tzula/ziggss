<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model for submitting new deal.
 *
 * @since  1.0.0
 */
class CMLiveDealModelDealForm extends JModelAdmin
{
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication();
		$return = $app->input->get('return', null, 'base64');

		if (!JUri::isInternal(base64_decode($return)))
		{
			$return = null;
		}

		// Load state from the request.
		$pk = $app->input->getInt('id');
		$this->setState('dealform.id', $pk);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		$this->setState('layout', $app->input->getString('layout'));
	}

	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object.
	 *
	 * @since   1.0.0
	 */
	public function getTable($type = 'Deal', $prefix = 'CMLiveDealTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure.
	 *
	 * @since   1.0.0
	 */
	public function getForm($data = array(), $loadData = true)
	{
		$params = JComponentHelper::getParams('com_cmlivedeal');

		// Get the form.
		$form = $this->loadForm('com_cmlivedeal.dealform', 'dealform', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		// If deal is approved, we only allow users to modify starting and ending dates.
		$deal = $this->getItem();

		if ($deal->approved && $params->get('edit_published') == 0)
		{
			$fields = array(
				'title',
				'category_id',
				'image_id',
				'description',
				'fine_print',
				'coupon_quantity',
				'discount_info',
				'original_price',
				'discounted_price',
				'fixed_value',
				'fixed_percent'
			);

			foreach ($fields as $field)
			{
				$form->setFieldAttribute($field, 'disabled', 'true');
				$form->setFieldAttribute($field, 'readonly', 'true');
				$form->setFieldAttribute($field, 'required', 'false');
			}
		}

		// If we integrate with third party membership component,
		// we do not allow users to set the dates.
		$integration = $params->get('membership_integration', '');

		if ($integration != '')
		{
			$form->removeField('starting_time');
			$form->removeField('ending_time');
		}

		$couponLimit = $params->get('coupon_limit', 0, 'uint');

		if ($couponLimit == 0)
		{
			$form->removeField('coupon_quantity');
		}

		$discountValues = $params->get('discount_values', 0, 'uint');

		if ($discountValues == 0)
		{
			$form->removeField('discount_info');
			$form->removeField('original_price');
			$form->removeField('discounted_price');
			$form->removeField('fixed_value');
			$form->removeField('fixed_percent');
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  array  The default data is an empty array.
	 *
	 * @since   1.0.0
	 */
	protected function loadFormData()
	{
		$app = JFactory::getApplication();

		// Check the session for previously entered form data.
		$data = $app->getUserState('com_cmlivedeal.edit.dealform.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		$this->preprocessData('com_cmlivedeal.dealform', $data);

		return $data;
	}

	/**
	 * Method to validate the form data.
	 *
	 * @param   JForm   $form   The form to validate against.
	 * @param   array   $data   The data to validate.
	 * @param   string  $group  The name of the field group to validate.
	 *
	 * @return  mixed  Array of filtered data if valid, false otherwise.
	 *
	 * @since   1.0.0
	 */
	public function validate($form, $data, $group = null)
	{
		$params = JComponentHelper::getParams('com_cmlivedeal');
		$dealId = JFactory::getApplication()->input->get('id', 0, 'uint');

		// If deal is approved, we only allow users to modify starting and ending dates.
		$deal = $this->getItem($dealId);

		if ($deal->approved && $params->get('edit_published') == 0)
		{
			$fields = array(
				'title',
				'category_id',
				'image_id',
				'description',
				'fine_print',
				'coupon_quantity',
				'discount_info',
				'original_price',
				'discounted_price',
				'fixed_value',
				'fixed_percent'
			);

			foreach ($fields as $field)
			{
				$form->removeField($field);
			}
		}

		// If we integrate with third party membership component,
		// we do not allow users to set the dates.
		$integration = $params->get('membership_integration', '');

		if ($integration != '')
		{
			$form->removeField('starting_time');
			$form->removeField('ending_time');
		}

		$couponLimit = (int) $params->get('coupon_limit', 0);

		if (!$couponLimit)
		{
			$form->removeField('coupon_quantity');
		}

		$discountValues = $params->get('discount_values', 0, 'uint');

		if ($discountValues == 0)
		{
			$form->removeField('discount_info');
			$form->removeField('original_price');
			$form->removeField('discounted_price');
			$form->removeField('fixed_value');
			$form->removeField('fixed_percent');
		}

		return parent::validate($form, $data, $group);
	}
}
