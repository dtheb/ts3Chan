<?php

/**
*
*/
class Process extends Controller
{
	public function newRequest()
    {
    	if (!empty($_POST['email'])&&!empty($_POST['name'])&&!empty($_POST['cname'])) {
        	$req = $this->model('requests');

        	if (count($req->LimitCheck($_POST['email'])) < $this->cfg['ReqPerEmail']) {
	      		if ($req->newRequest($_POST)) {

	      			$this->view('home/index', [
						'cfg' => $this->cfg,
						'success' => true,
						'input' => $_POST,
						'lang' => $this->lang('index')
					]);
				};
			}else{
				$this->view('home/index', [
					'cfg' => $this->cfg,
					'input' => $_POST,
					'error' => ['type' => 'limit'],
					'lang' => $this->lang('index')
				]);
			}

		}else{
			$this->view('home/index', [
				'cfg' => $this->cfg,
				'input' => $_POST,
				'error' => ['type' => 'field'],
				'lang' => $this->lang('index')
			]);
	    }
    }

    public function updateRequest()
    {
    	if (!empty($_POST['id'])&&!empty($_POST['action'])) {
    		$req = $this->model('requests');

    		if ($req->updateRequest($_POST) == 1) {
    			echo 1;
    		} elseif ($req->updateRequest($_POST) == 2) {
    			echo 2;
    		} else {
    			echo $req->updateRequest($_POST);
    		}
    	}
    }

    public function auth()
    {
    	if (!empty($_POST['pass'])) {
    		$req = $this->model('auth');
    		$hash = $req->find(1)->pass;
			if (password_verify($_POST['pass'], $hash)) {
	            session_start();
	            $_SESSION['authed'] = true;
	            $_SESSION['last_active'] = time();
	            header('Location:' . HTTP_ROOT . '/admin');
	            exit;
	        } else {
	            $this->view('admin/login', [
		            'cfg' => $this->cfg,
		            'failed' => true,
		            'lang' => $this->lang('admin')
		        ]);
	        }
    	} else {
    		$this->view('admin/login', [
	            'cfg' => $this->cfg,
	            'failed' => true,
	            'lang' => $this->lang('admin')
	        ]);
    	}
    }

    public function passChange()
    {
    	if (!empty($_POST['oldpass'])&&!empty($_POST['newpass'])&&!empty($_POST['newpass2'])) {
    		if ($_POST['newpass']==$_POST['newpass2']) {
    			$req = $this->model('auth')->find(1);
    			$hash = $req->pass;
    			if (password_verify($_POST['oldpass'], $hash)) {
	    			$req->pass = password_hash($_POST['newpass'], PASSWORD_BCRYPT);
	    			$req->save();   

	 				Tools::authCheck();
			        $this->view('admin/settings', [
			            'cfg' => $this->cfg,
			            'changed' => true,
			            'lang' => $this->lang('settings')
			        ]);				
    			}else{
	 				Tools::authCheck();
			        $this->view('admin/settings', [
			            'cfg' => $this->cfg,
			            'failed' => true,
			            'lang' => $this->lang('settings')
			        ]);		    				
    			}



    		} else {
				Tools::authCheck();
		        $this->view('admin/settings', [
		            'cfg' => $this->cfg,
		            'noMatch' => true,
		            'lang' => $this->lang('settings')
		        ]);
    		}

    	}else{
			Tools::authCheck();
	        $this->view('admin/settings', [
	            'cfg' => $this->cfg,
	            'fields' => true,
	            'lang' => $this->lang('settings')
	        ]);
    	}
    }
}
