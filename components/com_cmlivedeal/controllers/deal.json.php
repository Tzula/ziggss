<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Deal controller for handling AJAX request.
 *
 * @since  0.0.1
 */
class CMLiveDealControllerDeal extends JControllerLegacy
{
	/**
	 * Increase deal's click value when deal is viewed.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function track()
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;

		if (!JSession::checkToken('get'))
		{
			$app->enqueueMessage(JText::_('JINVALID_TOKEN'), 'error');
			echo new JResponseJson(null, null, true);
		}
		else
		{
			$dealId = $jinput->post->get('deal_id', 0, 'uint');

			if ($dealId > 0)
			{
				JModelLegacy::getInstance('Deal', 'CMLiveDealModel')->increaseClick($dealId);
				echo new JResponseJson;
			}
			else
			{
				echo new JResponseJson(null, null, true);
			}
		}

		$app->close();
	}
}
