<?php

/**
* 
*/
class TsAPI
{
	protected $ts3;
	protected $permissions;

	function __construct(){
		try {
			// $this->cfg = Tools::getConfig('tsconfig_dev');
			$this->cfg = Tools::getConfig('tsconfig');
			$this->ts3 = TeamSpeak3::factory("serverquery://{$this->cfg['user']}:{$this->cfg['pass']}@{$this->cfg['host']}:{$this->cfg['qPort']}/?server_port={$this->cfg['sPort']}&nickname={$this->cfg['nick']}");			
		} catch (Exception $e) {
			Tools::Log('error', 'Error', array($e));
		}

	}

	public function createChan($chanName)
	{
		try {
			// get channel order 
			$chan_order = $this->ts3->channelGetById($this->cfg['base'])->getProperty('channel_order');
			// Tools::Log('info', 'Got the order');
			// create a channel and get its ID
			$top_cid = $this->ts3->channelCreate(array(
				"channel_name" => $chanName,
				"channel_order" => $chan_order,
				"channel_flag_permanent" => TRUE
			));
			// Tools::Log('info', 'Created the channel');
			// create cpacer and get its ID
			$cpacer_cid = $this->ts3->channelCreate(array(
				"channel_name" => "[" . $this->cfg['spacerOper'] . "spacer" . mt_rand(1, 99999) . "]". $this->cfg['spacer'],
				"channel_flag_permanent" => TRUE,
				"channel_order" => $top_cid,
				"channel_flag_maxclients_unlimited" => false,
				"channel_maxclients" => 0,
			)); 
			// Tools::Log('info', 'Created the spacer');
			// set permissions (WIP)
			foreach ($this->cfg['permissions'] as $permission => $value) {
				$this->ts3->channelGetById($top_cid)->permAssignByName($permission, $value);
			}
			// Tools::Log('info', 'Setted permissions');
			// get token
			$token = $this->ts3->channelGroupGetById($this->cfg['chanAdmin'])->tokenCreate($top_cid);
			// Tools::Log('info', $token);
			return $token;
		} catch (Exception $e) {
			Tools::Log('error', 'Error', array($e));
			return false;
		}

	}

}


