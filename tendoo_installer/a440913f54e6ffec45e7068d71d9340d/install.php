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
  `PROJET_NAME` varchar(100) NOT NULL,
  `PROJET_NAMESPACE` varchar(100) NOT NULL,
  `PROJET_VERSION` varchar(100) NOT NULL,
  `PROJET_TENDOO_VERSION` varchar(100),
  `PROJET_LOCATION` text,
  `DATE_MOD` datetime NOT NULL,
  `AUTEUR` int(11) NOT NULL,
  `DATE` datetime(200) NOT NULL,
  PRIMARY KEY (`ID`)
);');
$this->appAction(array(
	'action'				=>	'createTheme',
	'action_name'			=>	'Créer des thèmes',
	'action_description'	=>	'Cette action autorise les utilisateurs à utiliser le module pour créer des thèmes.',
	'mod_namespace'			=>	'tendoo_theme_builder'
));