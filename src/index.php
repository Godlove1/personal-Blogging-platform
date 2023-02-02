<?php
include 'config/config.inc.php';
include 'partials/header.php';

// pagination
// if (isset($_GET['page_no']) && $_GET['page_no']!="") {
// 	$page_no = $_GET['page_no'];
// 	} else {
// 		$page_no = 1;
//         }

// 	$total_records_per_page = 15;
//     $offset = ($page_no-1) * $total_records_per_page;
// 	$previous_page = $page_no - 1;
// 	$next_page = $page_no + 1;
// 	$adjacents = "2"; 

?>


<main id="hero-top" class="lg:flex w-full justify-between ">

<!-- right side content on large screen -->
<div class="main_right  w-full lg:p-8">
  <div class="wrapper w-full masonry lg:masonry-lg mb-8 p-4">
  <?php 
  
  // $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts`");
  // $total_records = mysqli_fetch_array($result_count);
  // $total_records = $total_records['total_records'];
  // $total_no_of_pages = ceil($total_records / $total_records_per_page);
  // $second_last = $total_no_of_pages - 1;

$sql = "SELECT * FROM tbl_blog_posts order by rand() LIMIT 15";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
$hp_id=$row['id'];
$hp_title = $row['title'];
$hp_cat= $row['cat_id'];
$hp_cim= $row['cover_image'];
$hp_content= $row['post_content'];
$hp_date= date("d, F Y ", strtotime($row['date']));
  ?>
 
<?php
  include 'partials/home_post_template.php';
  ?>

<?php
} }
?>

</div>

<!-- view all button -->
<div class="v_all w-full flex justify-center items-center my-8">
  <a href="all-articles" class="flex text-2xl p-2 items-center bg-[#921125] hover:bg-[#A23445] text-white"> <span>view all</span> <i class="fa-solid ml-2 text-xl fa-arrow-right"></i></a>
</div>

<!-- pagination -->
<?php
  // include 'pagination_client.php';
  ?>
<!-- FEAUTURED VIDEOS AREA/MY VLOG -->
<div class=" border-red-600 border-8 lg:border-none bg-[#121418] text-white  p-4 mb-8">
<div class="inner_wrapper">

<!-- heade -->
<div class="tit flex w-full items-center mb-4">
<h1 role="title" class="w-full lg:w-[200px] uppercase header_h1 text-2xl lg:text-4xl">My vlog</h1>
<div class="w-full border-slate-400 border"></div>
</div>

<!-- videos -->
<div class="videos w-full flex justify-center items-center flex-col">

<?php
$sql = "SELECT * FROM tbl_vlogs  order by rand() limit 1";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
$id = $row['id'];
$nameofvid=$row['name_of_vid'];
$ytlink=$row['vid_link'];
$thumbnail=$row['thumbnail'];

    ?>
  <!-- main random video -->
<div class="w-full lg:w-1/2  relative  overflow-hidden">
  <a href="<?php echo $ytlink; ?>" target="_blank" class="w-full overflow-hidden ">
    <img src="images/<?php echo $thumbnail; ?>" class="object-cover w-full h-full" alt="<?php echo $nameofvid; ?>" srcset="images/<?php echo $thumbnail; ?>">

    <div class="w-full h-full absolute top-0 left-0 right-0 bottom-0 ">
<div class="w-full h-full  flex justify-center items-center ">
<i class="fa-solid fa-play text-4xl hover:text-red-500 animate-pulse"></i>
</div>
 </div>

  </a>
  <!-- meta/desctription -->
  <div class="">
<p class="text-sm text-red-500">Youtube</p>
<a class="text-3xl hover:text-[#921125] transition-all ease-linear .header_h1" href="<?php echo $ytlink; ?>" target="_blank"  ><?php echo $nameofvid; ?></a>
  </div>
</div>
<!-- main random video -->

<?php
}   }else{
 echo '
 <div class="w-full text-center bg-red-500 p-6 text-white font-bold">
                <p>No vlogs added yet!.</p>
              </div>
 ';
} 
?>


<!-- other 3 videos -->
<div>
<div class="wrapper w-full masonry lg:masonry-lg my-8">


<?php
$sql = "SELECT * FROM tbl_vlogs  order by rand()";
//Execute the qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have items or not
$count = mysqli_num_rows($res);
//Create Serial Number VAriable and Set Default VAlue as 1
if($count>0){
while($row=mysqli_fetch_assoc($res)){
$id = $row['id'];
$nameofvid=$row['name_of_vid'];
$ytlink=$row['vid_link'];
$thumbnail=$row['thumbnail'];

    ?>
<div class="relative flex lg:flex-col overflow-hidden my-4 border-t">
  <a  href="<?php echo $ytlink; ?>" target="_blank"  class="w-full overflow-hidden ">
    <img src="images/<?php echo $thumbnail; ?>" class="object-cover w-full h-full" alt="<?php echo $nameofvid; ?>" srcset="images/<?php echo $thumbnail; ?>">
    
 <div class="w-full h-full absolute top-0 left-0 right-0 bottom-0 ">
<div class="w-1/2 h-full  flex justify-center items-center ">
<i class="fa-solid fa-play text-4xl hover:text-red-500 hover:animate-spin"></i>
</div>
 </div>


  </a>
  <!-- meta/desctription -->
  <div class="p-4 w-full">
<p class="text-sm text-red-500">Youtube</p>
<a class="lg:text-xl hover:text-[#921125] transition-all ease-linear .header_h1"  href="<?php echo $ytlink; ?>" target="_blank"  ><?php echo $nameofvid; ?></a>
  </div>
</div>


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
<!-- toutube link -->

<div class="flex justify-center items-center">
  <a class="bg-[#921125] p-2 " href="<?php echo $yt ?>" target="_blank" rel="noopener noreferrer"><span>View All</span>
  <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
</a>
</div>

</div>


</div>
</div>


</div>
</div>


<!-- about side left on large screens -->
<?php
  include 'partials/left_content_about.php';
  ?>

</main>

<!-- footer -->
<?php
  include 'partials/footer.php';
  ?>
<script src="js/client-menu.js"></script>
</body>
</html>