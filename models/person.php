<?php
class PersonModel extends Model{
	public function index(){
		$this->query('SELECT id,first_name,last_name FROM person_details');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add($firstName, $lastName, array $emailArr, array $numberArr, array $addressArr, array $groupArr, $postSubmit){
		if($postSubmit){

			if($firstName == ''){
				Messages::setMsg('First Name is Required', 'error');
				return;
			}

			// Insert FirstName & LastName into MySQL DB
			$this->query('INSERT INTO person_details (first_name, last_name) VALUES (:firstName, :lastName)');
			$this->bind(':firstName', $firstName);
			$this->bind(':lastName', $lastName);
			$this->execute();
			//Verify
			if($this->lastInsertId()){
				//prettyPrint($this->lastInsertId());
				$pId = $this->lastInsertId();
			}

			//Filtering the Arrays to remove empty or null values (if any)
			$emails = array_filter($emailArr);
			$numbers = array_filter($numberArr);
			$addresses = array_filter($addressArr);
			$groups = array_filter($groupArr);

			//Insert Emails in Database Table
            if(!empty($emails)){
                foreach($emails as $email){
                    $this->query('INSERT INTO email_addresses (person_id, email) VALUES (:pId, :email)');
                    $this->bind(':pId', $pId);
                    $this->bind(':email', $email);
                    $this->execute();
                }
            }

			//Insert Numbers in Database Table
            if(!empty($numbers)){
                foreach($numbers as $num){
                    $this->query('INSERT INTO contact_numbers (person_id, number) VALUES (:pId, :num)');
                    $this->bind(':pId', $pId);
                    $this->bind(':num', $num);
                    $this->execute();
                }
            }
			//Insert Addresses in Database Table
            if(!empty($addresses)){
                foreach($addresses as $address){
                    $this->query('INSERT INTO street_addresses (person_id, address) VALUES (:pId, :address)');
                    $this->bind(':pId', $pId);
                    $this->bind(':address', $address);
                    $this->execute();
                }
            }

			//Insert Groups in Database Table
            if(!empty($groups)){
                foreach($groups as $gId){
                    $this->query('INSERT INTO group_members (person_id, group_id) VALUES (:pId, :gId)');
                    $this->bind(':pId', $pId);
                    $this->bind(':gId', $gId);
                    $this->execute();
                }
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

	public function view($getId){
		if($getId != ''){

			$personDetails = array();

			$this->query('SELECT first_name firstName, last_name lastName FROM person_details WHERE id= :id');
			$this->bind(':id', $getId);
			$res1 = $this->single();

			if(!empty($res1)){
				foreach($res1 as $label => $value){
					$personDetails[$label] = $value;
				}
			}

			$this->query('SELECT email FROM email_addresses WHERE person_id= :id');
			$this->bind(':id', $getId);
			$res2 = $this->resultSet();
			if(!empty($res2)){
				$emails = array();
				foreach($res2 as $value){
					array_push($emails, $value['email']);
				}
				$personDetails['emails'] = $emails;
			}
			

			$this->query('SELECT number FROM contact_numbers WHERE person_id= :id');
			$this->bind(':id', $getId);
			$res3 = $this->resultSet();
			if(!empty($res3)){
				$numbers = array();
				foreach($res3 as $value){
					array_push($numbers, $value['number']);
				}
				$personDetails['numbers'] = $numbers;
			}
			

			$this->query('SELECT address FROM street_addresses WHERE person_id= :id');
			$this->bind(':id', $getId);
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
			$this->bind(':id', $getId);
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
	public function delete($confirmSubmit, $getId){
		if($confirmSubmit){

			$this->query('DELETE FROM person_details WHERE id = :id');
			$this->bind(':id',$getId);
			$this->execute();
			if($this->error){
				return;
			}
			header('Location: '.ROOT_URL.'persons');
		}
		return;
	}
}