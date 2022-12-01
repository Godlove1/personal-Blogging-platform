

    <!-- post/content card -->
    <div data-aos="fade-up" data-aos-duration="1000" class="rounded-lg shadow-md overflow-hidden lg:hover:shadow-none transition-all ease-in-out card__post my-8 hover:shadow-md w-full lg:h-[500px] lg:overflow-hidden post" id="post_<?php echo $hp_id; ?>">
      <a href="blog_article?<?php echo md5($hp_id); ?>&post_key=<?php echo $hp_id; ?>" title="<?php echo $hp_title; ?>">
      <!-- post_image -->
      <div class="post__image w-full lg:h-[250px] overflow-hidden">
        <img src="images/<?php echo $hp_cim; ?>" alt="<?php echo $hp_title; ?>" class="w-full h-full  object-cover">
      </div>
      <!-- post meta data/category/title/date -->
      <div class="post_data flex justify-center items-center flex-col">
        <p class="capitalize text-red-500 text-sm mt-4"><?php
$get_cat = $db->query("SELECT * FROM tbl_categories WHERE id=$hp_cat ");
while($row = $get_cat->fetch_assoc()) {
  //  $c_id = $row['id'];
   echo $row['name'];
} ?></p>
        <h2 class="font-thin uppercase text-center my-2"><?php echo $hp_title; ?></h2>
        <p class="date text-sm text-slate-500"><?php echo $hp_date; ?></p>
      </div>
      <!-- truncted start of post -->
      <div class="post__content mt-3 p-2">
        <p class="leading-normal text-sm">
        <?php echo substr($hp_content,0,300). "..."; ?>
        </p>
      </div>
  </a>
 <!-- divider -->
 <div class="flex justify-center items-end w-full my-8 lg:hidden">
  <div class="divider w-1/2  bg-black rounded-md">
    <div class="line-2 w-full">
     <div class="w-full flex justify-center items-center">
      <div class="line_1 w-5 h-5 bg-black border-2 border-white rounded-xl"></div>
     </div>
    </div>
  </div>
</div>
    </div>
<!-- /post/content card -->