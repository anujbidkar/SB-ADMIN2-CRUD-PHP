<?php  include 'header.php';?>  

  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard2</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

                <h1>
                    Create Category
                </h1>


                <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Cateogry Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sr No</th>
                            <th>Cateogry Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        
                        <?php 

                        $read_category = "SELECT * FROM category";
                        $result_read_category = mysqli_query($connection,$read_category);

                        if($result_read_category)
                        {  
                            $i=1;
                            while($row = mysqli_fetch_array($result_read_category))
                            {

                           
                            ?>

                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $row['cateogry_name']?></td>
                                <td>
                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                                </td>
                            </tr>

                            <?php
                            $i++;
                            } 
                        }
                        else
                        {
                            echo "Error :".mysqli_error($connection);
                        }


                        ?>
                    </tbody>
                    
                </table>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
  <?php  include 'footer.php';?>  

  