<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for deal.
 *
 * @since  1.0.0
 */
class CMLiveDealModelDeal extends JModelAdmin
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
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.0.0
	 */
	public function getForm($data = array(), $loadData = true)
	{
		return false;
	}

	/**
	 * Increase deal's impression.
	 *
	 * @param   integer  $dealId  Deal ID.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function increaseImpression($dealId = 0)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true)
			->update($db->qn('#__cmlivedeal_deals'))
			->set($db->qn('impressions') . ' = (' . $db->qn('impressions') . ' + 1)')
			->where($db->qn('id') . ' = ' . $db->q((int) $dealId));
		$db->setQuery($query);
		$db->execute();
	}

	/**
	 * Increase deal's click.
	 *
	 * @param   integer  $dealId  Deal ID.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function increaseClick($dealId = 0)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true)
			->update($db->qn('#__cmlivedeal_deals'))
			->set($db->qn('clicks') . ' = (' . $db->qn('clicks') . ' + 1)')
			->where($db->qn('id') . ' = ' . $db->q((int) $dealId));
		$db->setQuery($query);
		$db->execute();
	}

	/**
	 * Override getItem method.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return  mixed    Object on success, false on failure.
	 *
	 * @since   1.6.0
	 */
	public function getItem($pk = null)
	{
		if ($pk === null)
		{
			$dealSlug = JFactory::getApplication()->input->get('alias', '', 'html');
		}
		else
		{
			$dealSlug = $pk;
		}

		return $this->getDeal($dealSlug);
	}

	/**
	 * Get a deal by ID and alias.
	 *
	 * @param   string  $dealSlug  The string which contains the ID and the alias.
	 *
	 * @return  mixed
	 *
	 * @since   1.2.0
	 */
	public function getDeal($dealSlug = '')
	{
		$deal = new StdClass;
		$slug = preg_replace('/-/', ':', $dealSlug, 1);

		if (strpos($slug, ':') !== false)
		{
			list($id, $alias) = explode(':', $slug, 2);
		}
		else
		{
			$id = $slug;
			$alias = '';
		}

		$id = (int) $id;

		if ($id > 0)
		{
			$now = JFactory::getDate()->toSql();

			$db = $this->getDbo();
			$query = $db->getQuery(true)
				->select('*')
				->from($db->qn('#__cmlivedeal_deals') . ' AS a')
				->where($db->qn('a.published') . ' = ' . $db->q('1'))
				->where($db->qn('a.approved') . ' = ' . $db->q('1'))
				->where($db->qn('a.id') . ' = ' . $db->q($id))
				->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
				->where($db->qn('a.ending_time') . ' >= ' . $db->q($now));

			if ($alias != '')
			{
				$query->where($db->qn('a.alias') . ' = ' . $db->q($alias));
			}

			$deal = $db->setQuery($query)->loadObject();
		}

		return $deal;
	}
}
