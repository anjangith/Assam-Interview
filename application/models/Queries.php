<?php
  class Queries extends CI_Model {

    public function getRoles(){
      $roles = $this->db->get('roles');
      if($roles->num_rows()>0){
        return $roles->result();
      }
    }

    public function getCategories(){
      $roles = $this->db->get('category');
      if($roles->num_rows()>0){
        return $roles->result();
      }
    }

    public function getSections($id){
      $sections = $this->db->where(['c_id'=>$id])->get('sections');
      if($sections->num_rows()>0){
        return $sections->result();
      }
    }

    public function registerAdmin($data){
      return $this->db->insert('users',$data);
    }

    public function checkAdminExist(){
      $chkAdmin=$this->db->where(['role_id'=>'1'])->get('users');
      if($chkAdmin->num_rows()>0){
        return $chkAdmin->num_rows();
      }
    }

    public function adminExist($email, $password){
      $chkAdmin = $this->db->where(['email'=>$email,'password'=>$password])->get('users');
      if($chkAdmin->num_rows()>0){
        return $chkAdmin->row();
      }
    }

    public function makeCollege($data){
      return $this->db->insert('tbl_college',$data);
    }

    public function postWork($data){
      return $this->db->insert('posts',$data);
    }

    public function getColleges(){
      $colleges = $this->db->get('tbl_college');
      if($colleges->num_rows()>0){
        return $colleges->result();
      }

  }


  public function registerCoAdmin($data){
    return $this->db->insert('tbl_users',$data);
  }

  public function insertStudent($data){
    return $this->db->insert('tbl_student',$data);
  }

  public function getStudents($college_id){
    $this->db->select(['tbl_college.collegename','tbl_student.id','tbl_student.studentname','tbl_student.email','tbl_student.gender','tbl_student.course']);
    $this->db->from('tbl_student');
    $this->db->join('tbl_college','tbl_college.college_id=tbl_student.college_id');
    $this->db->where(['tbl_student.college_id'=> $college_id]);
    $student = $this->db->get();
    return $student->result();
  }

  public function getStudentRecord($id){
    $this->db->select(['tbl_college.college_id','tbl_college.collegename','tbl_student.id','tbl_student.email','tbl_student.gender','tbl_student.studentname',
    'tbl_student.course']);
    $this->db->from('tbl_student');
    $this->db->join('tbl_college','tbl_college.college_id=tbl_student.college_id');
    $student= $this->db->get();
    return $student->row();
  }

  public function updateStudent($data, $id){
    return $this->db->where('id',$id)->update('tbl_student',$data);
  }

  public function removeStudent($id){
    return $this->db->delete('tbl_student',['id'=>$id]);
  }

  public function getCName($id){
    $category = $this->db->where(['c_id'=>$id])->get('category');
    if($category->num_rows()>0){
      return $category->row();
    }
  }

  public function getQuestions()
    	{
        $category =  $this->uri->segment(3);
        $section =  $this->uri->segment(4);
        $this->db->where(['c_id'=>$category,'s_id'=>$section]);
    		$this->db->select("q_no, question, option1, option2, option3, option4, answer");
    		$this->db->from("quiz");
    		$query = $this->db->get();
    		return $query->result();
    		$num_data_returned = $query->num_rows;

    		if ($num_data_returned < 1) {
    		  echo "There is no data in the database";
    		  exit();
    		}
    	}
}
 ?>
