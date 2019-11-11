<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends My_Controller {

  public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('user_id')){
      return redirect('homepage/login');
    }
  }

  public function quizdisplay()
	{
    $category =  $this->uri->segment(3);
    $section =  $this->uri->segment(4);
		$this->load->model('queries');
		$this->data['questions'] = $this->queries->getQuestions();
    $this->data['detail'] = array(
      'category' => $category,
      'section' => $section
    );
  //  print_r($this->data);
		$this->load->view('play_quiz', $this->data);
	}


  public function resultdisplay()
	{
    $category =  $this->uri->segment(3);
    $section =  $this->uri->segment(4);
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid1'),
		     'ques2' => $this->input->post('quizid2'),
			   'ques3' => $this->input->post('quizid3'),
			   'ques4' => $this->input->post('quizid4'),
		     'ques5' => $this->input->post('quizid5'),
			   'ques6' => $this->input->post('quizid6'),
			   'ques7' => $this->input->post('quizid7'),
			   'ques8' => $this->input->post('quizid8'),
		     'ques9' => $this->input->post('quizid9'),
			   'ques10' => $this->input->post('quizid10'),
		);
    $this->load->model('queries');
		$this->data['results'] = $this->queries->getQuestions();
    $this->data['detail'] = array(
      'category' => $category,
      'section' => $section
    );
  //  print_r($this->data);
		$this->load->view('result_display', $this->data);
	}
}
