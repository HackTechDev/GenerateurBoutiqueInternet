<?php
class Form_Extensions extends Zend_Form
{
	public function __construct()
	{
		$acl = new Model_Acl();
		$identity = Zend_Auth::getInstance()->getIdentity();
		/*
		 * Check whether they have access to it.
		 */
		if( Zend_Auth::getInstance()->hasIdentity()
		&& $acl->isAllowed( $identity['Role'] ,'extensions','add') ) {
			parent::__construct();
			$this->setName('Extensions');
			$id = new Zend_Form_Element_Hidden('id');
			$name = new Zend_Form_Element_Text('name');
			$name->setLabel('Your Name')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
			$email = new Zend_Form_Element_Text('email');
			$email->setLabel('Email')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
			$webpage = new Zend_Form_Element_Text('webpage');
			$webpage->setLabel('Webpage')
				->setRequired(true)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
			$extension = new Zend_Form_Element_Textarea('extension');
			$extension->setLabel('Extensions')
				->setRequired(true)
				->setAttrib('rows',7)
				->setAttrib('cols',30)
				->addFilter('StripTags')
				->addFilter('StringTrim')
				->addValidator('NotEmpty');
			$submit = new Zend_Form_Element_Submit('submit');
			$submit->setAttrib('id', 'submitbutton');
			$this->addElements( array ($id, $name, $email, $webpage, $extension, $submit));
		}
	}
}
