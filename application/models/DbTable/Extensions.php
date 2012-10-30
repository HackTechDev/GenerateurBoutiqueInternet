<?php
class Model_DbTable_Extensions extends Zend_Db_Table_Abstract
{
	protected $_name = 'extensions';
	
	public function getExtensions( $logicielid ) 
	{
		$result = $this->fetchAll( "logiciel_id = '$logicielid'"  );
		return $result->toArray();
	}
	
	public function saveExtension( $extensionForm )
	{
		$data = array('logiciel_id' => $extensionForm['id'] ,
				'Description' => $extensionForm['extension'],
				'Name' => $extensionForm['name'],
				'Email' => $extensionForm['email'],
				'Webpage' => $extensionForm['webpage'] );
		$this->insert($data);
	}
	
}