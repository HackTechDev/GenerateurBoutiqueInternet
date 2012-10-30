<?php

class LogicielsController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		// action body
	}

	public function viewAction()
	{
		// action body
		$logicielid = (int)$this->_getParam('id');
		if( empty($logicielid) ) {
		}
		$logiciel = new Model_DbTable_Logiciels();
		$result = $logiciel->getLogiciel($logicielid);
		$this->view->logiciel = $result;
		$extensionsObj = new Model_DbTable_Extensions();
		$request = $this->getRequest();
		$extensionsForm = new Form_Extensions();
		/*
		 * Check the extension form has been posted
		 */
		if ($this->getRequest()->isPost()) {
			if ($extensionsForm->isValid($request->getPost())) {
				$model = new Model_DbTable_Extensions();
				$model->saveExtension($extensionsForm->getValues());
				$extensionsForm->reset();
			}
		}
		$data = array( 'id'=> $logicielid );
		$extensionsForm->populate( $data );
		$this->view->extensionsForm = $extensionsForm;
		$extensions = $extensionsObj->getExtensions($logicielid);
		$this->view->extensions = $extensions;
		$this->view->edit = '/logiciels/edit/id/'.$logicielid;
	}

	public function extensionsAction()
	{
		// action body
	}

	public function addAction()
	{
		// action body
		if(!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('index/index');
		}
                $acl = new Model_Acl();
		$identity = Zend_Auth::getInstance()->getIdentity();
                if( $acl->isAllowed( $identity['Role'] ,'logiciels','add') ) {
                    $request = $this->getRequest();
                    $logicielForm = new Form_Logiciel();
                    if ($this->getRequest()->isLogiciel()) {
                            if ($logicielForm->isValid($request->getLogiciel())) {
                                    $model = new Model_DbTable_Logiciels();
                                    $model->saveLogiciel($logicielForm->getValues());
                                    $this->_redirect('index/index');
                            }
                    }
                    $this->view->logicielForm = $logicielForm;
                }
	}

	public function editAction()
	{
		// action body
		$request = $this->getRequest();
		$logicielid = (int)$request->getParam('id');
		if(!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('logiciels/view/id/'.$logicielid);
		}
		$identity = Zend_Auth::getInstance()->getIdentity();
		
		$acl = new Model_Acl();
		if( $acl->isAllowed( $identity['Role'] ,'logiciels','edit') ) {
			$logicielForm = new Form_Logiciel();
			$logicielModel = new Model_DbTable_Logiciels();
			if ($this->getRequest()->isPost()) {
				if ($logicielForm->isValid($request->getPost())) {
					$logicielModel->updateLogiciel($logicielForm->getValues());
					$this->_redirect('logiciels/view/id/'.$logicielid);
				}
			} else {
				$result = $logicielModel->getLogiciel($logicielid);
				$logicielForm->populate( $result );
			}
			$this->view->logicielForm = $logicielForm;
		} else {
			var_dump( $identity['Role'] );
			//$this->_redirect('logiciels/view/id/'.$logicielid);
		}
	}

}
