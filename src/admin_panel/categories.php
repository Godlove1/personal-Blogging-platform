<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//adding category
if(isset($_POST['add_cati'])){
  //1. Get the DAta from Form
  $name = $_POST['name'];
 
  $sql2 = "INSERT INTO tbl_categories SET
      name = '$name'
  ";

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
          <p class="text-sm">Category Successfully Added.</p>
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
            <p class="text-sm">Error adding category, try again</p>
          </div>
        </div>
      </div>
         ';
      header('location:index');
      exit();
  }}


         // delete Category
    if(isset($_GET['tid'])){
        $id = $_GET['tid'];
       
        //3. Delete item from Database
        $sql = "DELETE FROM tbl_Categories WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage item with Session Message
        if($res==true){
            //item Deleted
            $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-4 md:my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
  <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
  <div> 
    <p class="font-bold">SUCCESS!</p>
    <p class="text-sm">Category  Deleted.</p>
  </div>
</div>
</div>
        ';
        //Redirect to Manage Admin Page
        header('location:index');
        exit();
        }
        else{
            $_SESSION['login'] ='
            <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
           <div class="flex">
             <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
             <div>
               <p class="font-bold">Something went Wrong</p>
               <p class="text-sm">Error Deleting category. please try again.</p>
             </div>
           </div>
         </div>
            ';
                   //REdirect to Manage item
                   header('location:index');
                   die();
        } }

 // header
include 'partials/header-add.php';



?>

 <!-- back btn -->
<div class=" my-6  lg:mt-12 w-full flex justify-center">
<a href="index" class="w-auto p-1 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>
</div>


<!-- testimonial side form -->
<div class="w-full lg:flex justify-center items-center p-2 mt-2 ">

<!-- testimnoial idv -->
<div class="testimny__wrapper w-full  lg:p-4  lg:w-1/2">
<div class="small_wrap border-2 border-gray-300 rounded-lg p-2 lg:p-4">
    <form action="" method="post" enctype="multipart/form-data">
   <h2 class="font-bold text-2xl my-4 underline">Add Category</h2>
   <div class="from__grp">
   <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Name</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="name of category" name="name" required/>
      </div>
     
      <input class="w-1/2 h-10 px-3 mt-6 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="add_cati" value="ADD"/>
   </div>
    </form>



    <!-- see all testimonial -->
    <div class="border border-gray-300 rounded-lg  w-full my-8 ">
    <h2 class="font-bold text-2xl my-4 underline ml-4">All Categories</h2>
   
    <div class="mony__wrapper p-2  w-full max-h-[500px] flex flex-wrap justify-around items-center overflow-scroll">
   
<?php
$sql = "SELECT * FROM tbl_categories  order by id ASC";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
    $id = $row['id'];
    $name = $row['name'];
   
    ?>

     <!-- template -->
     <div class="card my-2 lg:w-[200px] border-2 rounded-md p-1 border-gray-300">
<div class="cation flex justify-center items-center flex-wrap">
<p class="capitalize"><?php echo $name; ?></p>
    <a href="categories?tid=<?php echo $id; ?>" class="bg-red-500 text-white px-3 ml-2 hover:text-red-500">Delete</a>
</div>
    </div>
       <!-- template -->

                <?php
}   }else{
 echo '
 <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
                <p>Nocategories added yet</p>
              </div>
 ';
} 
?>
   

       </div>
    </div>

</div>
</div>


<!-- testimonial wrapper end -->
</div>







<!-- footer -->
<?php include 'partials/footer.php'; ?>