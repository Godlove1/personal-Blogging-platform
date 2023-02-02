

  <!--template-->
  <tr class="even:bg-[#F6F7F7] odd:bg-white p-2">
<td class="text-center"><?php echo $sn++; ?></td>
<td class="w-[200px] lg:w-[500px] flex justify-start items-center">
    
    <div class="flex-shrink-0 w-20 h-20 p-2 overflow-hidden">
        <img class="w-20 h-20 object-contain" src="<?php echo $c_img; ?>"
            alt="<?php echo $name; ?>">
    </div>
    
    <div class="ml-2 lg:break-words">
        <div class="text-sm  ">
        <?php echo $name; ?>
        </div>
    </div>
   
</td>
<td class="px-2 text-center font-semibold"><?php 
 $get_cat="SELECT * FROM tbl_categories where id=$categ";
 foreach ($db->query($get_cat) as $ca) {
   echo ucwords($ca['name']);
  }
       ?></td>

<td class="px-2 text-center break-all"><?php echo $date; ?></td>

<td class="break-words"> 
<a href="see-drafts?publish_key=<?php echo $id; ?>" class="p-1 bg-green-500 text-white rounded font-semibold" target="_blank">Publish</a>
<a href="edit_post?id=<?php echo $id; ?>" class="p-1 bg-[#2271B1] text-white rounded ml-2 font-semibold">EDIT</a>
<a href="delete?id=<?php echo $id; ?>&cover_image=<?php echo $c_img; ?>" onclick="confirm('Are you sure to Delete this Article?')" class="p-1 bg-[#A23445] text-white rounded ml-2 font-semibold">DELETE</a>
  
</td>
</tr>
                <!--template-->