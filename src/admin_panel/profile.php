
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//Check whether the Submit Button is Clicked or not
if(isset($_POST['update'])){
    $abt = $_POST['about'];
    $fb = $_POST['fb'];
    $tw = $_POST['tw'];
    $yt = $_POST['yt'];
    $ig = $_POST['ig'];
    $current_image = $_POST['current_image'];
    
//2. Upload the image if selected
if(isset($_FILES['image']['name'])){
  $image_name = $_FILES['image']['name']; //New Image NAme
  if($image_name!=""){
      $ext = end(explode('.', $image_name)); //Gets the extension of the image
      $image_name = "marthapp-".rand(0000, 9999).'.'.$ext; //THis will be renamed image
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

    //Create a SQL Query to Update Admin
    $sql = "UPDATE tbl_about SET aboutus = '$abt',pp= '$image_name',fb='$fb',tw='$tw',yt='$yt',ig='$ig'";

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
        header('location:index');
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
        header('location:index');
        exit();
    }
}

// header
include 'partials/header-add.php';

?>

<?php
$results = $db->query("SELECT * FROM tbl_about");
if($row = $results->fetch_assoc()) {
$id = $row['id'];
$abt=$row['aboutus'];
$fb = $row['fb'];
$tw=$row['tw'];
$yt=$row['yt'];
$ig=$row['ig'];
$current_image=$row['pp'];
}
    ?>


<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="lg:w-1/2 w-full space-y-4 font-semibold" method="post" enctype="multipart/form-data">
<div class="text-center mb-6">
<p class="text-3xl underline">Admin Profile</p>
</div>
<!-- back button -->
<a href="index" class="w-auto  p-1 my-6 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a> 


    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">About </label>
        <textarea class="w-full px-3 text-sm border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none h-[200px]"  name="about" required/><?php echo $abt; ?></textarea>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Profile Picture </label>
        <div class="flex items-center">
     <img src="../images/<?php echo $current_image; ?>" alt="prof_image" class="w-[100px] h-[100px] rounded-md" id="imgDisplay">
     <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-teal-500 file:text-white" type="file" name="image" onChange="displayImage(this)"/>
     </div>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Facebook link </label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none" type="url" name="fb" value="<?php echo $fb; ?>" required/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Twitter link </label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none" type="url" name="tw" value="<?php echo $tw; ?>" required/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Youtube link </label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none" type="url" name="yt" value="<?php echo $yt; ?>" required/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Instagram link </label>
        <input class="w-full h-10 px-3  border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none" type="url" name="ig" value="<?php echo $yt; ?>" required/>
      </div>
     
    <input class="w-1/2 h-10 px-3 mb-2 font-semibold bg-teal-500 cursor-pointer text-white rounded-lg focus:outline-none" type="submit" name="update" value="Save"/>
   
  </form>
</div>

<!-- footer -->
<?php include 'partials/footer.php'; ?>