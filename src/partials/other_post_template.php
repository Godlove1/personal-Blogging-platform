
<!-- post-wrapper -->
<div data-aos="fade-up" data-aos-duration="1000" class="wrapper w-full flex justify-between max-h-[150px] overflow-hidden border-b border-slate-600 mb-4">
      <div class="data-s w-full">
        <p class="capitalize text-red-500 text-xs font-medium"><?php
$get_cat = $db->query("SELECT * FROM tbl_categories WHERE id=$op_cat ");
while($row = $get_cat->fetch_assoc()) {
   echo $row['name'];
} ?></p>
       <a href="blog_article?<?php echo md5($op_id); ?>&post_key=<?php echo $op_id; ?>" title="<?php echo $op_title ?>" class="hover:text-red-500 transition-all ease-in">
         <h3 class="text-sm "><?php echo $op_title ?></h3>
       </a>
        <p class="capitalize text-xs text-slate-600 my-4"><?php echo $op_date ?></p>
      </div>
      <div class="img w-2/5 h-[100px] overflow-hidden rounded-md mb-2">
       <a href="blog_article?cat_key=<?php echo $op_id; ?>" title="<?php echo $op_title; ?>">
        <img src="images/<?php echo $op_cim; ?>" alt="<?php echo $op_title; ?>" class="w-full h-full object-cover">
       </a>
      </div>
    </div>