<?php

class Application_Model_VocableMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_Vocable');
		}
		return $this->_dbTable;
	}
	
	public function save(Application_Model_Vocable $vocable)
	{
		$data = array(
				'german'   => $vocable->getGerman(),
				'english' => $vocable->getEnglish(),
				'level' => $vocable->getLevel(),
		);
	
		if (null === ($id = $vocable->getId())) {
			unset($data['voc_id']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('voc_id = ?' => $id));
		}
	}
	
	public function find($id, Application_Model_Vocable $vocable)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		$vocable->setId($row->voc_id)
		->setGerman($row->german)
		->setEnglish($row->english)
		->setLevel($row->level);
	}
	
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_Vocable();
			$entry->setId($row->voc_id)
			->setGerman($row->german)
			->setEnglish($row->english)
			->setLevel($row->level);
			$entries[] = $entry;
		}
		return $entries;
	}

}

