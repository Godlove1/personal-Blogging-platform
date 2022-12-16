<?php
include 'partials/header.php';
?>

<main id="hero-top" class="lg:flex w-full justify-between ">

<!-- right side content on large screen -->
<div class="main_right  w-full ">
  <div class="wrapper w-full lg:grid grid-cols-2 gap-3">
  <?php
  
$sql = "SELECT * FROM tbl_blog_posts  order by rand() ";
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