<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

// query selected Article for editing
if(isset($_GET['id'])){
    //Get all the details
    $id = $_GET['id'];
    //SQL Query to Get the Selected Food
    $sql2 = "SELECT * FROM tbl_categories WHERE id=$id";
    //execute the Query
    $res2 = mysqli_query($conn, $sql2);
    //Get the value based on query executed
    $row = mysqli_fetch_assoc($res2);
    //Get the Individual Values of Selected Food
      $id = $row['id'];
    $cname = $row['name'];
}else{
    echo '<script>alert("category not available");</script>';
    header('location:index');
}



//updating category
if(isset($_POST['save_cati'])){
  //1. Get the DAta from Form
  $name = $_POST['name'];
  $id=$_POST['idh'];
 
  $sql2 = "UPDATE tbl_categories SET name = '$name' WHERE id=$id";

  //Execute the Query
  $res2 = mysqli_query($conn, $sql2);
  if($res2 == true){
      //Data inserted Successfullly
      $_SESSION['login'] = ' 
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-2 md:my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Category Successfully updated.</p>
        </div>
      </div>
      </div>
      ';
      header('location:categories');
      exit();
    
  }else{
      //FAiled to Insert Data
      $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error updating category, try again</p>
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

 <!-- back btn -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<p id="go-back" class="w-[100px] cursor-pointer p-1 my-6 font-semibold bg-[#2271B1] text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</p> 
</div>


<!-- testimonial side form -->
<div class="w-full lg:flex justify-center items-center p-2 mt-2 ">

<!-- testimnoial idv -->
<div class="testimny__wrapper w-full  lg:p-4  lg:w-1/2">
<div class="small_wrap border-2 border-gray-300 rounded-lg p-2 lg:p-4">
    <form action="" method="post" enctype="multipart/form-data">
   <h2 class="font-bold text-2xl my-4 underline">Edit Category</h2>
   <div class="from__grp">
   <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" value="<?php echo $cname; ?>" name="name" required/>
      </div>
     
      <input type="hidden" name="idh" value="<?php echo $id; ?>">
      <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-[#2271B1] text-white rounded-lg focus:outline-none" type="submit" name="save_cati" value="SAVE"/>
   </div>
    </form>

</div>
</div>


<!-- testimonial wrapper end -->
</div>


<!-- footer -->
<?php include 'partials/footer.php'; ?>