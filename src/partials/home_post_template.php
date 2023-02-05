
<!-- post template home page -->
<div  data-aos="fade-up" data-aos-duration="1000" class="post shadow-lg hover:shadow-none rounded-lg my-8 w-full overflow-hidden  break-inside">
<a href="blog_article?<?php echo md5($hp_id); ?>&post_key=<?php echo $hp_id; ?>" title="<?php echo $hp_title; ?>">
<!-- content -->
 <!-- post_image -->
 <div class="post__image w-full  lg:h-[200px] overflow-hidden">
        <img src="images/<?php echo $hp_cim; ?>" alt="<?php echo $hp_title; ?>" class="w-full h-full  object-cover">
      </div>
<!-- post descibtion -->
<div class="dexcs my-2 px-2">
  <p class="category text-center text-red-500"><?php
  $get_cats = $db->query("SELECT * FROM tbl_categories where id=$hp_cat");
  while($row = $get_cats->fetch_assoc()) {
     $c_name = $row['name'];
    
  echo $c_name; 
  }
  ?></p>
  <h2 class="uppercase font-bold text-xl px-2"><?php echo $hp_title; ?></h2>

  <hr class="w-1/2 border-black mb-2">

<p class="synopsis text-sm md:text-xl lg:px-2">
  <?php echo substr($hp_content,0,200).''.'  ...<span class="text-xs text-red-500">read more</span>'; ?>
</p>
<p class="category text-center text-gray-500 text-xs lg:italic my-2"><?php echo $hp_date; ?>.</p>
</div>

<!-- content  -->
</a>
</div>



<!-- post template home page -->