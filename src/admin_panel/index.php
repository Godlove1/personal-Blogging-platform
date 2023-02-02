<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// header
include 'partials/header-add.php';
// varibale for filter
@$cat=$_GET['cat'];

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

    <!-- stats -->
    <div class="stats my-4 w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 p-4 lg:pt-9">
        <div class="stat hover:shadow-none  transition-all ease-in-out shadow-md rounded-lg text-center p-4 border mb-2">
            <h1 class="text-3xl font-bold">
            <?php
                        //Sql Query
    $sql1 = "SELECT * FROM tbl_blog_posts";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?>
            </h1>
            <h2>Total Articles</h2>
        </div>

        <?php
$get_cats="SELECT * FROM tbl_categories order by id DESC";
foreach ($db->query($get_cats) as $cats) {
    $cid=$cats['id'];
    $cname=$cats['name'];
    ?>
<!--  dynamically -->
<div class="stat  hover:shadow-none  transition-all ease-in-out shadow-md rounded-lg  text-center p-4 border mb-2">
            <h1 class="text-3xl font-bold">
            <?php
                        //Sql Query
    $sql1 = "SELECT * FROM tbl_blog_posts WHERE cat_id=$cid";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?>
            </h1>
            <h2> <?php echo ucwords($cname); ?> Articles</h2>
        </div>
        <!--  dynamically -->
    <?php
 }
      ?>

       
    </div>


    <!-- add button -->
    <div class="my-4 add__btn w-full flex justify-center items-center border " >
 <a href="add" class="text-white bg-[#2271B1] p-2 rounded-sm font-semibold"><span>New Article</span><i class="fa-solid fa-plus ml-2"></i></a>
    </div>

    <!-- filter -->
<div class="filter border-b mt-12 mb-4 px-2 w-full flex justify-between items-center lg:px-[100px]">
<p class="text-gray-500">Published </p>

<div>
    <a href="see-drafts" class="text-white bg-slate-500 p-1" title="see draft posts">Drafts ( <?php
                        //Sql Query
    $getcom = "SELECT * FROM tbl_blog_posts WHERE post_status=0";
                        //Execute Query
                        $comnum = mysqli_query($conn, $getcom);
                        //Count Rows
                        $countcom = mysqli_num_rows($comnum);
                        echo $countcom;
                    ?>
        )</a>
</div>

<form  method="post">
<?php
///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT * FROM tbl_categories order by id DESC";
///////////// End of query for first list box////////////
?>
    <select name='cat' onchange="reload(this.form)" class="p-1 border">
        <option value="Default sorting">All Articles</option>
        <?php
    foreach ($db->query($quer2) as $cgory) {
        if($category['id']==$status){
            if($cgory['id'] == $cat ){
                echo "<option selected value='$cgory[id]'>$cgory[name]</option>";
              }else{
                echo "<option value='$cgory[id]'>$cgory[name]</option>";
              }
            }
        }
?>
    </select>
</form>
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
<th scope="col" class="px-2 py-3 text-center">Comments</th>
<th scope="col" class="px-2 py-3 text-center ">Date</th>
<th scope="col" class="px-2 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

            
<?php
if(isset($_GET['cat']) && strlen($_GET['cat'])<2){
$type_prod=$_GET['cat'];

$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts` WHERE cat_id=$type_prod AND post_status=1");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
//Create a SQL Query to Get all the item
$sql = "SELECT * FROM tbl_blog_posts  WHERE cat_id=$type_prod AND post_status=1 order by id DESC LIMIT $offset, $total_records_per_page";
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
    $date= date("d, F Y ", strtotime($row['date']));
    ?>
                               <!--template-->
                               <?php include 'partials/trow.php'; ?>
                        <!--template-->
                        <?php
  
                  } }} else {

  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts` WHERE post_status=1");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;
  //Create a SQL Query to Get all the items
  $sql = "SELECT * FROM tbl_blog_posts  WHERE post_status=1 order by id DESC LIMIT $offset, $total_records_per_page";
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
                             <?php include 'partials/trow.php'; ?>
                      <!--template-->
                      <?php

                }     }else{
                    echo ' <div class="w-full text-center bg-[#2271B1] p-6 text-white font-bold">
                    <p>No Articles Available. Add more</p>
                  </div>';
                }
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