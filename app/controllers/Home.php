<?php

/**
 * The default home controller, called when no controller/method has been passed
 * to the application.
 */
class Home extends Controller
{
    /**
     * The default controller method.
     *
     * @return void
     */
    public function index()
    {
        $this->view('home/index', [
            'cfg' => $this->cfg,
            'lang' => $this->lang('index')
        ]);
    }

    public function debug()
    {
        echo password_hash('112233', PASSWORD_BCRYPT);
    }
}
