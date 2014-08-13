<?php
$this->installSession();
$this->appType('MODULE');
$this->appVers(0.2);
$this->appTendooVers(0.94);
$this->appTableField(array(
	'NAMESPACE'		=> 'tendoo_store',
	'HUMAN_NAME'	=> 'Boutique Tendoo',
	'AUTHOR'		=> 'Tendoo Group',
	'DESCRIPTION'	=> 'Boutique Tendoo qui rassemble les applications Tendoo examin&eacute;e.',
	'TYPE'			=> 'BYPAGE',
	'TENDOO_VERS'	=> 0.94
));
$this->appSql(	
'CREATE TABLE IF NOT EXISTS `'.DB_ROOT.'tendoo_site_tracker` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SITE_URL` text,
  `SITE_NAME` varchar(200),
  `SITE_VERSION` varchar(200),
  `INDEXED_SINCE` datetime NOT NULL,
  `LAST_ACTIVITY` datetime NOT NULL,
  `STORE_CONNEXION` int(11),
  PRIMARY KEY (`ID`)
);');
$this->appSql(	
'CREATE TABLE IF NOT EXISTS `'.DB_ROOT.'tendoo_apps` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `APP_NAME` varchar(100),
  `APP_NAMESPACE` varchar(200),
  `APP_VERSION` varchar(200),
  `APP_AUTHOR` varchar(200) NOT NULL,
  `APP_DESCRIPTION` text NOT NULL,
  `APP_UPLOAD` datetime NOT NULL,
  `APP_TYPE` varchar(100) NOT NULL,
  `APP_ACCEPTED` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
);');

$this->appAction(array(
	'action'				=>	'tendoo_store_manage',
	'action_name'			=>	'Gestion du Tendoo Store',
	'action_description'	=>	'Cette action permet de g&eacute;rer le Store.',
	'mod_namespace'			=>	'tendoo_store'
));
$this->appAction(array(
	'action'				=>	'tendoo_app_submit',
	'action_name'			=>	'Soumettre des applications Tendoo',
	'action_description'	=>	'Cette action permet aux utiliateurs de soumettre des applications tendoo.',
	'mod_namespace'			=>	'tendoo_store'
));
$this->appAction(array(
	'action'				=>	'tendoo_app_handle',
	'action_name'			=>	'Gestion des applications envoyés',
	'action_description'	=>	'Permet d\'avoir un contrôle sur les applications envoy&eacute;es.',
	'mod_namespace'			=>	'tendoo_store'
));