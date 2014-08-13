<?php
$this->db->query('DROP TABLE IF EXISTS `'.DB_ROOT.'tendoo_site_tracker`');
$this->db->where('MOD_NAMESPACE','tendoo_store')->delete('tendoo_modules_actions');
