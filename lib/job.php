<?php
class Job {
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	//Get all Jobs
	public function getAllJobs(){
		$this->db->query("SELECT jobs.*, categories.name
		AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id ORDER BY post_date DESC
			");

		//Assign result set
		$results = $this->db->resultSet();
		return $results;
}
		//Get Categories

	public function getCategories(){
		$this->db->query("SELECT * FROM categories");

		$results = $this->db->resultSet();

		return $results;
		
		}

		//Get Jobs by Category
	public function getByCategory($category){
		$this->db->query("SELECT jobs.*, categories.name
		AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.category_id = $category ORDER BY post_date DESC
			");

		//Assign result set
		$results = $this->db->resultSet();
		return $results;
	}

	//Get category
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM categories WHERE id = :category_id");

		$this->db->bind(':category_id', $category_id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

		//Get Job
	public function getJob($id){
		$this->db->query("SELECT * FROM jobs WHERE id = :id");

		$this->db->bind(':id', $id);

		//Assign Row
		$row = $this->db->single();

		return $row;
	}

	public function getJobBySearch($q, $city=null){
		if($city){
			$this->db->query("SELECT jobs.*, categories.name
		AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.job_title LIKE '%$q%' AND jobs.location = '$city' ORDER BY post_date DESC
			");

			$results = $this->db->resultSet();
			return $results;
		}
		else{
			$this->db->query("SELECT jobs.*, categories.name
		AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id WHERE jobs.job_title LIKE '%$q%' ORDER BY post_date DESC
			");

			$results = $this->db->resultSet();
			return $results;
		}
		
	}

	public function create($data){
		$this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email)
		VALUES(:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)");
		//Bind Data
		$this->db->bind(':category_id', $data['category_id']);
		$this->db->bind(':job_title', $data['job_title']);
		$this->db->bind(':company', $data['company']);
		$this->db->bind(':description', $data['description']);
		$this->db->bind(':location', $data['location']);
		$this->db->bind(':salary', $data['salary']);
		$this->db->bind(':contact_user', $data['contact_user']);
		$this->db->bind(':contact_email', $data['contact_email']);
		//Execute
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	public function uploadFile($uid, $target_file){
		$target_dir = "uploads/";
        // Get file path
        
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("pdf", "doc");
        
        if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
           $resMessage = array(
               "status" => 0,
               "message" => "Select image to upload."
           );
           return $resMessage;

        } else if (!in_array($imageExt, $allowd_file_ext)) {
            $resMessage = array(
                "status" => 0,
                "message" => "Allowed file formats .pdf, .doc."
            );
            return $resMessage;            
        } else if ($_FILES["fileUpload"]["size"] > 2097152) {
            $resMessage = array(
                "status" => 0,
                "message" => "File is too large. File size should be less than 2 megabytes."
            );
            return $resMessage;

        } else if (file_exists($target_file)) {
            $resMessage = array(
                "status" => 0,
                "message" => "File already exists."
            );
            return $resMessage;

        } else {
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                $this->db->query("INSERT INTO files(uid, file_path)
								VALUES(:uid, :file_path)");

                $this->db->bind(':file_path', $target_file);
				$this->db->bind(':uid', $uid);
				
				if($this->db->execute()){
					$resMessage = array(
                        "status" => 1,
                        "message" => "Resume uploaded successfully."
                    );

                    return $resMessage;   
				}
				else{
					 $resMessage = array(
                    "status" => 0,
                    "message" => "Resume coudn't be uploaded."
                );
					 return $resMessage;
				}      
        }
	}
}


	public function applyJob($uid, $job_id, $resume_file, $highest_education, $apply_date){
		$highest_education = htmlspecialchars(strip_tags($highest_education));
		$this->db->query("INSERT INTO apply (uid, job_id, apply_date, highest_education)
		VALUES(:uid, :job_id, :apply_date, :highest_education);");

		$this->db->bind(':uid', $uid);
		$this->db->bind(':job_id', $job_id);
		$this->db->bind(':apply_date', $apply_date);
		$this->db->bind(':highest_education', $highest_education);

		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}
}
		

