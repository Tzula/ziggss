<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

// Load helpers.
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/cmlivedeal.php';
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/cmldmerchant.php';
JHtml::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/helpers/html');

// If we integrate with a third party membership component but that component is not installed, we can not continue.
$integration = JComponentHelper::getParams('com_cmlivedeal')->get('membership_integration', '');

if ($integration != '' && !CMLiveDealHelper::isMembershipComponentInstalled($integration))
{
	JError::raiseError(500, JText::_('COM_CMLIVEDEAL_INTEGRATION_ERROR'));
}

$controller = JControllerLegacy::getInstance('CMLiveDeal');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
