<?php
class PersonModel extends Model{
	public function index(){
		$this->query('SELECT id,first_name,last_name FROM person_details');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add($postVar){

		if($postVar['submit']){

			if($postVar['firstName'] == ''){
				Messages::setMsg('First Name is Required', 'error');
				return;
			}

			// Insert FirstName & LastName into MySQL DB
			$this->query('INSERT INTO person_details (first_name, last_name) VALUES (:firstName, :lastName)');
			$this->bind(':firstName', $postVar['firstName']);
			$this->bind(':lastName', $postVar['lastName']);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				//prettyPrint($this->lastInsertId());
				$pId = $this->lastInsertId();
			}

			//Filtering the Arrays to remove empty or null values (if any)
			$emails = array_filter($postVar['emails']);
			$numbers = array_filter($postVar['numbers']);
			$addresses = array_filter($postVar['addresses']);
			$groups = array_filter($postVar['groups']);

			//Insert Emails in Database Table
			foreach($emails as $email){
				$this->query('INSERT INTO email_addresses (person_id, email) VALUES (:pId, :email)');
				$this->bind(':pId', $pId);
				$this->bind(':email', $email);
				$this->execute();
			}
			//Insert Numbers in Database Table
			foreach($numbers as $num){
				$this->query('INSERT INTO contact_numbers (person_id, number) VALUES (:pId, :num)');
				$this->bind(':pId', $pId);
				$this->bind(':num', $num);
				$this->execute();
			}
			//Insert Addresses in Database Table
			foreach($addresses as $address){
				$this->query('INSERT INTO street_addresses (person_id, address) VALUES (:pId, :address)');
				$this->bind(':pId', $pId);
				$this->bind(':address', $address);
				$this->execute();
			}
			//Insert Groups in Database Table
			foreach($groups as $gId){
				$this->query('INSERT INTO group_members (person_id, group_id) VALUES (:pId, :gId)');
				$this->bind(':pId', $pId);
				$this->bind(':gId', $gId);
				$this->execute();
			}
			if($pId){
				//Redirect
				Messages::setMsg('Record Successfully Saved', 'success');
				header('Location: '.ROOT_URL.'persons');
			}
		}
		$this->query('SELECT id, name FROM group_names');
		$rows = $this->resultSet();
		return $rows;
	}

	public function view($getVar){
		$id = $getVar['id'];
		if($id != ''){

			$personDetails = array();

			$this->query('SELECT first_name firstName, last_name lastName FROM person_details WHERE id= :id');
			$this->bind(':id', $id);
			$res1 = $this->single();

			if(!empty($res1)){
				foreach($res1 as $label => $value){
					$personDetails[$label] = $value;
				}
			}

			$this->query('SELECT email FROM email_addresses WHERE person_id= :id');
			$this->bind(':id', $id);
			$res2 = $this->resultSet();
			if(!empty($res2)){
				$emails = array();
				foreach($res2 as $value){
					array_push($emails, $value['email']);
				}
				$personDetails['emails'] = $emails;
			}
			

			$this->query('SELECT number FROM contact_numbers WHERE person_id= :id');
			$this->bind(':id', $id);
			$res3 = $this->resultSet();
			if(!empty($res3)){
				$numbers = array();
				foreach($res3 as $value){
					array_push($numbers, $value['number']);
				}
				$personDetails['numbers'] = $numbers;
			}
			

			$this->query('SELECT address FROM street_addresses WHERE person_id= :id');
			$this->bind(':id', $id);
			$res4 = $this->resultSet();
			if(!empty($res4)){
				$addresses = array();
				foreach($res4 as $value){
					array_push($addresses, $value['address']);
				}
				$personDetails['addresses'] = $addresses;
			}

			$this->query('SELECT name FROM group_names AS n 
							INNER JOIN group_members AS m ON n.id = m.group_id
							INNER JOIN person_details AS p ON m.person_id = p.id
			 				WHERE person_id= :id');
			$this->bind(':id', $id);
			$res5 = $this->resultSet();
			if(!empty($res5)){
				$groups = array();
				foreach($res5 as $value){
					array_push($groups, $value['name']);
				}
				$personDetails['groups'] = $groups;
			}

			if(empty($personDetails)){
				Messages::setMsg('No Members Found', 'info');
			} else {
				return $personDetails;
			}
			return;
		}
	}

	public function edit(){
		Messages::setMsg('Functionality Not Implemented Yet', 'info');
		return;
	}
	public function delete($postVar){
		if($postVar['submit']){

			$this->query('DELETE FROM person_details WHERE id = :id');
			$this->bind(':id',$_GET['id']);
			$this->execute();
			if($this->error){
				return;
			}
			header('Location: '.ROOT_URL.'persons');
		}
		return;
	}
}