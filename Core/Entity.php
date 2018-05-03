<?php
namespace Core;

class Entity
{
	public function __construct($params)
	{
		$this->param = $params;
		$orm = new ORM();
		if(isset($this->param->email))
		{
			$id = $orm->identity('users', array('mail' => $this->param->email, 'password' => $this->param->password));
			$this->id = $id['id'];
		}
	}

	public function save()
	{
		$orm = new ORM();
		$ID = $orm->create('users', array('mail' => $this->param->email, 'password' => $this->param->password));
 		$results = $orm->read('users', $ID['id']);
		return $results;
	}

	public function retrieve()
	{
		$orm = new ORM();
		$results = $orm->read('users', $this->id);
		return $results;
	}

	public function rescue()
	{
		$orm = new ORM();
		$orm->update('users', $this->id, array(
 		'newemail' => $this->param->newemail,
 		'newpassword' => $this->param->newpassword));
	}

	public function remove($table, $row, $field)
	{
		$orm = new ORM();
		$orm->delete($table, $row, $field);
	}

	public function discover()
	{
		$orm = new ORM();
		$orm->find('users', $this->id);
	}

}
?>