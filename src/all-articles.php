<?php
include 'config/config.inc.php';
include 'partials/header.php';

// varibale for filter
@$cat=$_GET['cat']; 


// pagination
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 15;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 


?>

<main id="hero-top" class="lg:flex">

  <div class="main__left__content w-full">
<!-- other post from the same category -->
<div class="opyml-wrapper my-8 p-2">
  <div class="my-header flex justify-between items-center px-2 lg:px-12">
    <h3 class=" text-xl lg:text-2xl  header_h1">View all blog articles</h3>
    <form  method="post">
<?php
///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT * FROM tbl_categories order by id DESC";
///////////// End of query for first list box////////////
?>
    <select name='cat' onchange="reload(this.form)" class="bg-[#A23445] text-white rounded-sm focus:border-red-500 p-2 font-bold transition-all ease-out shadow-lg focus:outline-none">
        <option value="Default sorting">All Articles</option>
        <?php
    foreach ($db->query($quer2) as $cgory) {
        if($category['id']==$status){
            if($cgory['id'] == $cat ){
                echo "<option selected value='$cgory[id]' class='font-bold my-4 text-[#EBA826]'>$cgory[name]</option>";
              }else{
                echo "<option value='$cgory[id]' class='font-bold my-4'>$cgory[name]</option>";
              }
            }
        }
?>
    </select>
</form>
  </div>

  <!-- other post wrapper -->
<div class="owrapper my-8">

  <div class="w-full lg:flex justify-center items-center flex-col p-2 lg:p-12">
   
  <?php
  if(isset($_GET['cat']) && strlen($_GET['cat'])<2){
    $type_cat=$_GET['cat'];

    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts` WHERE cat_id=$type_cat AND post_status=1");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;   
    
$sql = "SELECT * FROM tbl_blog_posts WHERE cat_id=$type_cat AND post_status=1 order by id DESC LIMIT $offset, $total_records_per_page";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
$op_id=$row['id'];
$op_title = $row['title'];
$op_cat= $row['cat_id'];
$op_cim= $row['cover_image'];
$op_content= $row['post_content'];
$op_date= date("d, F Y ", strtotime($row['date']));
  ?>
    <!-- pop-post-wrapper -->
    <?php
  include 'partials/other_post_template.php';
  ?>
 
<?php
}
?>
<!-- load more posts -->
<!-- pagination -->
<?php
    include 'page_counter.php';
  ?>

<?php
}else{
  ?>
<div class="text-center font-bold">
  <p>No Articles for availbale for this category, try another!</p>
</div>
</div>
  <?php
} } else{

  
  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts`  WHERE post_status=1");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;
   
$sql = "SELECT * FROM tbl_blog_posts  WHERE post_status=1 order by id DESC LIMIT $offset, $total_records_per_page";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
$op_id=$row['id'];
$op_title = $row['title'];
$op_cat= $row['cat_id'];
$op_cim= $row['cover_image'];
$op_content= $row['post_content'];
$op_date= date("d, F Y ", strtotime($row['date']));
  ?>
    <!-- pop-post-wrapper -->
    <?php
  include 'partials/other_post_template.php';
  ?>

<?php
}
?>
<!-- load more posts -->
<!-- pagination -->
<?php
  include 'page_counter.php';
  ?>

<?php
}else{
?>
<div>
  <p>No Articles for availbale for this category, try another!</p>
</div>
  <?php
} }
    ?>
  
  </div>


</div>
 <!--/other post wrapper -->

</div>

  </div>

  <!-- will be o the right on large screens -->
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