<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Cccinvisiblerecaptcha
 *
 * @copyright   Copyright (C) 2017 Coolcat-Creations.com
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


JLoader::import('components.com_fields.libraries.fieldsplugin', JPATH_ADMINISTRATOR);

class PlgFieldsCccinvisiblerecaptcha extends FieldsPlugin
{

	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{

		JHtml::_('script', 'https://www.google.com/recaptcha/api.js', array('version' => 'auto', 'defer' => true, 'async' => true));

		$plugin = JPluginHelper::getPlugin('fields', 'cccinvisiblerecaptcha');
		$globalparams = new JRegistry($plugin->params);
		$secretkey = $globalparams->get('secretkey');

		?>

        <div id='recaptcha' class="g-recaptcha"
             data-sitekey="<?php echo $secretkey; ?>"
             data-callback="onSubmit"
             data-size="invisible"></div>

		<?php

	}

}
