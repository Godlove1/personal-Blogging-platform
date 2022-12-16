
<!-- will be o the right on large screens -->
<div class="main__right__content p-1 my-8 lg:w-[40%] w-full  lg:pl-2">
    <!-- search box -->
    <form action="blog-search" method="post" class="w-full flex justify-center items-center">
     <div class="w-1/2 border flex justify-center items-center">
      <input type="search" name="search" placeholder="Search massi martha's blog" class="p-2 text-sm w-full border border-black focus:outline-none">
      <input type="submit" class="bg-red-500 p-2 text-white">
     </div>
    </form>
 
<!-- about me -->
<div class="about__section my-10">
<div class="about_me w-full border-b-2 border-black">
  <h2 class="uppercase">about me</h2>
</div>

<div class="me w-full flex justify-center items-center flex-col p-2">
  <div class="img_box w-[200px] h-[200px] overflow-hidden rounded-[50%]">
    <img src="images/<?php echo $pp; ?>" alt="Massi Martha" class="object-cover w-full h-full">
  </div>
  <div data-aos="fade-up" class="content mt-4 text-sm">
  <?php echo $abt; ?>
  </div>
</div>

</div>

<!-- popular post -->
<div class="about__section my-10">
  <div class="about_me w-full border-b-2 border-black">
    <h2 class="uppercase">latest posts</h2>
  </div>
  
  <div class="w-full lg:flex justify-center items-center flex-col p-2">
  <?php
$get_cats = $db->query("SELECT * FROM tbl_blog_posts order by id DESC limit 0,5");
while($row = $get_cats->fetch_assoc()) {
   $lp_id = $row['id'];
   $lp_title = $row['title'];
   $lp_cat= $row['cat_id'];
   $lp_cim= $row['cover_image'];
   $lp_conte= $row['post_content'];
   $lp_date= date("d, F Y ", strtotime($row['date']));
    ?>
    <!-- pop-post-wrapper -->
    <div data-aos="fade-up" data-aos-duration="500" class="wrapper w-full flex justify-between max-h-[150px] overflow-hidden border-b border-slate-600 mb-4">
      <div class="data-s w-full">
       <a href="blog_article?<?php echo md5($lp_id); ?>&post_key=<?php echo $lp_id; ?>" title="<?php echo $lp_title ?>" class="hover:text-red-500 transition-all ease-in">
         <h3 class="text-sm "><?php echo $lp_title; ?></h3>
       </a>
        <p class="capitalize text-xs text-slate-600 my-4"><?php echo $lp_date; ?></p>
      </div>
      <div class="img w-2/5 h-[100px] overflow-hidden rounded-md mb-2">
       <a href="blog_article?<?php echo md5($lp_id); ?>&post_key=<?php echo $lp_id; ?>" title="<?php echo $lp_title; ?>">
        <img src="images/<?php echo $lp_cim; ?>" alt="<?php echo $lp_title; ?>" class="w-full h-full object-cover">
       </a>
      </div>
    </div>

    <?php } ?>
   

  </div>
  </div>

  
<!-- keep in touch -->

<div class="about__section mt-10 ">
  <div class="about_me w-full border-b-2 border-black">
    <h2 class="uppercase p-2">keep in touch</h2>
  </div>
  <div data-aos="fade-up" class="flex justify-around items-center flex-wrap">
    <a href="<?php echo $fb; ?>"class="m-2 font-extralight uppercase"><i class="hover:text-red-500  transition-all  ease-linear m-2 fa-brands fa-facebook"></i>facebook</a>
   <a href="<?php echo $tw; ?>" class="m-2 uppercase"><i class="hover:text-red-500 transition-all ease-linear m-2 fa-brands fa-twitter"></i>twitter</a>
   <a href="<?php echo $ig; ?>" class="m-2 uppercase"><i class="hover:text-red-500 transition-all ease-linear m-2 fa-brands fa-instagram"></i>instagram</a>
   <a href="<?php echo $yt; ?>" class="m-2 uppercase"><i class="hover:text-red-500 transition-all ease-linear m-2 fa-brands fa-youtube"></i>youtube</a>
   </div>
  </div>

<!-- categories -->
<div class="about__section my-10 ">
  <div class="about_me w-full border-b-2 border-black">
    <h2 class="uppercase p-2 ">categories</h2>
  </div>
  <div class="flex lg:justify-evenly lg:items-center flex-wrap lg:flex-row flex-col">
    <a href="index" class="m-2 font-extralight capitalize hover:text-red-500 transition-all ease-in"><i class="fa-solid text-xs fa-chevron-right text-red-500"></i> Home</a>

    
  <?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC");
while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat=<?php echo $c_id; ?>" class="m-2 capitalize hover:text-red-500 transition-all ease-in"><i class="fa-solid text-xs fa-chevron-right text-red-500"></i> <?php echo $c_name; ?></a>

<?php } ?>

   </div>
  </div>

  </div>
