<?php
include 'partials/header.php';

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


<main id="hero-top" class="lg:flex w-full justify-between ">

<!-- right side content on large screen -->
<div class="main_right  w-full p-8">
  <div class="wrapper w-full masonry sm:masonry-sm md:masonry-md mb-8">
  <?php
  
  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_blog_posts`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1;

$sql = "SELECT * FROM tbl_blog_posts order by id DESC LIMIT $offset, $total_records_per_page";
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
<!-- pagination -->

<?php
  include 'pagination_client.php';
  ?>

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