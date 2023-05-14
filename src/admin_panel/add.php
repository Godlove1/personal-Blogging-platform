<?php
// database connection file
require_once '../config/config.inc.php';
require_once 'partials/login-check.php';

// Start output buffering
ob_start();

if(isset($_POST['publish'])){
  // Get the data from the form
  $name = mysqli_real_escape_string($conn, $_POST['title']);
  $category = mysqli_real_escape_string($conn, $_POST['type']);
  $desc = mysqli_real_escape_string($conn, $_POST['editor1']);
  $stat = mysqli_real_escape_string($conn, $_POST['p_status']);
  $seo = mysqli_real_escape_string($conn, $_POST['seo']);
  
  // Check if an image is uploaded
  if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
    // Get the details of the selected image
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $image_new_name = "massiblog-" . uniqid() . ".$image_ext";

    // Compress and save the image
    $quality = 50;
    $output_dir = "../images/";
    $dst = $output_dir . $image_new_name;
    $compress_image = compress_image($tmp_name, $dst, $quality);

    if($compress_image == false) {
      // Failed to upload the image
      $_SESSION['login'] = '
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
      header('location:add');
      exit();
    }
  } else {
    // No image is uploaded
    $_SESSION['login'] = '
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Please select an image</p>
          </div>
        </div>
      </div>
    ';
    header('location:add');
    exit();
  }

  // Insert into database
  $sql = "INSERT INTO tbl_blog_posts SET
      cat_id = '$category',
      post_status = '$stat',
      title = '$name',
      post_content = '$desc',
      post_seo = '$seo',
      cover_image = '$image_new_name'
  ";
  $res = mysqli_query($conn, $sql);

  if($res == true) {
    $_SESSION['login'] = '
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div> 
            <p class="font-bold">SUCCESS!</p>
            <p class="text-sm">Article Successfully Published.</p>
          </div>
        </div>
      </div>
    ';
    header('location:index');
    exit();
  } else {
    $_SESSION['login'] = '
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div> 
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Article could not be published.</p>
          </div>
        </div>
      </div>
    ';
    header('location:add');
    exit();
  }
}

// Function to compress and save the image
function compress_image($source_url, $destination_url, $quality) {
  $info = getimagesize($source_url);

  if ($info['mime'] == 'image/jpeg') {
    $image = imagecreatefromjpeg($source_url);
  } elseif ($info['mime'] == 'image/gif') {
    $image = imagecreatefromgif($source_url);
  } elseif ($info['mime'] == 'image/png') {
    $image = imagecreatefrompng($source_url);
  }elseif ($info['mime'] == 'image/webp') {
    $image = imagecreatefromwebp($source_url);
  } else {
    $_SESSION['login'] = '
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div> 
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Invalid image type.</p>
          </div>
        </div>
      </div>
    ';
    header('location:add');
    exit();
  }

  // Save the compressed image
  imagejpeg($image, $destination_url, $quality);
  return true;
}


// Flush output buffer and send output to browser
ob_end_flush();
// header
include 'partials/header-add.php';

?>

<!-- successfull login -->
<div class="w-full justify-center items-center flex">
            <div class="w-1/2">
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            </div>
         </div>
<!-- successfull login -->

<!-- add new form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="w-full space-y-4 font-semibold" method="post" enctype="multipart/form-data">
    <!-- back btn -->
    <a href="index" class="w-auto p-1 mb-2 font-semibold bg-[#2271B1] text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a>

    <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Title</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border-b border-slate-400 rounded-lg focus:outline-none focus:border-[#2271B1]" type="text" placeholder="enter article title" name="title"  required/>
      </div>
      <!-- <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Author</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none" type="text" placeholder="price of product" name="author" required/>
      </div> -->

   <div class="lg:flex justify-around items-center">
    <div class="font-semibold">
        <label class="block mb-1" >Select Category </label>
        <select name="type" class="h-10 px-3 mb-2 text-base  font-semibold border border-slate-400 rounded-lg focus:outline-none focus:border-[#2271B1]" required>
        <?php
//Create PHP Code to display categories from Database
//1. CReate SQL to get all active categories from database
$sql = "SELECT * FROM tbl_categories";
//Executing qUery
$res = mysqli_query($conn, $sql);
//Count Rows to check whether we have categories or not
$count = mysqli_num_rows($res);
//IF count is greater than zero, we have categories else we donot have categories
if($count>0){//WE have categories
while($row=mysqli_fetch_assoc($res)){
//get the details of categories
$id = $row['id'];
$title = $row['name'];?>
<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
<?php } }else{//WE do not have category?>
<option value="0">No Category Found</option>
<?php
} ?>
              </select>
      </div>

      <div class="font-semibold my-4">
        <label class="block mb-1 text-gray-500" >Post Status </label>
       <div class="flex lg:block mb-2">
     <p>
     <input type="radio" name="p_status" value="1" checked><span>Publish</span>
     </p>
     <p class="mx-4">
     <input type="radio" name="p_status" value="0"><span>Save as Draft</span>
     </p>
       </div>
      </div>

      <div class="font-semibold">
        <label class="block mb-1 " for="forms-labelOverInputCode">Cover Image </label>
     <div class="flex items-center">
     <img src="../images/logos/l5.png" alt="prdo_image" class="w-[200px] h-[100px] rounded-md object-contain border border-slate-500" id="imgDisplay">
     <input class="w-full h-10 px-3 focus:outline-none file:border-0  file:rounded-full file:text-sm file:font-semibold file:bg-[#2271B1] file:text-white" type="file" name="image" onChange="displayImage(this)" required/>
     </div>
      </div>
</div>

<div class="">
        <label class="font-semibold"  for="forms-labelOverInputCode">Article SEO <span class="text-xs italic">(keywords only,comma separated words)</span> </label>
    
        <input name="seo" class="w-full h-10 px-3 text-base placeholder-gray-300 border border-slate-400 rounded-lg focus:outline-none"/>
      </div>

    <div class="font-semibold">
        <label class="block mb-1" for="forms-labelOverInputCode">Post Content</label>
        <textarea id="editor1" name="editor1" class="border border-slate-500"></textarea>
      </div>

   <div class="w-full flex justify-center items-center my-8 ">
   <input class="w-1/2 p-2 font-semibold bg-[#2271B1] text-white rounded-lg cursor-pointer focus:outline-none" type="submit" name="publish" value="Publish" title="Publish article"/>

   </div>
   
  </form>
</div>




<!-- yinymce init -->
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link image lists paste table',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | table',
        menubar: false,
        branding: false,
        statusbar: false,
        height: 200,
        resize: 'both',
        image_title: true,
        image_caption: true,
        link_title: true,
        link_assume_external_targets: true,
        convert_urls: false,
        target_list: false,
        rel_list: false,
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Responsive', value: 'img-fluid'},
            {title: 'Rounded', value: 'rounded'},
            {title: 'Circle', value: 'rounded-circle'},
            {title: 'Thumbnail', value: 'img-thumbnail'}
        ],
        image_dimensions: false,
        image_advtab: false,
        image_description: false,
        image_uploadtab: false,
        images_upload_url: 'your-image-upload-handler',
        paste_as_text: true,
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        paste_data_images: true,
        table_default_attributes: {
            border: '1'
        },
        table_default_styles: {
            'border-collapse': 'collapse'
        },
        table_responsive_width: true,
        table_appearance_options: false
    });
</script>
<?php include 'partials/footer.php'; ?>