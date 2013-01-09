<?php

class Application_Model_Vocable extends Zend_Db_Table_Abstract
{
	//protected $_name = 'vocabel';
	protected $_level;
	protected $_german;
	protected $_english;
	protected $_voc_id;
	
	public function __construct(array $options = null)
	{
		if (is_array($options)) {
			$this->setOptions($options);
		}
	}
	
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid vocabel property');
		}
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid vocabel property');
		}
		return $this->$method();
	}
	
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}
	
	public function setLevel($text)
	{
		$this->_level = (string) $text;
		return $this;
	}
	
	public function getLevel()
	{
		return $this->_level;
	}
	
	public function setEnglish($english)
	{
		$this->_english = (string) $english;
		return $this;
	}
	
	public function getEnglish()
	{
		return $this->_english;
	}
	
	public function setGerman($ts)
	{
		$this->_german = $ts;
		return $this;
	}
	
	public function getGerman()
	{
		return $this->_german;
	}
	
	public function setId($voc_id)
	{
		$this->_voc_id = (int) $voc_id;
		return $this;
	}
	
	public function getId()
	{
		return $this->_voc_id;
	}
}

?>