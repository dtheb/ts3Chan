<?php


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
* 
*/
class Tools
{
	public static function authCheck()
	{
		session_start();
		if (empty($_SESSION['authed'])) {
		    header("Location:" . HTTP_ROOT . "/admin/login");
		    exit;
		}elseif (isset($_SESSION['last_active']) && (time() - $_SESSION['last_active'] > 1800)) {
		    session_unset();
		    session_destroy();
		    header("Location:" . HTTP_ROOT . "/admin/login");
		    exit;
		}
	}


	public static function getConfig($config)
    {
        return require_once INC_ROOT . '/app/config/' . ucfirst($config) . '.php';
    }
    
	public static function log($lvl, $msg, $extra = [])
	{
		$log = new Logger('log');
		$log->pushHandler(new StreamHandler(INC_ROOT . '/app/logs/errors.log', Logger::INFO));

		switch ($lvl) {
			case 'warning':
				$log->addWarning($msg, $extra);
				break;
			case 'info':
				$log->addInfo($msg, $extra);
				break;
			case 'error':
				$log->addError($msg, $extra);
				break;

			default:
				$log->addInfo($msg, $extra);
				break;
		}
	}
}

