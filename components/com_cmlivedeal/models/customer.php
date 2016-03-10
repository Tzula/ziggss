<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for merchant's coupon.
 *
 * @since  1.0.0
 */
class CMLiveDealModelCustomer extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.0.0
	 */
	public function getTable($type = 'Coupon', $prefix = 'CMLiveDealTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.0.0
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_cmlivedeal.customer', 'customer', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
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
		$data = $app->getUserState('com_cmlivedeal.edit.customer.data', array());

		if (empty($data))
		{
			$data = $this->getItem();
		}

		$this->preprocessData('com_cmlivedeal.customer', $data);

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed    Object on success, false on failure.
	 *
	 * @since   1.0.0
	 */
	public function getItem($pk = null)
	{
		$table = $this->getTable();
		$app = JFactory::getApplication();
		$userId = JFactory::getUser()->id;
		$code = $app->input->get('code', '', 'cmd');

		if ($code != '')
		{
			// Attempt to load the row.
			$return = $table->load(array('code' => $code));

			// Check for a table object error.
			if ($return === false && $table->getError())
			{
				$this->setError($table->getError());

				return false;
			}
		}

		// Convert to the JObject before adding other data.
		$properties = $table->getProperties(1);
		$item = JArrayHelper::toObject($properties, 'JObject');

		if (property_exists($item, 'params'))
		{
			$registry = new JRegistry;
			$registry->loadString($item->params);
			$item->params = $registry->toArray();
		}

		return $item;
	}
}
