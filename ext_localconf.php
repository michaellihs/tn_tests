<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Ajax' => 'test'
	),
	array(
		'Ajax' => 'test'
	)
);



if(TYPO3_MODE == 'FE') {

	// Ajax dispatchin in Frontend
	// Invoke this via
	// http://pt_list_dev.centos.localhost/?eID=ptxAjax&extensionName=TnTests&pluginName=pi1&controllerName=Ajax&actionName=test
	$TYPO3_CONF_VARS['FE']['eID_include']['ptxAjax'] = t3lib_extMgm::extPath('pt_extbase').'Classes/Utility/eIDDispatcher.php';

}



if(TYPO3_MODE == 'BE') {

	// Ajax dispatching in Backend
	// Invoke this via
	// http://pt_list_dev.centos.localhost/typo3/ajax.php?ajaxID=ptxAjax&extensionName=TnTests&pluginName=pi1&controllerName=Ajax&actionName=test
	$TYPO3_CONF_VARS['BE']['AJAX']['ptxAjax'] = t3lib_extMgm::extPath('pt_extbase').'Classes/Utility/AjaxDispatcher.php:Tx_PtExtbase_Utility_AjaxDispatcher->initAndEchoDispatch';

}

?>