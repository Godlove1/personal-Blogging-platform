
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

// query selected Article for editing
if(isset($_GET['id'])){
  //Get all the details
  $id = $_GET['id'];
  //SQL Query to Get the Selected Food
  $sql2 = "SELECT * FROM tbl_blog_posts WHERE id=$id";
  //execute the Query
  $res2 = mysqli_query($conn, $sql2);
  //Get the value based on query executed
  $row = mysqli_fetch_assoc($res2);
  //Get the Individual Values of Selected Food
    $id = $row['id'];
    $name = $row['title'];
    $c_image  = '../images/'.$row['cover_image'];
    $current_image  = $row['cover_image'];
    $categ = $row['cat_id'];
  $pdesc = $row['post_content'];
 
}
 
// save edited artcile
//save to db
if(isset($_POST['save_item'])){
  $name = $_POST['title'];
   $category = $_POST['type'];
   $desc = $_POST['editor1'];
   $current_image = $_POST['current_image'];
  $id=$_POST['idh'];

  //2. Upload the image if selected
  if(isset($_FILES['image']['name'])){
      $image_name = $_FILES['image']['name']; //New Image NAme
      if($image_name!=""){
          $ext = end(explode('.', $image_name)); //Gets the extension of the image
          $image_name = "editedmartha-".rand(0000, 9999).'.'.$ext; //THis will be renamed image
          //Get the Source Path and DEstination PAth
          $src_path = $_FILES['image']['tmp_name']; //Source Path
          $dest_path = "../images/".$image_name; //DEstination Path
          //Upload the image
          $upload = move_uploaded_file($src_path, $dest_path);
          /// CHeck whether the image is uploaded or not
          if($upload==false){
              //FAiled to Upload
              $_SESSION['login'] ='
              <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
             <div class="flex">
               <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
               <div>
                 <p class="font-bold">Something went Wrong</p>
                 <p class="text-sm">Error uploading picture</p>
               </div>
             </div>
           </div>
              ';
           header('location:index');
           exit();
              //STop the process
          }
          //3. Remove the image if new image is uploaded and current image exists
          //B. Remove current Image if Available
          if($current_image!=""){
              $remove_path = "../images/".$current_image;
              $remove = unlink($remove_path);
              //Check whether the image is removed or not
              if($remove==false){
                  //failed to remove current image
                  $_SESSION['login'] ='
                  <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                 <div class="flex">
                   <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                   <div>
                     <p class="font-bold">Something went Wrong</p>
                     <p class="text-sm">Error Removing current picture</p>
                   </div>
                 </div>
               </div>
                  ';
               header('location:index');
               exit();
                  //STop the process
              }
          }
      }else{
          $image_name = $current_image; //Default Image when Image is Not Selected
      }
  }else{
      $image_name = $current_image; //Default Image when Button is not Clicked
  }
  //4. Update the Food in Database
  $sql3 = "UPDATE tbl_blog_posts SET
       title = '$name',
      cat_id = '$category',
      post_content= '$desc',
      cover_image = '$image_name'

      WHERE id=$id
  ";

  //Execute the SQL Query
  $res3 = mysqli_query($conn, $sql3);

  //CHeck whether the query is executed or not
  if($res3==true){
      //Query Exectued and Food Updated
      $_SESSION['login'] = ' 
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Article Successfully Updated.</p>
        </div>
      </div>
      </div>
      ';
      header('location:index');
      exit();
  }
  else{
      //Failed to Update Food
      $_SESSION['login'] ='
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
     <div class="flex">
       <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
       <div>
         <p class="font-bold">Something went Wrong</p>
         <p class="text-sm">Error Editing Article</p>
       </div>
     </div>
   </div>
      ';
   header('location:index');
   exit();
  }
}



// header
include 'partials/header-add.php';


?>

<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class=" w-full space-y-4 font-semibold" method="post" enctype="multipart/form-data">
<div class="text-center">
<p class="text-3xl underline">Edit</p>

</div>
<!-- back button -->
<a href="index" class="w-auto  p-1 mb-2 font-semibold bg-teal-500 text-white rounded-lg focus:shadow-outline"><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>

    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Title</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:shadow-outline" type="text" value="<?php echo $name; ?>" name="title"/>
      </div>
     
      <div class="cat w-full lg:flex justify-around items-center">
    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" >Select Category </label>
        <select name="type" class=" h-10 px-3 mb-2 text-base  font-semibold border border-slate-400 rounded-lg focus:shadow-outline">
        <?php
//Query to Get ACtive Categories
$sql = "SELECT * FROM tbl_categories";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Count Rows
$count = mysqli_num_rows($res);
//Check whether category available or not
if($count>0){
//CAtegory Available
while($row=mysqli_fetch_assoc($res)){
$category_title = $row['name'];
$category_id = $row['id'];
?>
<option <?php if($categ==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
<?php } } else {//CAtegory Not Available
echo "<option value='0'>Category Not Available.</option>";
                            }
                        ?>
              </select>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Current cover Image </label>
       <img src="<?php echo $c_image; ?>" alt="prdo_image" class="w-[100px] h-[100px] rounded-md" id="imgDisplay">
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Change cover Image </label>
        <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-teal-500 file:text-white" type="file" name="image" onChange="displayImage(this)"/>
      </div>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Post content</label>
        <!-- <textarea class="w-full h-16 px-3 py-2 text-base font-semibold placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none " name="desc"></textarea> -->
        <textarea id="editor1" name="editor1"><?php echo $pdesc; ?></textarea>
      </div>


      <input type="hidden" name="idh" value="<?php echo $id; ?>">
<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
    <input class="w-1/2 lg:w-[200px] cursor-pointer h-10 px-3 mb-2 font-semibold bg-teal-500 text-white rounded-lg focus:shadow-outline" type="submit" name="save_item" value="Update Article" />
   
  </form>
</div>



<!-- ckeditor init -->
<script>
CKEDITOR.replace( 'editor1' );
</script>


<!-- footer -->
<?php include 'partials/footer.php'; ?>