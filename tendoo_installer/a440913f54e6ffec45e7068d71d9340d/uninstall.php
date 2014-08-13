<?php
$this->db->query('DROP TABLE IF EXISTS `'.DB_ROOT.'tendoo_theme_builder_projet`');
$this->db->where('MOD_NAMESPACE','tendoo_theme_builder')->delete('tendoo_modules_actions');
