<?php
class Wakejoe_Auth_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request){

        $acl = new Zend_Acl();
        $roles  = array('admin', 'normal');
        // Controller script names. You have to add all of them if credential check
        // is global to your application.
        $controllers = array('users', 'index', 'page','error','test');

        foreach ($roles as $role) {
            $acl->addRole(new Zend_Acl_Role($role));
        }
        
        foreach ($controllers as $controller) {
            $acl->add(new Zend_Acl_Resource($controller));
        }

        // Here comes credential definiton for admin user.
        $acl->allow('admin'); // Has access to everything.
        $acl->deny('admin','test');
        // Here comes credential definition for normal user.
        $acl->allow('normal'); // Has access to everything...
        $acl->deny('normal', 'users'); // ... except the admin controller.

        // Finally I store whole ACL definition to registry for use
        // in AuthPlugin plugin.
        $registry = Zend_Registry::getInstance();
        $registry->set('acl', $acl);

    }
}