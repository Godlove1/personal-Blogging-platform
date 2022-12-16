
<!-- post template home page -->
<div class="post border-8 border-pink-500 lg:w-[240px] lg:h-[240px] lg:overflow-hidden m-2">
<a href="blog_article?<?php echo md5($hp_id); ?>&post_key=<?php echo $hp_id; ?>" title="<?php echo $hp_title; ?>">
<!-- content -->
 <!-- post_image -->
 <div class="post__image w-full lg:h-[200px] overflow-hidden">
        <img src="images/<?php echo $hp_cim; ?>" alt="<?php echo $hp_title; ?>" class="w-full h-full  object-cover">
      </div>
<!-- post descibtion -->
<div class="dexcs my-2">
  <p class="category"><?php echo $hp_cat; ?></p>
  <h2 class="uppercase font-extralight text-xl"><?php echo $hp_title; ?></h2>
<p class="synopsis">
  <?php echo substr($hp_content,0,30); ?>
</p>
</div>

<!-- content  -->
</a>
</div>



<!-- post template home page -->