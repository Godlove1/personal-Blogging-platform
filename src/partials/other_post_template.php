
<!-- post-wrapper -->
<div data-aos="fade-up" data-aos-duration="1000" class="wrapper w-full h-36 flex justify-between  flex-row-reverse  lg:h-[250px] overflow-hidden my-6 shadow-md border-blue-500">

     <div class="flex w-full h-full justify-start items-center ">
     <div class=" w-full h-full p-2">
        <p class="capitalize text-[#A23445] text-sm font-medium"><?php
$get_cat = $db->query("SELECT * FROM tbl_categories WHERE id=$op_cat ");
while($row = $get_cat->fetch_assoc()) {
   echo $row['name'];
} ?></p>
       <a href="blog_article?<?php echo md5($op_id); ?>&post_key=<?php echo $op_id; ?>" title="<?php echo $op_title ?>" class="hover:text-[#A23445] transition-all ease-in">
         <h2 class="header_h1 lg:text-2xl " title="<?php echo $op_title ?>"><?php echo $op_title ?></h2>
        
       </a>
        <p class="capitalize text-xs  my-4"><?php echo $op_date ?></p>
      </div>
     </div>


      <div class=" w-1/2 lg:w-2/5 h-full overflow-hidden">
       <a class="w-full h-full" href="blog_article?cat_key=<?php echo $op_id; ?>" title="<?php echo $op_title; ?>">
        <img src="images/<?php echo $op_cim; ?>" alt="<?php echo $op_title; ?>" class="w-full h-full object-contain rounded-md">
       </a>
      </div>

    </div>