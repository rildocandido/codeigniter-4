<script>
	// função para auxiliar na hora do delete. 
	 function excluir(){
	 	if (!confirm("Deseja excluir ? ")) {
	 		return false;
	 	}
	 	return true;
	 }
</script>

<h2>Notícias</h2>
<div class="row my-3">
	<a href="/news/create" class="btn btn-primary"> Nova Notícia</a>
</div>

<table class="table">
	<tr>
		<th>Título</th>
		<th>URL</th>
		<th>Ação</th>
	</tr>
	<?php  if (!empty($news) && is_array($news)) : ?>
         <?php foreach ($news as $news_item) :  ?>
				<tr>
					<td><a href="<?php echo "/news/view/" . $news_item['id'] ?>"><?php echo $news_item['titlenews'] ?></a></td>
					<td><?php echo $news_item['slugnews'] ?></td>
					<td>
						<a href="/news/edit/<?php echo $news_item['id'] ?>"> Editar </a> 
						-
					    <a href="/news/delete/<?php echo $news_item['id'] ?>" onclick="return excluir()"> Deletar </a> 
					</td>
				</tr>
          <?php endforeach;?>	
          <?php  else : ?>
		     <tr>
		     	<td colspan="3"> Nenhuma notícia encontrada</td>
		     </tr>
    <?php endif ?>
</table>