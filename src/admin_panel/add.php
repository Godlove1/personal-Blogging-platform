<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//CHeck whether the button is clicked or not
if(isset($_POST['publish'])){
  //1. Get the DAta from Form
  $name = $_POST['title'];
   $category = $_POST['type'];
   $desc = $_POST['editor1'];
  
   
  //2. Upload the Image if selected
  //Check whether the select image is clicked or not and upload the image only if the image is selected
  if(isset($_FILES['image']['name'])) {
      //Get the details of the selected image
      $image_name = $_FILES['image']['name'];
      //Check Whether the Image is Selected or not and upload image only if selected
      if($image_name!=""){
          // Image is SElected
          //A. REnamge the Image
          //Get the extension of selected image (jpg, png, gif, etc.)
          $ext = end(explode('.', $image_name));

          // Create New Name for Image
          $image_name = "massiblog-".rand(0000,9999).".".$ext; //New Image Name May Be "NST-prod-45.jpg"

          //B. Upload the Image
          //Get the Src Path and DEstinaton path
          // Source path is the current location of the image
          $src = $_FILES['image']['tmp_name'];

          //Destination Path for the image to be uploaded
          $dst = "../images/".$image_name;

          //Finally Uppload the food image
          $upload = move_uploaded_file($src, $dst);

          //check whether image uploaded of not
          if($upload==false){
              //Failed to Upload the image
              //REdirect to Add Food Page with Error Message
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
              die();
          }}}else{ 
    $image_name = ""; //SEtting DEfault Value as blank
}

  //3. Insert Into Database
  //Create a SQL Query to Save or Add food
  // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
  $sql2 = "INSERT INTO tbl_blog_posts SET
      cat_id = '$category',
      title = '$name',
      post_content = '$desc',
      cover_image = '$image_name'
  ";

  //Execute the Query
  $res2 = mysqli_query($conn, $sql2);

  //CHeck whether data inserted or not
  //4. Redirect with MEssage to Manage Food page
  if($res2 == true){
      //Data inserted Successfullly
      $_SESSION['login'] = ' 
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Article Successfully Published.</p>
        </div>
      </div>
      </div>
      ';
      header('location:index');
      exit();
    
  }else{
      //FAiled to Insert Data
      $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error publishing article try again</p>
          </div>
        </div>
      </div>
         ';
      header('location:index');
      exit();
  }}



// header
include 'partials/header-add.php';

?>



<!-- add new form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="lg:w-1/2 w-full space-y-4 font-semibold" method="post" enctype="multipart/form-data">
    <!-- back btn -->
    <a href="index" class="w-auto p-1 mb-2 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>

    <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Title</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="enter article title" name="title" required/>
      </div>
      <!-- <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Author</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="price of product" name="author" required/>
      </div> -->
   
    <div class="font-semibold">
        <label class="block mb-1" >Select Category </label>
        <select name="type" class="h-10 px-3 mb-2 text-base  font-semibold border border-slate-400 rounded-lg focus:outline-none" required>
        <?php
//Create PHP Code to display categories from Database
//1. CReate SQL to get all active categories from database
$sql = "SELECT * FROM tbl_categories";
//Executing qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have categories or not
$count = mysqli_num_rows($res);
//IF count is greater than zero, we have categories else we donot have categories
if($count>0){//WE have categories
while($row=mysqli_fetch_assoc($res)){
//get the details of categories
$id = $row['id'];
$title = $row['name'];?>
<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
<?php } }else{//WE do not have category?>
<option value="0">No Category Found</option>
<?php
} ?>
              </select>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 " for="forms-labelOverInputCode">Cover Image </label>
     <div class="flex items-center">
     <img src="../images/logos/l5.png" alt="prdo_image" class="w-[100px] h-[100px] rounded-md" id="imgDisplay">
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-teal-500 file:text-white" type="file" name="image" onChange="displayImage(this)"/>
     </div>
      </div>


    <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Post Content</label>
        <!-- <textarea class="w-full h-16 px-3 py-2 text-base font-semibold placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none " name="post_content"></textarea> -->
        <textarea id="editor1" name="editor1"></textarea>
      </div>

    <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="publish" value="Publish"/>
   
  </form>
</div>

<!-- ckeditor init -->
<script>
CKEDITOR.replace( 'editor1' );
</script>


<!-- footer -->
<?php include 'partials/footer.php'; ?>