<?php
    //Include COnstants Page
    include '../config/config.inc.php';

    if(isset($_GET['id']) && isset($_GET['cover_image'])){
        $id = $_GET['id'];
        $image_name = $_GET['cover_image'];

        //2. Remove the Image if Available
        if($image_name != ""){
            $path = "../images/".$image_name;
            $remove = unlink($path);

            if($remove==false){
                //Failed to Remove image
                $_SESSION['login'] ='
         <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error Deleting cover image. please try again.</p>
          </div>
        </div>
      </div>
         ';
                //REdirect to Manage item
                header('location:index');
                die();
            } }

        //3. Delete item from Database
        $sql = "DELETE FROM tbl_blog_posts WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage item with Session Message
        if($res==true){
            //item Deleted
            $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
  <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
  <div> 
    <p class="font-bold">SUCCESS!</p>
    <p class="text-sm">Article  Successfully Deleted.</p>
  </div>
</div>
</div>
        ';
        //Redirect to Manage Admin Page
        header('location:index');
        exit();
        }
        else{
            $_SESSION['login'] ='
            <div class="w-auto bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 my-6 px-4 py-3 shadow-md" role="alert">
           <div class="flex">
             <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
             <div>
               <p class="font-bold">Something went Wrong</p>
               <p class="text-sm">Error Deleting article. please try again.</p>
             </div>
           </div>
         </div>
            ';
                   //REdirect to Manage item
                   header('location:index');
                   die();
        }

    }
?>