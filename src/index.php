<?php
include 'partials/header.php';
?>

<main id="hero-top" class="lg:flex">

  <div class="main__left__content w-full">
<div class="post__wrapper p-2 w-full md:grid md:grid-cols-3 gap-2">
<?php
$sql = "SELECT * FROM tbl_blog_posts order by rand() limit 0,10";
//Execute the qUery
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

 // counting total number of posts
 $allcount_query = "SELECT count(*) as allcount FROM tbl_blog_posts";
 $allcount_result = mysqli_query($conn,$allcount_query);
 $allcount_fetch = mysqli_fetch_array($allcount_result);
 $allcount = $allcount_fetch['allcount'];

if($count>0){
  while($row=mysqli_fetch_assoc($res)) {
$hp_id=$row['id'];
$hp_title = $row['title'];
$hp_cat= $row['cat_id'];
$hp_cim= $row['cover_image'];
$hp_content= $row['post_content'];
$hp_date= $row['date'];
  ?>
   <!-- post/content card -->
   <?php
  include 'partials/home_post_template.php';
  ?>
<!-- /post/content card -->

  <?php
} } else{
  echo ' No articles';
}
    ?>
   

  </div>
  <!-- load more posts button -->
  <div class="load-more w-full flex justify-center items-center p-4">
<button class="uppercase font-thin text-slate-600 border-2 border-slate-900 p-3 hover:border-red-500 hover:text-red-500 transition-all ease-in"><span>load more posts</span><i class="fa-solid ml-2 fa-rotate"></i></button>
<input type="hidden" id="row" value="0">
      <input type="hidden" id="all" value="<?php echo $allcount; ?>">
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