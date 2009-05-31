<?php

class LoginController extends EvHttp_Controller_Action
{
	protected $_loginForm = null;

    public function init()
    {
        $this->_loginForm = new Form_Login();
		$this->_loginForm->setAction("/login/auth");
    }

    public function indexAction()
    {
		$this->view->loginForm = $this->_loginForm;
    }

}

