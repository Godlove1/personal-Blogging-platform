<?php
include 'partials/header.php';

// varibale for filter
@$cat=$_GET['cat'];

?>

<main id="hero-top" class="lg:flex">

  <div class="main__left__content w-full">
<!-- other post from the same category -->
<div class="opyml-wrapper my-8 p-2">
  <div class="omy-header flex justify-between items-center px-4">
    <h3 class="font-extrabold underline ">View all blog articles</h3>
    <form  method="post">
<?php
///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT * FROM tbl_categories order by id DESC";
///////////// End of query for first list box////////////
?>
    <select name='cat' onchange="reload(this.form)" class="border-2 border-slate-700 rounded-sm focus:border-red-500 transition-all ease-out focus:outline-none">
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

  <!-- other post wrapper -->
<div class="owrapper my-8">

  <div class="w-full lg:flex justify-center items-center flex-col p-2">
   
  <?php
  if(isset($_GET['cat']) && strlen($_GET['cat'])<2){
    $type_cat=$_GET['cat'];
    
$sql = "SELECT * FROM tbl_blog_posts WHERE cat_id=$type_cat order by rand() ";
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
<div class="w-full flex justify-center items-center p-4">
    <button class="uppercase font-thin text-slate-600 border-2 border-slate-900 p-3 hover:border-red-500 hover:text-red-500 transition-all ease-in"><span>load more posts</span><i class="fa-solid ml-2 fa-rotate"></i></button>
      </div>

<?php
}else{
  ?>
<div>
  <p>No Articles for availbale for this category, try another!</p>
</div>
  <?php
} } else{
   
$sql = "SELECT * FROM tbl_blog_posts order by rand() ";
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
<div class="w-full flex justify-center items-center p-4">
    <button class="uppercase font-thin text-slate-600 border-2 border-slate-900 p-3 hover:border-red-500 hover:text-red-500 transition-all ease-in"><span>load more posts</span><i class="fa-solid ml-2 fa-rotate"></i></button>
      </div>

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

  <!-- load more posts -->
  <!-- <div class="w-full flex justify-center items-center p-4">
    <button class="uppercase font-thin text-slate-600 border-2 border-slate-900 p-3 hover:border-red-500 hover:text-red-500 transition-all ease-in"><span>load more posts</span><i class="fa-solid ml-2 fa-rotate"></i></button>
      </div> -->

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