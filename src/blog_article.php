<?php 
include 'config/config.inc.php';
?>
<?php
        //CHeck whether Post id is set or not
        if(isset($_GET['post_key'])){
            //Get the Post id and details of the selected Post
            $post_key = $_GET['post_key'];
            $_SESSION['post_key'] = $post_key;
            //Get the DEtails of the SElected Post
            $sql = "SELECT * FROM tbl_blog_posts WHERE id=$post_key";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1){
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);
                $blog_id = $row['id'];
                $title = $row['title'];
                $content = $row['post_content'];
               $cover_image = $row['cover_image'];
                $category=$row['cat_id'];
                $post_date=date("d, F Y ", strtotime($row['date']));
            }
            else
            {
                //Post not Availabe
                //REdirect to Home Page
                header('location:index');
            }
        }
        else
        {
            //Redirect to homepage
            header('location:index');
        }
    ?>
<?php
include 'partials/header.php';
?>

<main id="hero-top" class="lg:flex">

  <div class="main__left__content w-full">
<div class="post__wrapper p-2 w-full ">

<!-- post info -->
<div class="post_data flex justify-center items-center flex-col border-b-2 pb-2">
    <p class="capitalize text-red-500 text-sm mt-4 underline">
      <?php
$get_cat = $db->query("SELECT * FROM tbl_categories WHERE id=$category ");
while($row = $get_cat->fetch_assoc()) {
  //  $c_id = $row['id'];
   echo $row['name'];
} ?></p>

<!-- blog title -->
    <h2 class="header_h1 text-2xl lg:text-4xl uppercase text-center my-2">
      <?php echo $title ?>
    </h2>

    <p class="date text-xs md:text-sm text-slate-500">by <span class="text-black">Massi Martha</span>&nbsp;| &nbsp; <?php echo $post_date ?>  &nbsp;| &nbsp; <span>
    <?php
                        //Sql Query
    $sql1 = "SELECT * FROM tbl_comments WHERE post_id=$post_key";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?>
    </span> comments<i class="fa-regular fa-comments"></i> </p>
  </div>
 
<!-- cover image -->
<div class="cimage mt-8 flex justify-center items-center w-full">
    <img src="images/<?php echo $cover_image ?>" alt="<?php echo $title ?>" class="object-contain w-full md:w-1/2">
</div>

<div data-aos="fade-up" class="content my-8 px-4 lg:px-12 w-full  lg:text-xl">
<?php echo $content ?>
</div>

<!-- share box -->
<div class="sharebox flex w-full justify-center items-center p-2">
  <ul class="flex justify-around items-center ">
    <li class="flex items-center header_h1 lg:text-2xl"><p>Share </p><i class="fa-solid fa-share-nodes ml-2"></i> </li>
   
    <div class="ml-4 fb-share-button" data-href="https://www.massimartha.blog/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.massimartha.blog/blog_article?post_key=<?php echo $blog_id; ?>%2F&amp;src=sdkpreparse" title="share on facebook" class=" fb-xfbml-parse-ignore">Share</a></div>
    
    <li class="mx-4 flex text-white justify-center bg-green-500 px-2 rounded-lg items-center"><a href="https://api.whatsapp.com/send?text=https://www.massimartha.blog/blog_article?post_key=<?php echo $blog_id; ?>"  title="share on whatsapp" data-action="share/whatsapp/share" target="_blank" class="hover:text-[#A23445]" > <i class="fa-brands fa-whatsapp text-xl mr-2"></i><span class="text-xs">whatsapp</span> </a></li>

    <li class="text-xl">
    <a href="https://twitter.com/share?ref_src=blog_article?post_key=<?php echo $blog_id; ?>&amp;text=<?php echo $title; ?>" class="twitter-share-button" data-size="large"  title="share on twitter" data-show-count="true">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </li>
  </ul>
</div>

<!-- comment section -->
<div data-aos="fade-up" class="comments mt-8 mb-4 flex justify-center items-center">
    <h4 class="border p-4 w-1/2 border-black text-center font-bold "> <?php
                        //Sql Query
    $sql1 = "SELECT * FROM tbl_comments WHERE post_id=$post_key";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?> Comments<i class="fa-regular ml-2 fa-comments"></i></h4>
</div>

<!-- comments wrapper -->
<div class="comments lg:grid gap-2 grid-cols-3" id="load_com">
<?php
                        //Sql Query
$comment=mySQLi_query($conn,"SELECT * from tbl_comments  where post_id=$blog_id order by id ASC");
if(mysqli_num_rows($comment)>0){
while($row=mySQLi_fetch_array($comment)){
$comment_id=$row['id'];
$comment_content=$row['comment'];
$name=$row['username'];
$c_date=$row['date']
?>
  <!-- comment template -->
  <?php
   include 'getcomments.php';
  ?>
<!-- comment template -->
<?php }}else{
?>

<!-- no comments -->
<div class="text-center italic text-sm">
    <i class="fa-regular fa-comments"></i> <span>
    be the first to air your thoughts
    </span>
</div>

<?php
}
?>

</div>

<div id="message"></div>
<!-- add comment -->
<div class="add_comm w-full flex justify-center items-center my-8 shadow">
<form id="contact_form" method="post" class="flex flex-col w-full px-4 lg:w-1/2">
  <input type="text" name="username" placeholder="your name" class="border border-slate-500 rounded-md focus:outline-none focus:border-[#A23445] shadow-md p-2 my-2 transition-all ease-linear" required>
  <textarea name="comment" placeholder="enter your reply ..."   cols="25" rows="3" class=" shadow-md border border-slate-500 rounded-md focus:outline-none focus:border-[#A23445] transition-all p-2 ease-linear" required></textarea>
  <input type="hidden" name="post_id" value="<?php echo $blog_id?>">
  <input type="submit" value="SEND" name="post_comment" class="shadow-md header_h1  hover:bg-white bg-[#A23445] hover:text-[#A23445] text-white p-2 my-2 w-1/2 transition-all ease-linear">
</form>
</div>

  </div>

<!-- other post from the same category -->
<div class="opyml-wrapper my-8 p-2">
  <div class="omy-header text-center">
    <h3 class="header_h1 text-2xl">Other Post you may like !</h3>
  </div>

  <!-- other post wrapper -->
<div class="owrapper my-8">
  <div class="w-full lg:flex justify-center items-center flex-col p-2">
  <?php
$sql = "SELECT * FROM tbl_blog_posts WHERE cat_id=$category order by rand() limit 0,3 ";
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
$op_date=date("d, F Y ", strtotime($row['date']));
  ?>
    <!-- pop-post-wrapper -->
    <?php
  include 'partials/other_post_template.php';
  ?>

<?php
} } else{
  echo ' No articles';
}
    ?>
   

  </div>

  <!-- see all posts -->
  <div class="see-all text-center my-8">
    <a href="all-articles" title="more amazing blog post" class="w-[200px] bg-[#A23445] text-white px-4 py-2 transition-all ease-in-out hover:bg-[#A23445]"> <span>view all</span> <i class="fa-solid ml-2 fa-arrow-right"></i></a>
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

<script type="text/javascript">
  setInterval(
   function ()
   {
      $('#load_com').load('getcomments.php').fadeIn("slow");
   }, 1000); // refresh page every 1 second

   //Send Comment
   $(function() {
   $("#contact_form").on("submit", function(e) {
 var dataString = $('#contact_form').serialize();
//  alert(dataString); return false;
 $.ajax({
   type: "POST",
   url: 'partials/sendcomment.php',
   data: dataString,
   success: function (data) {
   
    $("#contact_form").trigger("reset");
  //    $("#contact_form").html("<div id='message'></div>");
    $("#message")
   .html("<h2 class='text-green-500'>Thought Sent!</h2>")
     .append("<p class='text-green-500'>Thank you.</p>")
     .hide()
   .fadeOut(1000);
   }
 });

 e.preventDefault();
});
});
</script>
<script src="js/client-menu.js"></script>
</body>
</html>