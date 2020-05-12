<?php 

 namespace App\Controllers;
 use CodeIgniter\Controller;
 use App\Models\NewsModel; 
 /**
  * 
  */
 class News extends Controller{
 	
 	public function index(){

 		$model = new NewsModel();

 		$data = [
 			'news' => $model->getNews()
 		];

 		echo view('templates/header');
 		echo view('news/overview', $data);
 		echo view('templates/footer');
 	}


 	public function view($id = null){
 		$model = new NewsModel();
 		$data['news'] = $model->getNews($id);

 		if (empty($data['news'])) {
 			throw new \CodeIgniter\Exceptions\PageNotFoundException('Item não encontardo : ' .$id); 
 		}
 		
 
 		echo view('templates/header');
 		echo view('news/view', $data);
 		echo view('templates/footer');

 	}

 	public function create(){
 		helper('form');

 		echo view('templates/header');
 		echo view('news/form');
 		echo view('templates/footer');

 	}

 	public function store(){

     helper('form');

     $model = new NewsModel();

     $rules = [
     	'titlenews' => 'required|min_length[3]|max_length[255]',
     	'slugnews' => 'required',
     	'bodynews' => 'required'
     ];

     if ($this->validate($rules)) {
     	 $model->save([
     	 	'id' => $this->request->getVar('id'),
     	 	'titlenews' => $this->request->getVar('titlenews'),
     	 	'slugnews' => url_title($this->request->getVar('slugnews')),
     	 	'bodynews' => $this->request->getVar('bodynews')

     	 ]);

     	 echo view('templates/header');
 		 echo view('news/success');
 		 echo view('templates/footer'); 

     } else {
 		 
 		 echo view('templates/header');
 		 echo view('news/form');
 		 echo view('templates/footer');
	  }

} 

	  public function edit($id = null){

	  	 $model = new NewsModel();

	  	 $data['news'] = $model->getNews($id);
	  	 if (empty($data['news'])) {
	  	 	throw new \CodeIgniter\Exceptions\PageNotFoundException('Não pude encontrar a notícia.', $id);
	  	 	
	  	 }

	  	 $data = [

	  	 	'id' => $data['news']['id'],
	  	 	'titlenews' => $data['news']['titlenews'],
	  	 	'slugnews' => $data['news']['slugnews'],
	  	 	'bodynews' => $data['news']['bodynews']

	  	 ]; 

	  	  echo view('templates/header');
 		  echo view('news/form', $data);
 		  echo view('templates/footer');  

	  }  

	  public function delete($id = null){

	  	$model = new NewsModel();
	  	$model->delete($id);

	  	  echo view('templates/header');
 		  echo view('news/delete_sucess');
 		  echo view('templates/footer');  



	  }

 }


