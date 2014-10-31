<?php

/**
* 
*/
class Email
{
	protected $cfg;
	protected $mailer;
	protected $message;

	function __construct() {
		try {
			// $this->cfg = Tools::getConfig('email_dev');
			$this->cfg = Tools::getConfig('email');
			if ($this->cfg['ssl']) {
				$transport = Swift_SmtpTransport::newInstance($this->cfg['smtp'], $this->cfg['port'], 'ssl');
			} else {
				$transport = Swift_SmtpTransport::newInstance($this->cfg['smtp'], $this->cfg['port']);
			}

			$transport->setUsername($this->cfg['user'])->setPassword($this->cfg['pass']);
			$this->mailer = Swift_Mailer::newInstance($transport);
			$this->message = Swift_Message::newInstance('request')
				->setFrom($this->cfg['from']);
		} catch (Exception $e) {
			Tools::Log('error', 'Error: ', array($e));
		}
	}

	public function sendYes($data)
	{
		$req = $data['req'];
		$search = array('%name%', '%channame%', '%channameURL%', '%token%', '%msg%');
		$replace = array($req->name, $req->cname, rawurlencode($req->cname), $data['token'], $req->reason);
		$msg = str_replace($search, $replace, $this->cfg['msgHeadYes']);
		try {
			$this->message->setTo(array($req->email))->setBody($msg . "\n\n{$this->cfg['msgSig']}");
			$result = $this->mailer->send($this->message);
			return $result;
		} catch (Exception $e) {
			Tools::Log('error', 'Error: ', array($e));
		}
	}

	public function sendNo($data)
	{
		$req = $data['req'];
		$search = array('%name%', '%channame%', '%msg%');
		$replace = array($req->name, $req->cname, $req->reason);
		$msg = str_replace($search, $replace, $this->cfg['msgHeadNo']);

		try {
			$this->message->setTo(array($req->email))->setBody($msg . "\n\n{$this->cfg['msgSig']}");

			$result = $this->mailer->send($this->message);
			return $result;
		} catch (Exception $e) {
			Tools::Log('error', 'Error: ', array($e));
		}
	}
}

