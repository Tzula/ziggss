<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$app		= JFactory::getApplication();
$coupon		= $this->item;
$deal		= $this->item->deal;
$merchant	= $this->item->merchant;
$params		= $this->params;
$template	= $this->template;
$format		= $params->get('coupon_format', 'html');
$captured	= JHtml::_('cmlivedeal.date', $coupon->created);
$expired	= JHtml::_('cmlivedeal.date', $deal->ending_time);

// Add CSS.
$doc = JFactory::getDocument();

if ($params->get('fontawesome', 1))
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/font-awesome.min.css');
}

$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style.css');

if (JFactory::getLanguage()->isRTL())
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style-rtl.css');
}

$template = str_replace('{code}',		$coupon->code,				$template);
$template = str_replace('{deal}',		$deal->title,				$template);
$template = str_replace('{description}',$deal->description,			$template);
$template = str_replace('{terms}',		$deal->fine_print,			$template);
$template = str_replace('{merchant}',	$merchant->get('name'),		$template);
$template = str_replace('{address}',	$merchant->get('address'),	$template);
$template = str_replace('{phone}',		$merchant->get('phone'),	$template);
$template = str_replace('{captured}',	$captured,					$template);
$template = str_replace('{expired}',	$expired,					$template);

if ($format == 'pdf')
{
	jimport('mpdf.mpdf');
	$qrcode = '<barcode code="' . $coupon->code . '" type="QR" class="barcode" error="L" />';
	$template = str_replace('{qrcode}', $qrcode, $template);

	$mpdf = new mPDF('c');

	$mpdf->WriteHTML($template);
	$mpdf->Output();

	$app->close();
}
else
{
	$qrcodeSize = (int) $params->get('qrcode_size', 150);
	$qrcode = '<img src="index.php?option=com_cmlivedeal&task=qrcode.generate&code=' . $coupon->code . '&size=' . $qrcodeSize . '">';
	$template = str_replace('{qrcode}', $qrcode, $template);

	echo $template;
}
