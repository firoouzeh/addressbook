<?php
class GroupModel extends Model{
	public function index(){
		$this->query('SELECT * FROM group_names');
		$rows = $this->resultSet();
		return $rows;
	}
	
	public function create($postSubmit, $postName){
		if($postSubmit){

			if($postName == ''){
				Messages::setMsg('Please give a group name', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO group_names (name) VALUES (:name)');
			$this->bind(':name', $postName);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'groups');
			}
		}
		return;
	}

	public function edit($getId,$postName, $postSubmit){
		if(!empty($getId) && $postSubmit){
			if($postName == ''){
				Messages::setMsg('Please give a group name', 'error');
				return;
			}

			// Check if id exists in Table
			if(!$this->getName($getId)){
				Messages::setMsg('Invalid ID !!', 'error');
				return;		
			}

			// Update into MySQL
			$this->query('UPDATE group_names SET name = :name WHERE id = :id');
			$this->bind(':name', $postName);
			$this->bind(':id', $getId);
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

	public function view($getId){
		if($getId != ''){
			$this->query('SELECT p.id, concat(p.first_name, " ", p.last_name) AS name FROM person_details AS p 
							INNER JOIN group_members AS m ON p.id = m.person_id
							INNER JOIN group_names AS n ON m.group_id = n.id
			 				WHERE n.id= :id');
			$this->bind(':id', $getId);
			$res = $this->resultSet();
			if(empty($res)){
				Messages::setMsg('No Members Found', 'info');
			} else {
				return $res;
			}
			return;
		}
	}

	public function delete($deleteConfirm, $getId){
		if($deleteConfirm){
			$this->query('DELETE FROM group_names WHERE id = :id');
			$this->bind(':id',$getId);
			$this->execute();
			if($this->error){
				return;
			}
			header('Location: '.ROOT_URL.'groups');
		}
		return;
	}
}