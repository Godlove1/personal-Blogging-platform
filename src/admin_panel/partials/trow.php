

  <!--template-->
  <tr>
<td class="text-center"><?php echo $sn++; ?></td>
<td class="flex justify-start items-center">
    
    <div class="flex-shrink-0 w-10 h-10">
        <img class="w-10 h-10" src="<?php echo $c_img; ?>"
            alt="<?php echo $name; ?>">
    </div>
    <div class="ml-2">
        <div class="text-sm font-semibold leading-5 ">
        <?php echo substr($name,0,50). "..."; ?>
        </div>
    </div>
   
</td>
<td class="px-2 text-center font-semibold"><?php 
 $get_cat="SELECT * FROM tbl_categories where id=$categ";
 foreach ($db->query($get_cat) as $ca) {
   echo ucwords($ca['name']);
  }
       ?></td>
<td class="px-2 text-center font-semibold"> <a href="see-comments?com_id=<?php echo $id; ?>" title="comments" class="underline"> <?php
                        //Sql Query
    $getcom = "SELECT * FROM tbl_comments WHERE post_id=$id";
                        //Execute Query
                        $comnum = mysqli_query($conn, $getcom);
                        //Count Rows
                        $countcom = mysqli_num_rows($comnum);
                        echo $countcom;
                    ?><i class="fa-brands ml-2 fa-readme"></i></a></td>
<td class="flex justify-center items-center"> 
<a href="../blog_article?post_key=<?php echo $id; ?>" class="p-1 bg-green-500 text-white rounded font-semibold" target="_blank">VIEW</a>
<a href="edit?id=<?php echo $id; ?>" class="p-1 bg-teal-500 text-white rounded ml-2 font-semibold">EDIT</a>
<a href="delete?id=<?php echo $id; ?>&cover_image=<?php echo $c_img; ?>" onclick="confirm('Are you sure to Delete this Article?')" class="p-1 bg-red-500 text-white rounded ml-2 font-semibold">DELETE</a>
  
</td>
</tr>
                <!--template-->