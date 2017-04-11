<?php
class GroupModel extends Model{
	public function index(){
		$this->query('SELECT * FROM group_names');
		$rows = $this->resultSet();
		return $rows;
	}
	
	public function create($postVar){
		prettyPrint($postVar);
		if($postVar['submit']){

			if($postVar['name'] == ''){
				Messages::setMsg('Please give a group name', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO group_names (name) VALUES (:name)');
			$this->bind(':name', $postVar['name']);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'groups');
			}
		}
		return;
	}

	public function edit($getVar,$postVar){
		// Sanitize GET & POST array

		if(!empty($getVar['id']) && $postVar['submit']){
			if($postVar['name'] == ''){
				Messages::setMsg('Please give a group name', 'error');
				return;
			}

			// Check if id exists in Table
			if(!$this->getName($getVar['id'])){
				Messages::setMsg('Invalid ID !!', 'error');
				return;		
			}

			// Update into MySQL
			$this->query('UPDATE group_names SET name = :name WHERE id = :id');
			$this->bind(':name', $postVar['name']);
			$this->bind(':id', $getVar['id']);
			$res = $this->execute();
			//Execute & Verify
			if($res){
				//Redirect
				header('Location: '.ROOT_URL.'groups');
			} else {
				Messages::setMsg('ERROR !!', 'error');
			}

		}
		return;
	}

	public function getName($id){
		if($id != ''){
			$this->query('SELECT name from group_names WHERE id = :id');
			$this->bind(':id', $id);
			$res = $this->single();
			return $res['name'];
		}
	}

	public function view($getVar){
		$id = $getVar['id'];
		if($id != ''){
			$this->query('SELECT p.id, concat(p.first_name, " ", p.last_name) AS name FROM person_details AS p 
							INNER JOIN group_members AS m ON p.id = m.person_id
							INNER JOIN group_names AS n ON m.group_id = n.id
			 				WHERE n.id= :id');
			$this->bind(':id', $id);
			$res = $this->resultSet();
			if(empty($res)){
				Messages::setMsg('No Members Found', 'info');
			} else {
				return $res;
			}
			return;
		}
	}

	public function delete($postVar){
		if($postVar['submit']){

			$this->query('DELETE FROM group_names WHERE id = :id');
			$this->bind(':id',$_GET['id']);
			$this->execute();
			if($this->error){
				return;
			}
			header('Location: '.ROOT_URL.'groups');
		}
		return;
	}
}