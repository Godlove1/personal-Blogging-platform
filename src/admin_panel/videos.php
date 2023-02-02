
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//Check whether the Submit Button is Clicked or not
if(isset($_POST['add_vid'])){

    $name = $_POST['title'];
    $yt = $_POST['yt'];

//2. Upload the image if selected
if(isset($_FILES['image']['name'])) {
    //Get the details of the selected image
    $image_name = $_FILES['image']['name'];
    //Check Whether the Image is Selected or not and upload image only if selected
    if($image_name!=""){
        $ext = end(explode('.', $image_name));
        // Create New Name for Image
        $image_name = "vid-thumb-".rand(0000,9999).".".$ext; //New Image 
        //B. Upload the Image
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
$sql2 = "INSERT INTO tbl_vlogs SET
    name_of_vid = '$name',
    vid_link = '$yt',
    thumbnail = '$image_name'
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
        <p class="text-sm">video Successfully Published.</p>
      </div>
    </div>
    </div>
    ';
    header('location:videos');
    exit();
  
}else{
    //FAiled to Insert Data
    $_SESSION['login'] ='
       <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
          <p class="font-bold">Something went Wrong</p>
          <p class="text-sm">Error uploading video try again</p>
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

<!-- successfull login -->
<div class="w-full justify-center items-center flex">
            <div class="w-1/2">
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            </div>
         </div>
<!-- successfull login -->

<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class=" w-2/3 space-y-4 font-semibold" method="post" enctype="multipart/form-data">
<div class="text-center mb-6">
<p class="text-3xl header_h1">Add Videos</p>
</div>
<!-- back button -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<p id="go-back" class="w-[100px] cursor-pointer p-1 my-6 font-semibold bg-[#2271B1] text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</p> 
</div>

<div class="w-full  lg:flex justify-around items-center ">
   
      <div class="font-semibold lg:ml-4">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Video Thumbnail</label>
        <div class="flex items-center">
     <img src="../images/logos/l5.png" alt="prof_image" class="w-[200px] h-[200px] rounded-md object-contain" id="imgDisplay">
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-[#2271B1] file:text-white" type="file" name="image" onChange="displayImage(this)" required/>
     </div>
      </div>
      </div>

    

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Video Title</label>
        <input class="w-2/3 h-10 px-3  border-slate-400 placeholder-gray-300 border-b-2 rounded-lg focus:outline-none focus:border-[#2271B1]" type="text" name="title" placeholder="title" required/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Youtube Video link </label>
        <input class="w-2/3 h-10 px-3  border-slate-400 placeholder-gray-300 border-b-2 rounded-lg focus:outline-none focus:border-[#2271B1]" type="url" name="yt" placeholder="link" required/>
      </div>

       <?php
       $sql = "SELECT * FROM tbl_vlogs ";
       //Execute the qUery
       $res = mysqli_query($conn, $sql);
       //Count Rows to check whether we have items or not
       $count = mysqli_num_rows($res);
       //Create Serial Number VAriable and Set Default VAlue as 1
       if($count >= 6){
?>
 <div class="w-full flex justify-center flex-col items-center my-8">
   <input class="w-1/2 lg:w-[300px] h-10 px-3 mt-8 font-semibold bg-slate-500 cursor-not-allowed text-white text-center"  value="ADD VIDEO" disabled/>
  <p class="text-xs italic"><em> (only 6 videos can be added for now!)</em></p>
   </div>
<?php
       }else{
        ?>
 <div class="w-full flex justify-center flex-col items-center my-8">
   <input class="w-1/2 lg:w-[300px] h-10 px-3 mt-8 font-semibold bg-[#2271B1] cursor-pointer text-white rounded-lg focus:outline-none" type="submit" name="add_vid" value="ADD VIDEO"/>
  <p class="text-xs italic"><em> (only 6 videos can be added for now.chose the best!)</em></p>
   </div>
<?php
       }
        ?>

  
   
  </form>
</div>

<!-- available video or all videos -->
<div class="tit p-8 mt-8">
    <h3 class="uppercase text-2xl underline header_h1">all videos</h3>
</div>
<div class="all_vids w-full flex justify-center items-center  lg:p-8 ">
    <div class="lg:w-[70%]">
    <?php
$sql = "SELECT * FROM tbl_vlogs  order by id DESC";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
$id = $row['id'];
$nameofvid=$row['name_of_vid'];
// $ytlink=$row['vid_link'];
$thumbnail=$row['thumbnail'];

    ?>
<!-- template -->
<div class="vid_temp w-full flex flex-col lg:flex-row  items-center shadow-md border pb-2 my-4">
    <div class="img w-[200px] h-[200px]">
    <img src="../images/<?php echo $thumbnail; ?>" alt="prof_image" class="w-full h-full  object-cover">
    </div>
    <div class="detial p-4 w-full">
        <p class="header_h1 text-xl">
        <?php echo $nameofvid; ?>
        </p>
        <div class=" flex justify-center  items-center mt-4">
  <a href="edit_video?id=<?php echo $id; ?>" class=" text-[#2271B1]  ml-2 ">Edit</a>
    <a href="delete?vid=<?php echo $id; ?>&thumb=<?php echo $thumbnail; ?>" onclick="confirm('Are you sure to Delete this Video?')" class=" text-red-500  ml-4 ">Delete</a>
</div>
    </div>

</div>
<!-- template -->

<?php
}   }else{
 echo '
 <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
                <p>No vlogs added yet!.</p>
              </div>
 ';
} 
?>

</div>
</div>

<!-- footer -->
<?php include 'partials/footer.php'; ?>