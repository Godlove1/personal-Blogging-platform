
<?php 
include 'config/config.inc.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

<!-- SEO -->
<meta name="description" content="Travel Photographer and Travel Blogger focused on Asia, Europe &amp; Australia. Travel guides, tips and stories to plan your next adventure." />
	<link rel="canonical" href="https://www.massimartha.blog/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Massi Martha | Travel Blog " />
	<meta property="og:url" content="https://www.massimartha.blog/" />
	<meta property="og:site_name" content="Massi Martha" />
	<meta property="article:publisher" content="http://www.facebook.com/massimartha" />
<meta property="og:type" content="article" />
<meta property="og:image" content="https://www.massimartha.blog/images/logos/l2.png">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:description" content="Travel Photographer and Travel Blogger focused on Asia, Europe &amp; Australia. Travel guides, tips and stories to plan your next adventure." />

    <!-- compiled css link -->
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="images/icons/favicon.png" type="image/x-icon">
    <!-- fontawesome link -->
   <script src="https://kit.fontawesome.com/3ecb4095fb.js" crossorigin="anonymous"></script>
   <!-- aos css -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <!-- loadmore script -->
  <script src="js/loadmore.js"></script>
  
<script language=JavaScript>
function reload(form){
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='all-articles?cat=' + val ;
}
</script>
    <title>Massi Martha's Blog | Travel , Fashion & Lifestyle</title>

</head>
<body>
    
    <!-- logo -->
    <div class="logo w-full flex justify-center items-center">
       <a href="index">
        <img src="images/logos/l5.png" alt="NassiMartha" class="w-full h-full object-cover lg:object-contain ">
       </a>
      </div>

      <!-- HEADER -->
     <!-- mobile menu -->
<div class="mobile__menu bg-white lg:hidden sticky top-0 z-40  flex justify-between items-center p-2">
    <div class="menu__btn">
      <i class="fa-solid fa-bars text-xl font-bold cursor-pointer transition-all ease-in-out hover:text-red-500" onclick="openNav()"></i>
    </div>
    <div class="flex justify-around items-center">
      
<?php
$results = $db->query("SELECT * FROM tbl_about");
if($row = $results->fetch_assoc()) {
$abt=$row['aboutus'];
$fb = $row['fb'];
$tw=$row['tw'];
$yt=$row['yt'];
$ig=$row['ig'];
$pp=$row['pp'];
}
    ?>
      <a href="<?php echo $fb; ?>"class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-facebook"></i></a>
     <a href="<?php echo $tw; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-twitter"></i></a>
     <a href="<?php echo $ig; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-instagram"></i></a>
     <a href="<?php echo $yt; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-youtube"></i></a>
     </div>
</div>

    <!-- mobile menu (sidebar) -->
    <div id="mobiside" class="mobile__sidebar fixed w-0  h-screen   overflow-hidden z-50 top-0 lg:hidden bg-slate-800 bg-opacity-80">
        <div class="w-full h-full border-2 ">
         
        <!-- menu-items -->
        <div class="menu__item w-1/2 bg-white h-full relative">
           <!-- close button -->
        <div class="close__mo_side p-2 absolute right-[-30px]">
          <center><i class="fa-solid fa-xmark w-5 h-5 font-bold transition-all ease-in-out hover:text-red-500 bg-white text-black rounded-lg shadow-md" onclick="closeNav()"></i></center>
        </div>

        <!-- mobile menu logo -->
        <div class="w-full h-[120px] mb-8">
          <img src="images/logos/l5.png" alt="mmb" class="pt-4 mb-4">
          <div class="flex justify-around items-center">
            <a href="<?php echo $fb; ?>"class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-facebook"></i></a>
           <a href="<?php echo $tw; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-twitter"></i></a>
           <a href="<?php echo $ig; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-instagram"></i></a>
           <a href="<?php echo $yt; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-youtube"></i></a>
           </div>
        </div>

      <!-- menu intems -->
<ul class="">
  <li class="border-b border-slate-500 p-4 transition-all ease-in-out hover:bg-slate-500 hover:text-white "><a href="index" class="font-thin text-slate-400 uppercase">home</a></li>

  <?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC");
while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<li class="border-b  border-slate-500 p-4 transition-all ease-in-out hover:bg-slate-500 hover:text-white"><a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat=<?php echo $c_id; ?>" class=" font-thin text-slate-400 uppercase"><?php echo $c_name; ?></a></li>

<?php } ?>

  <li class="border-b  border-slate-500 p-4 transition-all ease-in-out hover:bg-slate-500 hover:text-white"><a href="" class="font-thin text-slate-400 uppercase">contact</a></li>
</ul>

        </div>
       
        </div>
        </div>

          <!--laptop menu -->
        <div class="large__screen border-t-2 border-b-2 border-black sticky top-0 z-50 hidden bg-white lg:flex justify-between items-center">
          <ul class="w-full h-full flex justify-evenly items-center">
<li class="p-4 h-full transition-all ease-in-out hover:bg-slate-500 hover:text-white"><a href="index" class=" font-thin text-slate-400 uppercase">home</a></li>

<?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC limit 0,5");

while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<li class="p-4 h-full transition-all ease-in-out hover:bg-slate-500 hover:text-white"><a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat_key=<?php echo $c_id; ?>" class="font-thin text-slate-400 uppercase"><?php echo $c_name; ?></a></li>

<?php } ?>

<li class="p-4 h-full transition-all ease-in-out hover:bg-slate-500 hover:text-white"><a href="" class="font-thin text-slate-400 uppercase">contact</a></li>
          </ul>
          <div class="w-1/2 flex justify-around items-center">
            <a href="<?php echo $fb; ?>"class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-facebook"></i></a>
           <a href="<?php echo $tw; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-twitter"></i></a>
           <a href="<?php echo $ig; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-instagram"></i></a>
           <a href="<?php echo $yt; ?>" class="mx-2"><i class="hover:text-red-500 transition-all ease-linear fa-brands fa-youtube"></i></a>
           </div>
        </div>
        <!-- laptop menu -->
<!-- /HEADER -->