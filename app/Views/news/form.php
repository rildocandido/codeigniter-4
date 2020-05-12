<h2><?php echo isset($id) ? "Editando a notícia" : "Nova Notícia" ?></h2>
   <?php echo \Config\Services::validation()->listErrors(); ?>

   <form action="/news/store" method="post">
   	   
   	   <div class="form-group"> 
   	   		<label for="titlenews">Título</label>
   	   		<input type="text" class="form-control" name="titlenews" id="titlenews" value="<?php echo isset($titlenews) ? $titlenews : set_value('titlenews') ?>"> 
   	   </div>
   	    <div class="form-group"> 
   	   		<label for="slugnews">URL</label>
   	   		<input type="text" class="form-control" name="slugnews" id="slugnews" value="<?php echo isset($slugnews) ? $slugnews : set_value('slugnews') ?>"> 
   	   </div>
   	   <div class="form-group"> 
   	   		<label for="bodynews">Notícia</label>
   	   	    <textarea name="bodynews" id="bodynews" class="form-control" cols="30" rows="10"><?php echo isset($bodynews) ? $bodynews : set_value('bodynews') ?></textarea>
   	   </div>
   	   
   	   <input type="hidden" name="id" value="<?php echo isset($id) ? $id : set_value('id') ?>">
   
   		<div class="form-group">
   			<input type="submit" value="Salvar" class="btn btn-primary">
   		</div>

   </form>