
<?php
include('config/config.inc.php');
                    
$post_key=$_SESSION['post_key'];
$comment=mySQLi_query($conn,"SELECT * from tbl_comments  where post_id=$post_key order by id ASC");
if(mysqli_num_rows($comment)>0){
while($row=mySQLi_fetch_array($comment)){
$comment_id=$row['id'];
$comment_content=$row['comment'];
$name=$row['username'];
$c_date=$row['date']
?>
<!-- comment template -->
<div  class="comment my-4 p-2 lg:w-[400px]">
    <p class="border-b capitalize font-bold first-letter:text-[#A23445] first-letter:text-xl"><?php echo $name; ?></p>
    <p class="italic text-sm"><i class="fa-solid text-xs fa-quote-left"></i>
    <?php echo $comment_content; ?>
        <i class="fa-solid text-xs fa-quote-right"></i></p>

         <!-- replybox -->
        <!-- <div class="rep w-[250px] my-2">
            <p id="reply" class="hover:text-[#A23445] cursor-pointer">reply<i class="fa-solid ml-2 fa-reply"></i></p>
        </div> -->
        <!-- replytextbox-->
        <!-- <div class="tbox">
            <form action="" method="post" class="flex justify-center items-center">
                <textarea name=""  cols="30" rows="1" class="border-2 rounded-lg focus:outline-none"></textarea> -->
                <!-- <input type="hidden" name="replier"> -->
                <!-- <input type="submit" value="send" name="reply" class="bg-[#A23445] text-white px-4 w-[100px] ml-2 rounded-md hover:bg-white hover:text-[#A23445]">
            </form>
        </div> -->
            <!-- admins reply -->
            <!-- <div class="areply">
              <p class="text-xs italic">from author:</p>
              <p class="italic text-sm text-[#A23445] text-left">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum eos architecto magni dolore quod nisi similique cupiditate necessitatibus repudiandae expedita temporibus veniam explicabo possimus, sunt itaque voluptatem doloremque, reiciendis omnis!.
                  </p>
            </div> -->
</div>
<!-- comment template -->
<?php }}else{
?>

<!-- no comments -->
<div class="text-center italic text-sm">
    <i class="fa-regular fa-comments mx-2"></i> <span>be the first to air your thoughts</span>
</div>

<?php
}
?>