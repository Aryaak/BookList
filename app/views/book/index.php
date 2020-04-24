<div class="container mt-5 ml-3" >

     <div class="row" >
       
          <div class="col-lg-6" >
            
               <?php Flasher::flash() ?>

          </div>

     </div>
	
     <div class="row" >
     	
          <div class="col-6" >
          	   
              <h3 class="mb-4" > Books List </h3>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary mb-4 insertModal" data-toggle="modal" data-target="#formModal">
              Insert new book
              </button>

              <!-- Search box -->

              <form action="<?= BASEURL ?>Book/search/" method="post" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Book" aria-label="Search" name="keyword">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search" ></i></button>
              </form>

              <!-- Pagination -->

              <?php if ( $page <= $pages ) : ?>

              <nav aria-label="..." class="mt-3">
                  <ul class="pagination">
                    <?php if ( $page == 1 ) : ?>
                      <li class="page-item disabled">
                      <a class="page-link" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <?php else : ?>
                      <li>
                      <a class="page-link" href="<?= BASEURL ?>Book/<?= $page - 1 ?>">Previous</a>
                      </li>
                    <?php endif; ?>
                    <?php for ( $pageNumber=1; $pageNumber<=$pages; $pageNumber++ ) : ?>
                          <?php if ( $pageNumber == $page ) : ?>
                            <li class="page-item active" aria-current="page">
                              <a class="page-link" href="<?= BASEURL ?>Book/<?= $pageNumber ?>"> <?= $pageNumber; ?> <span class="sr-only">(current)</span></a>
                            </li>
                          <?php else : ?>
                            <li class="page-item"><a class="page-link"href="<?= BASEURL ?>Book/<?= $pageNumber ?>"><?= $pageNumber ?></a></li>
                          <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ( $page == $pages ) : ?>
                      <li class="page-item disabled">
                      <a class="page-link" tabindex="-1" aria-disabled="true">Next</a>
                    </li>
                    <?php else : ?>
                      <li>
                      <a class="page-link" href="<?= BASEURL ?>Book/<?= $page + 1 ?>">Next</a>
                      </li>
                    <?php endif; ?>
                  </ul>
              </nav>

              <?php else : ?>

                <?php header("Location: $pages") ?>

              <?php endif; ?>

               <ul class="list-group mt-3 mb-5">

                  <?php foreach ( $data["books"] as $book ) : ?>

                    <li class="list-group-item">
                       <?= $book["title"] ?>
                       <!-- Delete -->
                       <a href="<?= BASEURL ?>Book/delete/<?= $book["id"] ?>"><button class="btn btn-outline-danger float-right" onclick="return confirm('Book will be deleted ?')" ><i class="fas fa-trash"></i></button></a> 

                       <!-- Detail -->
                       <a href="<?= BASEURL ?>Book/detail/<?= $book["id"] ?>"><button class="btn btn-outline-primary float-right  mr-3" ><i class="fas fa-eye"></i></button></a> 

                       <!-- Update -->
                       <a href="<?= BASEURL ?>Book/change/<?= $book["id"] ?>"  data-toggle="modal" data-target="#formModal" data-id="<?= $book["id"] ?>" class="changeModal"><button class="btn btn-outline-success float-right  mr-3" ><i class="fas fa-edit"></i></button></a>  
                    </li>


                  <?php endforeach; ?>

               </ul>

          </div>

     </div>

</div>

<!-- Modal -->

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">New book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form action="<?= BASEURL ?>book/insert" method="post" enctype="multipart/form-data" >
              
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required="">
              </div>


              <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required="">
              </div>


              <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" required="">
              </div>


              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" required="">
              </div>

              <div class="form-group">
                <label for="image">Image</label> <br>
                <input type="file" id="image" name="image">
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Insert book</button>
      </div>
          
          </form>    
     
    </div>
  </div>
</div>
