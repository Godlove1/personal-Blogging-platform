
<!-- will be o the right on large screens -->
<div class="main__right__content px-2  lg:my-8 lg:w-[40%] w-full lg:h-screen  lg:pl-2 ">
    <!-- search box --> 
    <form action="blog-search" method="post" class="w-full flex justify-center items-center px-2 lg:px-0 my-8 ">
     <div class="w-full border border-slate-300 flex justify-center items-center ">
      <input type="search" name="search" placeholder="Search my blog" class="p-2 text-sm w-full   focus:outline-none">
      <input type="submit" value="search" class="bg-[#A23445] p-2 border text-white">
     </div>
    </form>
 
<!-- about me -->
<div class="about__section my-10">
<div class="about_me w-full border-b-2 border-black">
  <h2 class="uppercase header_h1">about me</h2>
</div>

<div class="me w-full flex justify-center items-center flex-col p-2">
  <div class="img_box w-[200px] h-[200px] overflow-hidden rounded-[50%]">
    <img src="images/<?php echo $pp; ?>" alt="Massi Martha" class="object-cover shadow-lg w-full h-full">
  </div>
  <div data-aos="fade-up" data-aos-duration="1000" class="content  mt-4 ">
  <?php echo $abt; ?>
  </div>
</div>

</div>

<!-- popular post -->
<div class="about__section my-10">
  <div class="about_me w-full border-b-2 border-black mb-4">
    <h2 class="uppercase header_h1">latest posts</h2>
  </div>
  
  <div class="w-full lg:flex justify-center items-center flex-col  p-2">
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
    <div data-aos="fade-up" data-aos-duration="1000" class="wrapper w-full flex justify-between max-h-[150px] overflow-hidden border-b border-slate-600 mb-4">
      <div class="data-s w-full">
       <a href="blog_article?<?php echo md5($lp_id); ?>&post_key=<?php echo $lp_id; ?>" title="<?php echo $lp_title ?>" class="hover:text-[#A23445] transition-all ease-in">
         <h3 class="text-sm font-bold"><?php echo $lp_title; ?></h3>
       </a>
        <p class="capitalize text-sm text-slate-600 my-4"><?php echo $lp_date; ?></p>
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

<div class="about__section mt-10 bg-black text-white lg:text-black lg:bg-white">
  <div class="about_me w-full border-b-2 border-black">
    <h3 class="uppercase p-2 header_h1">keep in touch</h3>
  </div>
  <div data-aos="fade-up" data-aos-duration="1000" class="flex justify-around items-center flex-wrap">
    <a href="<?php echo $fb; ?>"class="m-2 font-extralight uppercase"><i class="hover:text-[#A23445]  transition-all  ease-linear m-2 fa-brands fa-facebook"></i>facebook</a>
   <a href="<?php echo $tw; ?>" class="m-2 uppercase"><i class="hover:text-[#A23445] transition-all ease-linear m-2 fa-brands fa-twitter"></i>twitter</a>
   <a href="<?php echo $ig; ?>" class="m-2 uppercase"><i class="hover:text-[#A23445] transition-all ease-linear m-2 fa-brands fa-instagram"></i>instagram</a>
   <a href="<?php echo $yt; ?>" class="m-2 uppercase"><i class="hover:text-[#A23445] transition-all ease-linear m-2 fa-brands fa-youtube"></i>youtube</a>
   </div>
  </div>

<!-- categories -->
<div class="about__section  lg:mt-10 mb-2 lg:my-10 bg-black text-white lg:text-black lg:bg-white ">
  <div class="about_me w-full border-b-2 border-black">
    <h2 class="uppercase p-2 header_h1">categories & Tags</h2>
  </div>
  <div class="flex flex-wrap">
    <a href="index" class="m-2 font-extralight capitalize hover:text-[#A23445] transition-all ease-in"><i class="fa-solid text-xs fa-chevron-right text-[#A23445]"></i> Home</a>

    
  <?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC");
while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat=<?php echo $c_id; ?>" class="m-2 border border-slate-400 capitalize rounded-full  bg-[#A23445] lg:bg-white  px-2 hover:bg-[#A23445] hover:text-white hover:border-white transition-all ease-in"><?php echo $c_name; ?> <span>(<?php
                        //Sql Query
    $sql1 = "SELECT * FROM tbl_blog_posts WHERE cat_id=$c_id";
                        //Execute Query
                        $res1 = mysqli_query($conn, $sql1);
                        //Count Rows
                        $count1 = mysqli_num_rows($res1);
                        echo $count1;
                    ?>)</span></a>

<?php } ?>

   </div>
  </div>

  </div>
