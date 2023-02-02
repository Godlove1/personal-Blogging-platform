
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

//Check whether the Submit Button is Clicked or not
if(isset($_POST['save_vid'])){
    
    $name = $_POST['title'];
    $yt = $_POST['yt'];
    $current_image = $_POST['current_image'];
    $id=$_POST['idh'];
    
//2. Upload the image if selected
if(isset($_FILES['image']['name'])){
  $image_name = $_FILES['image']['name']; //New Image NAme
  if($image_name!=""){
      $ext = end(explode('.', $image_name)); //Gets the extension of the image
      $image_name = "vid-thumb-new-".rand(0000, 9999).'.'.$ext; //THis will be renamed image
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
             <p class="text-sm">Error uploading thumnbnail</p>
           </div>
         </div>
       </div>
          ';
       header('location:videos');
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
                 <p class="text-sm">Error Removing current thumbnail</p>
               </div>
             </div>
           </div>
              ';
           header('location:videos');
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

    //Create a SQL Query to Update Admin
    $sql = "UPDATE tbl_vlogs SET name_of_vid = '$name',thumbnail= '$image_name',vid_link='$yt'  WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true){
        //Query Executed and Admin Updated
        $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
  <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
  <div> 
    <p class="font-bold">SUCCESS!</p>
    <p class="text-sm">Profile Successfully Updated.</p>
  </div>
</div>
</div>
        ';


        //Redirect to Manage Admin Page
        header('location:videos');
        exit();
    }else{
        //Failed to Update Admin
        $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error Updating Profile please try again.</p>
          </div>
        </div>
      </div>
         ';
        //Redirect to Manage Admin Page
        header('location:videos');
        exit();
    }
}



// header
include 'partials/header-add.php';

?>


<?php 

// query selected Article for editing
if(isset($_GET['id'])){
  //Get all the details
  $id = $_GET['id'];
  //SQL Query to Get the Selected Food
  $sql2 = "SELECT * FROM tbl_vlogs WHERE id=$id";
  //execute the Query
  $res2 = mysqli_query($conn, $sql2);
  //Get the value based on query executed
  $row = mysqli_fetch_assoc($res2);
    $id = $row['id'];
    $nameofvid=$row['name_of_vid'];
    $ytlink=$row['vid_link'];  
    $current_image=$row['thumbnail'];
}
    ?>


<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="w-full lg:w-2/3 space-y-4 font-semibold" method="post" enctype="multipart/form-data">
<div class="text-center mb-6">
<p class="text-3xl header_h1">Update Video Info.</p>
</div>
<!-- back button -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<p id="go-back" class="w-[100px] cursor-pointer p-1 my-6 font-semibold bg-[#2271B1] text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</p> 
</div>

      <div class="font-semibold lg:ml-4 border-4">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Video Thumbnail</label>
        <div class="flex justify-center items-center flex-col">
     <img src="../images/<?php echo $current_image; ?>" alt="prof_image" class="w-[200px] h-[200px] rounded-md object-contain" id="imgDisplay">
     <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
     <input class=" h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm cursor-pointer file:font-semibold file:bg-[#2271B1] file:text-white" type="file" name="image" onChange="displayImage(this)"/>
     </div>
      </div>
    

    

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Video Title</label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-b-2 rounded-lg focus:outline-none focus:border-[#2271B1]" type="text" name="title" value="<?php echo $nameofvid; ?>" required/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Youtube Video link </label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-b-2 rounded-lg focus:outline-none focus:border-[#2271B1]" type="url" name="yt" value="<?php echo $ytlink; ?>" required/>
      </div>


      <input type="hidden" name="idh" value="<?php echo $id; ?>">
 <div class="w-full flex justify-center flex-col items-center my-8">
   <input class="w-1/2 lg:w-[300px] h-10 px-3 mt-8 font-semibold bg-[#2271B1] cursor-pointer text-white rounded-lg focus:outline-none" type="submit" name="save_vid" value="UPDATE VIDEO"/>

   </div>


  
  </form>
</div>


<!-- footer -->
<?php include 'partials/footer.php'; ?>