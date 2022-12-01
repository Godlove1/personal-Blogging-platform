<?php
include 'partials/header.php';
$search = mysqli_real_escape_string($conn,strip_tags(stripcslashes($_POST['search'])));

?>

<main id="hero-top" class="lg:flex">

  <div class="main__left__content w-full">
<!-- other post from the same category -->
<div class="opyml-wrapper my-8 p-2">
  <div class="omy-header flex justify-between items-center px-4">
    <h3 class="font-extrabold underline ">Your Search</h3>
  </div>

  <!-- other post wrapper -->
<div class="owrapper my-8">
  <div class="w-full lg:flex justify-center items-center flex-col p-2">
   
  <?php
$sql = "SELECT * FROM tbl_blog_posts WHERE title LIKE '%$search%' order by rand() ";
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
    <!-- post-wrapper -->
    <?php
  include 'partials/other_post_template.php';
  ?>

<?php
}
}else{
  ?>
 <!-- no Result found -->
 <div class="w-full flex justify-center items-center p-4 text-red-500">
   <p>We could not find what you are looking for, try something else</p>
      </div>
  <?php
}
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