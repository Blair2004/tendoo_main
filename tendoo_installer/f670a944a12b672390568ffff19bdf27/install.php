<?php
$this->installSession();
$this->appType('MODULE');
$this->appVers(0.1);
$this->appTendooVers(0.97);
$this->appTableField(array(
	'NAMESPACE'		=> 'tendoo_theme_builder',
	'HUMAN_NAME'	=> 'Tendoo Theme Builder',
	'AUTHOR'		=> 'tendoo Group',
	'DESCRIPTION'	=> 'Créer des thèmes avec sous sans interface embarqué avec ce module',
	'TYPE'			=> 'UNIQUE',
	'TENDOO_VERS'	=> 0.97,
	'HAS_ICON'		=>	1
));
$this->appSql(	
'CREATE TABLE IF NOT EXISTS `'.DB_ROOT.'tendoo_theme_builder_projet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROJECT_NAME` varchar(100) NOT NULL,
  `PROJECT_NAMESPACE` varchar(100) NOT NULL,
  `PROJECT_VERSION` varchar(100) NOT NULL,
  `PROJECT_TENDOO_VERSION` varchar(100),
  `PROJECT_LOCATION` text,
  `DESRIPTION` text,
  `DATE_MOD` datetime NOT NULL,
  `AUTHOR` varchar(200) NOT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
);');
$this->appAction(array(
	'action'				=>	'createTheme',
	'action_name'			=>	'Créer des thèmes',
	'action_description'	=>	'Cette action autorise les utilisateurs à utiliser le module pour créer des thèmes.',
	'mod_namespace'			=>	'tendoo_theme_builder'
));