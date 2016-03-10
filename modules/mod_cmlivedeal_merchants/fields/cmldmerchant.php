<?php
/**
 * @package    CMLiveDealMerchants
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('user');

/**
 * Select merchant user via modal.
 *
 * @since  1.0.0
 */
class JFormFieldCMLDMerchant extends JFormFieldUser
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 *
	 * @since  1.5.0
	 */
	public $type = 'CMLDMerchant';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   1.5.0
	 */
	protected function getInput()
	{
		require_once JPATH_SITE . '/administrator/components/com_cmlivedeal/helpers/cmldmerchant.php';

		if ($this->value != '')
		{
			$merchantIds = explode(',', $this->value);
		}
		else
		{
			$merchantIds = array();
		}

		JArrayHelper::toInteger($merchantIds);
		$userInput = 'userInput';

		$html = array();
		$groups = $this->getGroups();
		$excluded = $this->getExcluded();
		$link = 'index.php?option=com_users&amp;view=users&amp;layout=modal&amp;tmpl=component&amp;field=' . $userInput
			. (isset($groups) ? ('&amp;groups=' . base64_encode(json_encode($groups))) : '')
			. (isset($excluded) ? ('&amp;excluded=' . base64_encode(json_encode($excluded))) : '');

		$attr = !empty($this->class) ? ' class="' . $this->class . '"' : '';
		$attr .= !empty($this->size) ? ' size="' . $this->size . '"' : '';
		$attr .= $this->required ? ' required' : '';

		JHtml::_('behavior.modal', 'a.modal_' . $userInput);

		$script = array();
		$script[] = '	var maxMerchant = ' . count($merchantIds) . ';';
		$script[] = '	function jSelectUser_' . $userInput . '(id, title) {';
		$script[] = '		var old_id = document.getElementById("' . $userInput . '_id").value;';
		$script[] = '		if (old_id != id) {';
		$script[] = '			document.getElementById("' . $userInput . '_id").value = id;';
		$script[] = '			document.getElementById("' . $userInput . '").value = title;';
		$script[] = '			document.getElementById("'
			. $this->id . '").className = document.getElementById("' . $userInput . '").className.replace(" invalid" , "");';
		$script[] = '			' . $this->onchange;
		$script[] = '		}';
		$script[] = '		jModalClose();';
		$script[] = '	}';
		$script[] = '	function addMerchant() {';
		$script[] = '		merchantId = jQuery("#' . $userInput . '_id").val();';
		$script[] = '		merchantName = jQuery("#' . $userInput . '").val();';
		$script[] = '		if (merchantId != "") {';
		$script[] = '			html = "<tr class=\"merchant\" id=\"merchant-" + merchantId + "\">";';
		$script[] = '			html += "<td>" + merchantName + "</td>";';
		$script[] = '			html += "<td>";';
		$script[] = '			html += "<span class=\"btn\" onclick=\"deleteMerchant(" + merchantId + ")\">x</span>";';
		$script[] = '			html += "<input class=\"merchant-id\" type=\"hidden\" value=\"" + merchantId + "\"></td>";';
		$script[] = '			html += "</tr>";';
		$script[] = '			jQuery("#merchantTable tbody").append(html);';
		$script[] = '			generateValue();';
		$script[] = '		}';
		$script[] = '	}';
		$script[] = '	function deleteMerchant(id) {';
		$script[] = '		jQuery("#merchant-" + id).remove();';
		$script[] = '		generateValue();';
		$script[] = '	}';
		$script[] = '	function generateValue() {';
		$script[] = '		merchantIds = "";';
		$script[] = '		jQuery(".merchant-id").each(function(index, value) {';
		$script[] = '			merchantIds = merchantIds + jQuery(this).val() + ",";';
		$script[] = '		});';
		$script[] = '		merchantIds = merchantIds.substring(0, merchantIds.length - 1);';
		$script[] = '		jQuery("#' . $this->id . '").val(merchantIds);';
		$script[] = '	}';

		$html[] = '<div class="input-append">';
		$html[] = '	<input type="text" id="' . $userInput . '" value="' . htmlspecialchars(JText::_('JLIB_FORM_SELECT_USER'), ENT_COMPAT, 'UTF-8') . '"'
			. ' readonly' . $attr . ' />';

		if ($this->readonly === false)
		{
			$html[] = '		<a class="btn btn-primary modal_' . $userInput . '" title="' . JText::_('JLIB_FORM_CHANGE_USER') . '" href="' . $link . '"'
				. ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
			$html[] = '<i class="icon-user"></i></a>';
			$html[] = '<span class="btn btn-primary" onclick="addMerchant();"><i class="icon-plus"></i></span>';
		}

		$html[] = '</div>';

		$html[] = '<input type="hidden" id="' . $userInput . '_id" value="" />';

		$html[] = '<div class="row-fluid">';
		$html[] = '<table id="merchantTable" class="table table-stripe span6">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>' . JText::_('MOD_CMLIVEDEAL_MERCHANTS_MERCHANTS') . '</th>';
		$html[] = '<th width="1%"></th>';
		$html[] = '</tr>';
		$html[] = '</thead>';
		$html[] = '<tbody>';

		if (!empty($merchantIds))
		{
			for ($i = 0; $i < count($merchantIds); $i++)
			{
				$user = JFactory::getUser($merchantIds[$i]);
				$merchant = new CMLDMerchant($merchantIds[$i]);
				$html[] = '<tr class="merchant" id="merchant-' . $i . '">';
				$html[] = '<td>' . $user->name . '</td>';
				$html[] = '<td>';
				$html[] = '<span class="btn" onclick="deleteMerchant(' . $i . ')">x</span>';
				$html[] = '<input class="merchant-id" type="hidden" value="' . $merchantIds[$i] . '"></td>';
				$html[] = '</tr>';
			}
		}

		$html[] = '</tbody>';
		$html[] = '</table>';
		$html[] = '</div>';

		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		$html[] = '<input type="hidden" name="' . $this->name . '"' . ' id="' . $this->id . '" value="'
			. $this->value . '"' . ' />';

		return implode("\n", $html);
	}

	/**
	 * Method to get the filtering groups (null means no filtering).
	 *
	 * @return  mixed  array of filtering groups or null.
	 *
	 * @since   1.5.0
	 */
	protected function getGroups()
	{
		return array(JComponentHelper::getParams('com_cmlivedeal')->get('merchant_group'));
	}

	/**
	 * Method to get the users to exclude from the list of users.
	 *
	 * @return  mixed  Array of users to exclude or null to to not exclude them.
	 *
	 * @since   1.5.0
	 */
	protected function getExcluded()
	{
		return null;
	}
}
