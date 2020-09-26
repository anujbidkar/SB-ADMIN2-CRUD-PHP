<?php  include 'header.php';?>  

  

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Blog</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                        <label for="">Select Category <span class="text-danger"> *</span></label>
                                        <select required name="cat_id" id="" class="form-control">
                                        <?php 

                                    $read_category = "SELECT * FROM category";
                                    $result_read_category = mysqli_query($connection,$read_category);

                                    if($result_read_category)
                                    {  
                                        $i=1;
                                        while($row = mysqli_fetch_array($result_read_category))
                                        {  
                                        ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['cateogry_name']?></option>

                                        
                                        <?php
                                        }
                                    }
                                        ?>
                                        </select>
                        </div>

                        <div class="form-group">
                            <label for="">Blog Title  <span class="text-danger"> *</span></label>
                            <input placeholder="Enter Blog Title" type="text" class="form-control" name="blog_title" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Blog Date  <span class="text-danger"> *</span></label>
                            <input placeholder="Enter Blog Title" type="date" class="form-control" name="blog_date" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Blog Image  <span class="text-danger"> *</span></label>
                            <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Blog Description  <span class="text-danger"> *</span></label>
                            <textarea class="form-control"  name="blog_description" id="" cols="30" rows="5" >Enter Blog Description
                            </textarea>
                        </div>


                        <div class="form-group">
                            
                            <button type="submit" name="create_btn" class="btn btn-success">
                                Create Blog

                            </button>
                        </div>
                    </form>

                    <?php 

                    if(isset($_POST['create_btn']))
                    {
                        // echo "clicked";
                      //  echo "<script>console.log('clicked');</script>";
                        $blog_cat_id = $_POST['cat_id'];
                       $blog_title = $_POST['blog_title'];
                      $blog_date = $_POST['blog_date'];
                     //  $blog_image = $_POST['image'];
                       $blog_description = $_POST['blog_description'];
                       $user_id = $_SESSION["id"];
                     
                      
                       if(isset($_FILES['image']))
                       {
                        $errors= array();
                        $file_name = $_FILES['image']['name'];
                        $file_size =$_FILES['image']['size'];
                        $file_tmp =$_FILES['image']['tmp_name'];
                        $file_type=$_FILES['image']['type'];
                        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                        
                        $extensions= array("jpeg","jpg","png");
                        
                        if(in_array($file_ext,$extensions)=== false){
                           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                        }
                        
                        if($file_size > 2097152){
                           $errors[]='File size must be excately 2 MB';
                        }
                        
                        if(empty($errors)==true){
                           move_uploaded_file($file_tmp,"posts_images/".$file_name);
                           echo "Success";
                        }else{
                           print_r($errors);
                        }
                     }
                   
                    //    if(!empty($_FILES['blog_image']['name']))
                    //    {
                    //     $image_path = "./posts_images";
                    //     $config['upload_path'] = $image_path;
                    //     $config['allowed_types'] = '*';
                    //     $config['file_name'] = $_FILES['blog_image']['name'];
                        
                    //     //Load upload library and initialize configuration
                    //     // $this->load->library('upload',$config);
                    //     // $this->upload->initialize($config);
                        
                    //     if($this->upload->do_upload('blog_image')){
                    //         $uploadData = $this->upload->data();
                            
                    //         echo "yes";
                    //     }
                    //     else{
                          
                    //         echo "no 1";
                    //     }
                    // }else{
                    //     $picture1 = '';
                    //     echo "no 2";
                    // }
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                       $insert_blog = "INSERT INTO blog(user_id,cat_id,blog_title,blog_description,blog_date,blog_image) VALUES('$user_id','$blog_cat_id','$blog_title','$blog_description','$blog_date','$blog_image')";
                    $resukt_insert_blog = mysqli_query($connection,$insert_blog);
                    if($resukt_insert_blog)
                    {
                        echo "
                        <script>alert('Blog Inserted Successfully');</script>
                        ";
                    }
                    else
                    {
                        echo "Error :".mysqli_error($connection);
                    }
                }




                    ?>
                </div>
              </div>
            </div>

          
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
  <?php  include 'footer.php';?>  

  