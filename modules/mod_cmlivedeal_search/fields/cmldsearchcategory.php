<?php
/**
 * @package    CMLiveDealSearch
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/models/fields/cmldcategory.php';

/**
 * Supports an HTML select list of categories for CM Live Deal Search module.
 *
 * @since  1.5.0
 */
class JFormFieldCMLDSearchCategory extends JFormFieldCMLDCategory
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 *
	 * @since  1.5.0
	 */
	public $type = 'CMLDSearchCategory';
}
