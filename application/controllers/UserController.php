<?php

class UserController extends Zend_Controller_Action
{

    private $sess = null;
    public function init()
    {
        /* Initialize action controller here */
        $user_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->sess = new Zend_Session_Namespace("Zend_Auth");
        $authorization = Zend_Auth::getInstance();
        $action = $this->getRequest()->getActionName();
        if ($action == 'displaystory') {
            if (!$authorization->hasIdentity()) {

                $this->redirect("/user/login");
            }
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function signupAction()
    {
        // action body
        $signUpForm = new Application_Form_Signup();
        $this->view->signUpForm = $signUpForm;

        if ($this->getRequest()->isPost()) {
            if ($signUpForm->isValid($this->getRequest()->getParams())) {
                if ($this->_request->getParam('cpassword') === $this->_request->getParam('password')) {
                    $user = new Application_Model_User();


                    try {
                        $user->signUp($this->_request->getParams());
                        $this->redirect("user/login");
                    } catch (Exception $e) {
                        echo "This E-mail is alredy exists!";
                    }
                } else {
                    echo 'Check the password Please!';
                }
            }
        }
    }

    public function loginAction()
    {
        // action body7
        $logIn = new Application_Form_Login();
        $this->view->signInForm = $logIn;

        if ($this->_request->isPost()) {
            if ($logIn->isValid($this->getRequest()->getParams())) {
                $this->view->logInForm = $logIn;
                $data = $this->_request->getParams();

                $db = Zend_Db_Table::getDefaultAdapter();
                $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'users', 'email', 'password');
                $authAdapter->setIdentity($data['email']);
                $authAdapter->setCredential(md5($data['password']));
                $result = $authAdapter->authenticate();

                if ($result->isValid()) {

                    $auth = Zend_Auth::getInstance();
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array('email', 'id', 'fname', 'lname')));

                    //$user_data = Zend_Auth::getInstance()->getStorage()->read();
                    //redirect to home page////////////////////////////////
                    $this->redirect('user/index');
                }
            }
        }
    }

    public function displaystoryAction()
    {
        // action body
    }

    public function logoutAction()
    {
        // action body
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect("user/login");
    }


}









