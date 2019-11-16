<?php include_once ('db.php'); ?>

<?php  include('include/header.php'); 



if($_GET){
   
  $id = $_GET['id'];

  $sql = 'SELECT * FROM  task wHERE  id=? ' ;
  $sends = $pdo->prepare($sql);
  $sends->execute([$id]);
  $resultados = $sends->fetch();


 
} 





?>


   <div class="container">
      <div class="row">

         <!-- formulario  -->
         <div class="col-md-4">
           <br>

           <?php  if(isset($_SESSION['message'])):  ?>
                  
           <div class="alert alert-<?php echo  $_SESSION['color'];  ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
              <!-- cierra la session -->
           <?php  session_unset(); ?>
           <?php    endif ?>



          <div class="card mt-4">
            <div class="card-header">
               <h6>Formulario</h6>
            </div>
            <div class="card-body">
            <?php if(!$_GET): ?>
              <form action="save.php" method="POST">
                 <div class="form-group">
                   <input type="text" name="title" class="form-control" placeholder="titulo" autfocus>
                 </div>

                 <div class="form-group">
                   <textarea name="description" rows="5" class="form-control" placeholder="descripcion"></textarea>
                 </div>
                   
                   <div class="form-group">
                     <input type="submit" class="btn btn-primary btn-block" value="guardar" name="save">
                   </div>
              </form>
              <?php endif ?>

              <?php if($_GET): ?>
              <form action="edit.php" method="get">
                 <div class="form-group">
                   <input type="text" name="title" class="form-control" value="<?php  echo $resultados['title']; ?> ">
                 </div>

                 <div class="form-group">
                   <textarea name="description" rows="5" class="form-control" value="" ><?php  echo $resultados['description']; ?></textarea>
                 </div>

                 <input type="hidden" name="id" value="<?php  echo $resultados['id'];?>">
                   
                   <div class="form-group">
                   <input type="submit" class="btn btn-warning btn-block" value="editar">
                   </div>
                  


              </form>
              <?php endif ?>

            </div>
          </div>
         </div>


           <!-- tabla  -->
         <div class="col-md-8 mt-5">
         <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">date_created</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>

             <?php 
                 $query = "SELECT * FROM task " ;  

                  $resultado =  $pdo->prepare($query);
                  $resultado->execute();
                  $save = $resultado->fetchAll();
                foreach($save as $row): ?>
                
                <tr>
                    <td><?php echo $row['id']  ?></td>
                    <td><?php echo $row['title']  ?></td>
                    <td><?php echo $row['description']  ?></td>
                    <td><?php echo $row['created_at']  ?></td>
                    <td>
                    <a href="index.php?id=<?php  echo $row['id']; ?>" class=" btn btn-secondary btn-sm mx-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      
                      <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash " aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
         </div>


      </div>
    </div>



<?php  include('include/footer.php'); ?>