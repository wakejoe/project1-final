<?php
class Wakejoe_Auth_Auth extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $loginController = 'user';
        $loginAction     = 'login';
        $local           = Zend_Registry::get('Zend_Locale');
        $auth = Zend_Auth::getInstance();

        // If user is not logged in and is not requesting login page
        // - redirect to login page.
        if (!$auth->hasIdentity()
                && $request->getControllerName() != $loginController
                && $request->getActionName()     != $loginAction) {

            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
            $redirector->gotoUrl('/nl_BE/login');
        }

        // User is logged in or on login page.

        if ($auth->hasIdentity()) {
            // Is logged in
            // Let's check the credential
            $registry = Zend_Registry::getInstance();
            $acl = $registry->get('acl');
            $identity = $auth->getIdentity();
            
            // role is a column in the user table (database)
            $isAllowed = $acl->isAllowed('admin',
                                         $request->getControllerName(),
                                         $request->getActionName());
            if (!$isAllowed) {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');
                $redirector->gotoUrl('/noaccess');
            }
        }
    }
}