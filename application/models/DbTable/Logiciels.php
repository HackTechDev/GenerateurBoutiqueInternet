<?php
class Model_DbTable_Logiciels extends Zend_Db_Table_Abstract
{
	protected $_name = 'logiciels';

	public function getLogiciels()
	{
		$orderby = array('id DESC');
		$result = $this->fetchAll('1', $orderby );
		return $result->toArray();
	}

	public function getLogiciel( $id )
	{
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}

	/*
	 * Add new logiciels
	 */
	public function saveLogiciel( $logiciel )
	{
		$data = array( 'Title'=> $logiciel['Title'],
				'Description'=> $logiciel['Description']);
		$this->insert($data);
	}
	
	/*
	 * Update old logiciels
	 */
	public function updateLogiciel( $logiciel )
	{
		$data = array(
				'id'=> $logiciel['id'],
				'Title'=> $logiciel['Title'],
				'Description'=> $logiciel['Description']);
		$where = 'id = '.$logiciel['id'];
		$this->update($data , $where );
	}
}