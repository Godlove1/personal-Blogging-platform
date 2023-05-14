
<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';
// Start output buffering
ob_start();
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
  $name = mysqli_real_escape_string($conn, $_POST['title']);
  $category = mysqli_real_escape_string($conn, $_POST['type']);
  $desc = mysqli_real_escape_string($conn, $_POST['editor1']);
  $current_image = mysqli_real_escape_string($conn, $_POST['current_image']);
  $id = mysqli_real_escape_string($conn, $_POST['idh']);
  $stat = mysqli_real_escape_string($conn, $_POST['p_status']);
  $seo = mysqli_real_escape_string($conn,$_POST['seo']);
  
  // validate form fields
  $errors = array();

  if (empty($name)) {
    $errors[] = 'Title is required';
  }

  if (empty($desc)) {
    $errors[] = 'Content is required';
  }

  if ($category == '0') {
    $errors[] = 'Category is required';
  }

  if (!empty($_FILES['image']['name'])) {
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $temp_name = $_FILES['image']['tmp_name'];

    $allowed_types = array('image/jpeg', 'image/png', 'image/gif', 'image/webp');

    if (!in_array($image_type, $allowed_types)) {
      $errors[] = 'File type not supported. Only JPEG, PNG, GIF, and WebP images are allowed.';
    }
  }

  // if there are errors, display them and do not save to database
  if (!empty($errors)) {
    $error_message = implode('<br>', $errors);
    $_SESSION['login'] = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        '.$error_message.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  } else {
    // upload image file
    if (!empty($image_name)) {
      $parts = explode('.', $image_name);
      $ext = end($parts);
      $image_name = 'Blog_'.rand(000, 999).'.'.$ext;
      $source_path = $temp_name;
      $destination_path = '../images/'.$image_name;

      // resize image to 50% of original size
      list($width, $height) = getimagesize($source_path);
      $new_width = $width / 2;
      $new_height = $height / 2;

      if ($image_type == 'image/jpeg') {
        $source = imagecreatefromjpeg($source_path);
        $destination = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($destination, $destination_path, 50);
      } elseif ($image_type == 'image/png') {
        $source = imagecreatefrompng($source_path);
        $destination = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagepng($destination, $destination_path, 5);
      } elseif ($image_type == 'image/gif') {
        $source = imagecreatefromgif($source_path);
        $destination = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagegif($destination, $destination_path);
      } elseif ($image_type == 'image/webp') {
        $source = imagecreatefromwebp($source_path);
        $destination = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagewebp($destination, $destination_path, 50);
      }

      // delete previous image file
      if (!empty($current_image)) {
        $remove_path = '../images/'.$current_image;
        $remove = unlink($remove_path);

        if (!$remove) {
          $_SESSION['login'] = '
          <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
              <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
              <div> 
                <p class="font-bold">ERROR!</p>
                <p class="text-sm">error removing prevoius image.</p>
              </div>
            </div>
          </div>
        ';
          header('location: index');
          exit;
        }
      }
    } else {
      $image_name = $current_image;
    }

    // save to database
    $sql = "UPDATE tbl_blog_posts SET
      cat_id='$category',
      title='$name',
      cover_image='$image_name',
      post_content='$desc',
      post_status='$stat',
      post_seo='$seo'
      WHERE id='$id'
    ";
    $res = mysqli_query($conn, $sql);

    if ($res) {
      $_SESSION['login'] = '
      <div class="w-auto bg-green-100 border-t-4 border-green-500 my-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div> 
            <p class="font-bold">SUCCESS!</p>
            <p class="text-sm">Article Updated.</p>
          </div>
        </div>
      </div>
    ';
      header('location: index');
    } else {
      $_SESSION['login'] = '
      <div class="w-auto bg-red-100 border-t-4 border-red-500 my-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div> 
            <p class="font-bold">ERROR</p>
            <p class="text-sm">Error uploading edits.</p>
          </div>
        </div>
      </div>
    ';
      header('location: index');
    }
  }
}

// Flush output buffer and send output to browser
ob_end_flush();
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

<!-- footer -->


<!-- footer -->
<?php include 'partials/footer.php'; ?>