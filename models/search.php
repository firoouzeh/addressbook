<?php
class SearchModel extends Model{
	public function index($searchTerm){
		//prettyPrint($post);
		if($searchTerm !=''){
			$this->query('(SELECT id, first_name, last_name, "person" as type FROM person_details WHERE first_name LIKE "' . 
							$searchTerm . '%" OR last_name LIKE "' . $searchTerm .'%") UNION
							(SELECT id, person_id, email, "email" as type FROM email_addresses WHERE email LIKE "' .
							$searchTerm . '%" OR person_id LIKE "' . $searchTerm .'%") ');
			$res = $this->resultSet();
			if($res >= 0){
				return $res;
			}else {
				return 0;
			}
		}
		return;
	}
	public function searchByEmail($email){
		if($email != ''){
			$this->query('SELECT person_id, email FROM email_addresses WHERE email LIKE "' .$email. '%"');
			$res = $this->resultSet();
			//prettyPrint($res);
			$personIdArr = array();

			if(count($res)){

				foreach($res AS $label => $value){
					if(!in_array($value['person_id'], $personIdArr)){
						$personIdArr[] = $value['person_id'];
					}
				}
			}

			$pIdList = implode(',' , $personIdArr);

			if(count($personIdArr)){
				$this->query('SELECT person_id, email FROM email_addresses WHERE person_id IN('.$pIdList.')');
				$res = $this->resultSet();
				return $res;
			}

			return $res;
		} else {
			Messages::setMsg('Please Enter A Value', 'error');
		}
		return;
	}
	public function searchByName($firstName, $lastName){
		if($firstName != '' || $lastName != ''){
			if($lastName == ''){
				$this->query('SELECT id, first_name, last_name FROM person_details WHERE first_name LIKE "'.$firstName.'%"');
			} elseif($lastName == ''){
				$this->query('SELECT id, first_name, last_name FROM person_details WHERE last_name LIKE "'.$lastName.'%"');
			} else {
				$this->query('SELECT id, first_name, last_name FROM person_details WHERE first_name LIKE "'.$firstName.'%" AND last_name LIKE "'.$lastName.'%"');
			}
			$res = $this->resultSet();
			//prettyPrint($res);

			$idArr = array();

			if(count($res)){

				foreach($res AS $label => $value){
					if(!in_array($value['id'], $idArr)){
						$idArr[] = $value['id'];
					}
				}
			}

			$idList = implode(',' , $idArr);

			if(count($idArr)){
				$this->query('SELECT id, first_name, last_name FROM person_details WHERE id IN('.$idList.')');
				$res = $this->resultSet();
				return $res;
			}

			//prettyPrint($res);
		} else {
			Messages::setMsg('Please Enter A Value', 'error');
			return 0;
		}		
	}
	public function advance(){
		return;
	}
}