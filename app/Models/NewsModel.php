<?php  

    namespace App\Models;
    use CodeIgniter\Model;

 
    class NewsModel extends Model
    {
    	
    	protected $table = 'news';
    	protected $primaryKey = 'id';

        protected $allowedFields = ['titlenews','slugnews','bodynews']; 

      //  Serve para não deletar os dados do BD .

      // Serve para atualizar os campos  created_at, updated_at e deleted_at
        protected $useTimestamps = true ;

      // Deixar o useSoftDelete como True    
        protected $useSoftDeletes = true ;
     
      // Criar os campos no BD : created_at,updated_at e deleted_at do tipo DATETIME  
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deletedField = 'deleted_at';


    	public function getNews($id = null){

    		if ($id === null) {
                //$this->withDeleted(); // retorna os dados deletados da apliação , mais não deletados do BD .
    			return $this->findAll();
    		}

    		return $this->asArray()->where(['id' => $id])->first();

    	}

    }