
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

// query selected Article for editing
if(isset($_GET['id'])){
  //Get all the details
  $id = $_GET['id'];
  //SQL Query to Get the Selected Food
  $sql2 = "SELECT * FROM tbl_blog_posts WHERE id=$id";
  //execute the Query
  $res2 = mysqli_query($conn, $sql2);
  //Get the value based on query executed
  $row = mysqli_fetch_assoc($res2);
  //Get the Individual Values of Selected Food
    $id = $row['id'];
    $name = $row['title'];
    $c_image  = '../images/'.$row['cover_image'];
    $current_image  = $row['cover_image'];
    $categ = $row['cat_id'];
  $pdesc = $row['post_content'];
  $status=$row['post_status'];
  $seoo = $row['post_seo'];
 
}
 
// save edited artcile
//save to db
if(isset($_POST['save_item'])){
  $name = $_POST['title'];
   $category = $_POST['type'];
   $desc = $_POST['editor1'];
   $current_image = $_POST['current_image'];
  $id=$_POST['idh'];
  $stat=$_POST['p_status'];
  $seo = mysqli_real_escape_string($conn,$_POST['seo']);

  //2. Upload the image if selected
  if(isset($_FILES['image']['name'])){
      $image_name = $_FILES['image']['name']; //New Image NAme
      if($image_name!=""){
          $ext = end(explode('.', $image_name)); //Gets the extension of the image
          $image_name = "editedmartha-".rand(0000, 9999).'.'.$ext; //THis will be renamed image
          //Get the Source Path and DEstination PAth
          $src_path = $_FILES['image']['tmp_name']; //Source Path
          $dest_path = "../images/".$image_name; //DEstination Path
          //Upload the image
          $upload = move_uploaded_file($src_path, $dest_path);
          /// CHeck whether the image is uploaded or not
          if($upload==false){
              //FAiled to Upload
              $_SESSION['login'] ='
              <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
             <div class="flex">
               <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
               <div>
                 <p class="font-bold">Something went Wrong</p>
                 <p class="text-sm">Error uploading picture</p>
               </div>
             </div>
           </div>
              ';
           header('location:index');
           exit();
              //STop the process
          }
          //3. Remove the image if new image is uploaded and current image exists
          //B. Remove current Image if Available
          if($current_image!=""){
              $remove_path = "../images/".$current_image;
              $remove = unlink($remove_path);
              //Check whether the image is removed or not
              if($remove==false){
                  //failed to remove current image
                  $_SESSION['login'] ='
                  <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                 <div class="flex">
                   <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                   <div>
                     <p class="font-bold">Something went Wrong</p>
                     <p class="text-sm">Error Removing current picture</p>
                   </div>
                 </div>
               </div>
                  ';
               header('location:index');
               exit();
                  //STop the process
              }
          }
      }else{
          $image_name = $current_image; //Default Image when Image is Not Selected
      }
  }else{
      $image_name = $current_image; //Default Image when Button is not Clicked
  }
  //4. Update the Food in Database
  $sql3 = "UPDATE tbl_blog_posts SET
       title = '$name',
      cat_id = '$category',
      post_status=$stat,
      post_content= '$desc',
      post_seo='$seo',
      cover_image = '$image_name'

      WHERE id=$id
  ";

  //Execute the SQL Query
  $res3 = mysqli_query($conn, $sql3);

  //CHeck whether the query is executed or not
  if($res3==true){
      //Query Exectued and Food Updated
      $_SESSION['login'] = ' 
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div> 
          <p class="font-bold">SUCCESS!</p>
          <p class="text-sm">Article Successfully Updated.</p>
        </div>
      </div>
      </div>
      ';
      header('location:index');
      exit();
  }
  else{
      //Failed to Update Food
      $_SESSION['login'] ='
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
     <div class="flex">
       <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
       <div>
         <p class="font-bold">Something went Wrong</p>
         <p class="text-sm">Error Editing Article</p>
       </div>
     </div>
   </div>
      ';
   header('location:index');
   exit();
  }
}



// header
include 'partials/header-add.php';


?>

<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class=" w-full space-y-4 font-semibold" method="post" enctype="multipart/form-data">
<div class="text-center">
<p class="text-3xl underline">Edit</p>

</div>
<!-- back button -->
<p id="go-back" class="w-[100px] cursor-pointer p-1 mb-2 font-semibold bg-[#2271B1] text-white rounded-lg focus:shadow-outline"><i class="fa-solid fa-left-long mr-2"></i>Go Back</p>

    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Title</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border-b border-slate-400 rounded-lg focus:shadow-outline focus:border-[#2271B1]" type="text" value="<?php echo $name; ?>" name="title"/>
      </div>
     
      <div class="cat w-full lg:flex justify-around items-center">
    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" >Select Category </label>
        <select name="type" class=" h-10 px-3 mb-2 text-base  font-semibold border border-slate-400 rounded-lg focus:shadow-outline focus:border-[#2271B1]">
        <?php 
//Query to Get ACtive Categories
$sql = "SELECT * FROM tbl_categories";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Count Rows
$count = mysqli_num_rows($res);
//Check whether category available or not
if($count>0){
//CAtegory Available
while($row=mysqli_fetch_assoc($res)){
$category_title = $row['name'];
$category_id = $row['id'];
?>
<option <?php if($categ==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
<?php } } else {//CAtegory Not Available
echo "<option value='0'>Category Not Available.</option>";
                            }
                        ?>
              </select>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" >Post Status </label>
       <div class="flex lg:block mb-2">
     <p>
     <input type="radio" name="p_status" value="1"  <?php if($status==1){echo "checked";} ?>><span>Publish(ed)</span>
     </p>
     <p class="mx-4">
     <input type="radio" name="p_status" value="0"  <?php if($status==0){echo "checked";} ?>><span>Draft</span>
     </p>
       </div>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Current cover Image </label>
       <img src="<?php echo $c_image; ?>" alt="prdo_image" class="w-[200px] h-[100px] rounded-md object-contain border border-slate-500" id="imgDisplay">
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Change cover Image </label>
        <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-[#2271B1] file:text-white" type="file" name="image" onChange="displayImage(this)"/>
      </div>
      </div>


      <div class="">
        <label class="font-semibold"  for="forms-labelOverInputCode">Article SEO <span class="text-xs italic">(keywords only,comma separated words)</span> </label>
    
        <input name="seo" value="<?php echo $seoo; ?>" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"/>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Post content</label>
        <textarea id="editor1" name="editor1"><?php echo $pdesc; ?></textarea>
      </div>


      <input type="hidden" name="idh" value="<?php echo $id; ?>">
<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
    
    <div class="flex justify-center items-center my-6">
    <input class="w-1/2 lg:w-[200px] cursor-pointer h-10 px-3 mb-2 font-semibold bg-[#2271B1] text-white  rounded-lg focus:shadow-outline" type="submit" name="save_item" value="Update" />

   </div>

  </form>
</div>




<!-- tinymce init -->
<script>
      // TinyMCE CMS Starter Config
      // Quick start video - https://www.youtube.com/watch?v=cbkrZMbVF60

      tinymce.init({
        // Select the element(s) to add TinyMCE to using any valid CSS selector
        selector: 'textarea',

        // Tip - To keep TinyMCE lean, only include the plugins you need.
        plugins: `a11ychecker advcode advlist advtable anchor autocorrect autosave editimage image link linkchecker lists media mediaembed pageembed powerpaste searchreplace table template tinymcespellchecker visualblocks wordcount`,
        // Configure the toolbar so it fits your app. There are many
        // different configuration options available:
        // https://www.tiny.cloud/docs/tinymce/6/toolbar-configuration-options/
        toolbar: 'undo redo | styles | bold italic underline strikethrough | align | table link image media pageembed | bullist numlist outdent indent | spellcheckdialog a11ycheck code',

        // The Accessibility Checker plugin offers extensive controls over which
        // level of compliance to test against and which rules to enforce.
        // https://www.tiny.cloud/docs/tinymce/6/a11ychecker/
        a11ychecker_level: 'aaa',

        // Configure the style menu and define available formats
        // Here, we have defined a medium sized image format as an example.
        // There is a lot more you can do with formats:
        // https://www.tiny.cloud/docs/tinymce/6/filter-content/
        style_formats: [
          {title: 'Heading 1', block: 'h1'},
          {title: 'Heading 2', block: 'h2'},
          {title: 'Paragraph', block: 'p'},
          {title: 'Blockquote', block: 'blockquote'},
          {title: 'Image formats'},
          {title: 'Medium', selector: 'img', classes: 'medium'},
        ],

        // Turn off manual resizing of images as we want to control image sizes
        // using the formats previously specified.
        // https://www.tiny.cloud/docs/tinymce/6/content-behavior-options/#object_resizing
        object_resizing: true,

        // TinyMCE offers a wide range of options to control what classes, styles
        // and attributes are allowed in the content. All other classes will be
        // filtered out.
        // https://www.tiny.cloud/docs/tinymce/6/content-filtering/#valid_classes
        valid_classes: {
          'img': 'medium',
          'div': 'related-content'
        },

        // Enable image fig captions
        // https://www.tiny.cloud/docs/tinymce/6/image/#image_caption
        image_caption: true,

        // Templates is useful for when users need to insert repeatable content,
        // for example a related content block.
        // https://www.tiny.cloud/docs/tinymce/6/template/
        templates: [
          {
            title: 'Related content',
            description: 'This template inserts a related content block',
            content: '<div class="related-content"><h3>Related content</h3><p><strong>{$rel_lede}</strong> {$rel_body}</p></div>'
          }
        ],

        // This option makes it easy to inject dynamic content into the template.
        template_replace_values: {
          rel_lede: 'Lorem ipsum',
          rel_body: 'dolor sit amet...',
        },

        // Specifies the dynamic content inside the insert template dialog preview
        template_preview_replace_values: {
          rel_lede: 'Lorem ipsum',
          rel_body: 'dolor sit amet...',
        },

        // Prevent editing of the related content block by making the whole
        // block noneditable.
        // https://www.tiny.cloud/docs/tinymce/6/content-behavior-options/#noneditable_class
        noneditable_class: 'related-content',

        // TinyMCE supports multilingual content. By defining the language
        // not only are you helping with accessibility, the spellchecker plugin
        // also switches language.
        // https://www.tiny.cloud/docs/tinymce/6/content-localization/#content_langs
        content_langs: [
          {title: 'English (US)', code: 'en_US'},
          {title: 'French', code: 'fr'}
        ],

        // Specify the height of the editor, including toolbars and the statusbar.
        // https://www.tiny.cloud/docs/tinymce/6/customize-ui/#changing-editor-height-and-width
        height: 540,

        // The following css will be injected into the editor, extending
        // the default styles.
        // In a real world scenario, it's recommended to use the content_css
        // option to load a separate CSS file. This makes editing easier too.
        // https://www.tiny.cloud/docs/tinymce/6/add-css-options/
        content_style: `
          img {
            height: auto;
            margin: auto;
            padding: 10px;
            display: block;
          }
          img.medium {
            max-width: 25%;
          }
        `

        // Next step: Check out Tiny Drive for easy cloud storage of your users'
        // images and media. Integrates seamlessly with TinyMCE.
        // https://www.tiny.cloud/drive/
      });
    </script>

<!-- footer -->


<!-- footer -->
<?php include 'partials/footer.php'; ?>