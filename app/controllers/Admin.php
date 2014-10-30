<?php


/**
* 
*/
class Admin extends Controller
{
	public function index()
	{
		Tools::authCheck();
		$req = $this->model('requests');

        $this->view('admin/index', [
            'cfg' => $this->cfg,
            'requests' => $req->where('status', '=', 0)->get()->toArray(),
            'lang' => $this->lang('admin')
        ]);
	}

	public function login()
	{
        $this->view('admin/login', [
            'cfg' => $this->cfg,
            'lang' => $this->lang('admin')
        ]);
	}

	public function settings()
	{
		Tools::authCheck();
        $this->view('admin/settings', [
            'cfg' => $this->cfg,
            'lang' => $this->lang('settings')
        ]);
	}

	public function logout()
	{
		session_start();
    	session_unset();
		session_destroy();
		header("Location:" . HTTP_ROOT . "/admin");
		exit;
	}
}

