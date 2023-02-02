<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';



//updating category
if(isset($_GET['publish_key'])){
    //1. Get the DAta from Form
    $id=$_GET['publish_key'];
    $status = 1 ;

    $sql2 = "UPDATE tbl_blog_posts SET post_status = 1 WHERE id=$id";
  
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
            <p class="text-sm">Article Successfully Publish.</p>
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
              <p class="text-sm">Error Publishing Article, try again</p>
            </div>
          </div>
        </div>
           ';
        header('location:index');
        exit();
    }}
  


// header
include 'partials/header-add.php';

// pagination
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 25;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

?>

    <!-- add button -->
    <div class="my-4 add__btn w-full flex justify-around items-center border " >
    <div class="flex ">
<p id="go-back" class="w-[100px] cursor-pointer p-1 my-6 font-semibold bg-[#2271B1] text-white "><i class="fa-solid fa-left-long mr-2"></i>Go Back</p> 
</div>
 <p  class="text-white bg-[#2271B1] p-2 rounded-sm font-semibold">Draft Posts</p>
    </div>


<!-- table of products/customers -->
<section class=" w-full  lg:flex justify-center items-center lg:px-8">
   <div class="w-full border-4   bg-gray-200 ">
        <table class="w-full   text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
<th scope="col" class="px-2 py-3 text-center">S.N</th>
<th scope="col" class="px-2 py-3 text-center">Title</th>
<th scope="col" class="px-2 py-3 text-center">Category</th>
<th scope="col" class="px-2 py-3 text-center ">Date</th>
<th scope="col" class="px-2 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

            
<?php
  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts` WHERE post_status=0");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;
  //Create a SQL Query to Get all the items
  $sql = "SELECT * FROM tbl_blog_posts  WHERE post_status=0  order by id DESC LIMIT $offset, $total_records_per_page";
  //Execute the qUery
  $res = mysqli_query($conn, $sql);
  //Count Rows to check whether we have items or not
  $count = mysqli_num_rows($res);
  //Create Serial Number VAriable and Set Default VAlue as 1
  $sn=1;
  if($count>0){
  while($row=mysqli_fetch_assoc($res)){
    $id = $row['id'];
    $name = $row['title'];
    $c_img = '../images/'.$row['cover_image'];
    $categ = $row['cat_id'];
    $date= date("d/m/Y,h:sa", strtotime($row['date']));
                             ?>
                             <!--template-->
                             <?php include 'partials/draft-trow.php'; ?>
                      <!--template-->
                      <?php

                }     }else{
                    echo ' <div class="w-full text-center bg-[#2271B1] p-6 text-white font-bold">
                    <p>No Draft Articles Available.</p>
                  </div>';
                }
                    
                ?>

            </tbody>
        </table>
    </div>
</section>



<!-- pagination -->
<?php include '../page_counter.php';?>


<!-- footer -->
<?php include 'partials/footer.php'; ?>