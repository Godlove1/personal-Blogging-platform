

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<!-- dynamic header -->
<?php
    $url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$str = $parts['path'];

// Getting the current page URL
$cur_page = substr($str,strrpos($str,"/")+1);

if($cur_page == 'blog_article'){
  ?>

    <title><?php  echo $title; ?></title>

  <meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:type" content="article" />
<!-- <meta property="og:description" content="<?php// echo $desc; ?>" />
<meta name="description" content="<?php// echo $desc; ?>" /> -->
<meta name="keywords" content="<?php echo $seo; ?>" />
<meta property="og:image" content="https://www.massimartha.blog/images/<?php echo $cover_image; ?>"/>
<meta property="og:url" content="https://www.massimartha.blog/blog_article?<?php echo md5($blog_id); ?>&post_key=<?php echo $blog_id; ?>" />


<?php
    }else{
        ?>

       <title>Massi Martha | Fashion,News & Entertainment</title>

<!-- SEO -->
<meta name="description" content="Hey hey! What's good? It's your girl Massi Martha, I'm a creative at heart and love expressing myself through art and writing. Travelling is my jam, and let me tell you, this world is seriously beautiful. I'm just here to chat, share some laughs, and catch the vibe. Feel free to hit me up and let's vibe together!" />
<meta name="keywords" content=" massi martha, massi amrtha vlogs, creation high, youtuber, traveling, lifestyle,entertainment, beauty, travel blogger" />

	<link rel="canonical" href="https://www.massimartha.blog/index" />
	<meta property="og:locale" content="en_US" />
<meta property="og:title" content="Massi Martha"/>
<meta property="og:type" content="article" />
<meta property="og:description" content="Hey hey! What's good? It's your girl Massi Martha, I'm a creative at heart and love expressing myself through art and writing. Travelling is my jam, and let me tell you, this world is seriously beautiful. I'm just here to chat, share some laughs, and catch the vibe. Feel free to hit me up and let's vibe together!" />
<meta property="og:image" content="https://www.massimartha.blog/images/icons/favicon.png">
<meta property="og:url" content="https://www.massimartha.blog" />

    <?php
    }
?>
 
<meta name="twitter:card" content="summary_large_image"/>
<!--  Non-Essential, But Recommended -->
<meta property="og:site_name" content="Massi Martha."/>

</head>
<body>
    
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0" nonce="urolNGXm"></script>




    <!-- logo/mobile -->
    <div class="lg:hidden w-full flex justify-center items-center p-2  text-white bg-[#921125]">
    
       <a href="index" class="text-[2.5rem]" title="Massi Martha">
       <h1 class="header_h1 font-extrabold leading-tight italic "><span class="text-[#EBA826]">M</span>assi</h1>
       </a>

       <!-- <div class="flex items-center p-2 cursor-pointer bg-[#A23445]">
        <p>SUBSCRIBE  </p>
        <a href="<?php// echo $yt; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-youtube"></i></a>
       </div> -->

      </div>

      <!-- logo/laptop-->
    <div class="hidden lg:flex logo w-full  justify-around py-6 px-10 text-white bg-[#921125] items-center">
      <!-- social medias -->
    <div class="flex justify-around items-center">
      <?php
      $results = $db->query("SELECT * FROM tbl_about");
      if($row = $results->fetch_assoc()) {
      $fb = $row['fb'];
      $tw=$row['tw'];
      $yt=$row['yt'];
      $ig=$row['ig'];
      }
          ?>
            <a href="<?php echo $fb; ?>"class="mx-2 rounded-full flex items-center p-2 bg-[#A23445] "><i class=" text-xl transition-all ease-linear fa-brands fa-facebook"></i></a>
           <a href="<?php echo $tw; ?>" class="mx-2 p-2 rounded-full flex items-center bg-[#A23445] "><i class=" text-xl transition-all ease-linear fa-brands fa-twitter"></i></a>
           <a href="<?php echo $ig; ?>" class="mx-2 p-2 rounded-full flex items-center bg-[#A23445] "><i class=" text-xl transition-all ease-linear fa-brands fa-instagram"></i></a>
        
           </div>

       <a href="index" class="text-[3rem]">
       <h1 class="header_h1 font-extrabold leading-tight italic "><span class="text-[#EBA826]">M</span>assi</h1>
       </a>

       <div title="subscribe to our youtube" class="flex items-center p-2 cursor-pointer bg-[#A23445]">
        <p>SUBSCRIBE  </p>
        <a href="<?php echo $yt; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-youtube" title="subscribe to our youtube"></i></a>
       </div>

      </div>

      <!-- HEADER -->
     <!-- mobile menu -->
<div class="mobile__menu bg-[#921125] lg:hidden sticky top-0 z-40  flex justify-between items-center text-white p-2">
    <div class="menu__btn">
      <i title="menu" class="fa-solid fa-bars text-xl font-bold cursor-pointer transition-all ease-in-out hover:animate-pulse " onclick="openNav()"></i>
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
      <a href="<?php echo $fb; ?>"class="mx-2 rounded-full flex items-center p-2 bg-[#A23445] "><i class="transition-all ease-linear fa-brands fa-facebook"></i></a>
     <a href="<?php echo $tw; ?>" class="mx-2 rounded-full flex items-center p-2 bg-[#A23445] "><i class="transition-all ease-linear fa-brands fa-twitter"></i></a>
     <a href="<?php echo $ig; ?>" class="mx-2 rounded-full flex items-center p-2 bg-[#A23445] "><i class="transition-all ease-linear fa-brands fa-instagram"></i></a>
     <a href="<?php echo $yt; ?>" class="mx-2 rounded-full flex items-center p-2 bg-[#A23445] "><i class="transition-all ease-linear fa-brands fa-youtube"></i></a>
     </div>
</div>

    <!-- mobile menu (sidebar) -->
    <div id="mobiside" class="mobile__sidebar fixed w-0  h-screen  overflow-hidden z-50 top-0 lg:hidden bg-slate-800 bg-opacity-80">
        <div class="w-full h-full border-2 ">
         
        <!-- menu-items -->
        <div class="menu__item w-3/5  text-white bg-[#921125] h-full relative">
           <!-- close button -->
        <div class="close__mo_side p-2 absolute right-[-30px]">
          <center><i class="fa-solid fa-xmark w-5 h-5 text-xl font-bold transition-all ease-in-out hover:text-[#A23445] bg-white text-black rounded-lg shadow-md" onclick="closeNav()"></i></center>
        </div>

        <!-- mobile menu logo -->
        <div class="w-full  text-center pb-12 ">
          <!-- <img src="images/logos/l5.png" alt="mmb" class="pt-4 mb-4"> -->
          <a href="index" class="text-[2rem]" title="Massi Martha">
       <h1 class="header_h1 text-[#EBA826] font-extrabold leading-tight italic "><span class="text-white">M</span>assi</h1>
       </a>
          <div class="flex justify-around items-center mt-4">
            <a href="<?php echo $fb; ?>"class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-facebook"></i></a>
           <a href="<?php echo $tw; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-twitter"></i></a>
           <a href="<?php echo $ig; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-instagram"></i></a>
           <a href="<?php echo $yt; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-youtube"></i></a>
           </div>
        </div>

      <!-- menu intems -->
<ul class="">
  <li class="border-b border-white p-4 transition-all ease-in-out hover:bg-[#A23445] hover:text-white "><a href="index" class=" uppercase">home</a></li>

  <?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC");
while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<li class="border-b  border-white rounded-lg p-4 transition-all ease-in-out hover:bg-white hover:text-[#A23445]"><a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat=<?php echo $c_id; ?>" class="  uppercase"><?php echo $c_name; ?></a></li>

<?php } ?>

  <li class="border-slate-500 p-4 transition-all ease-in-out hover:bg-[#A23445] hover:text-white"><a href="admin_panel" class="uppercase">Log in</a></li>
</ul>

        </div>
       
        </div>
        </div>

          <!--laptop menu -->
        <div class="large__screen shadow-lg sticky top-0 z-50 hidden bg-white lg:flex justify-between items-center">
          <ul class="w-full h-full flex justify-center items-center">
<li class="p-4 h-full transition-all ease-in-out hover:text-[#A23445]"><a href="index" class=" uppercase">home</a></li>

<?php
$get_cats = $db->query("SELECT * FROM tbl_categories order by id ASC limit 0,5");

while($row = $get_cats->fetch_assoc()) {
   $c_id = $row['id'];
   $c_name = $row['name'];
    ?>

<li class="p-4 h-full transition-all ease-in-out hover:text-[#A23445]"><a href="all-articles?<?php echo $c_name.''.md5($c_name); ?>&cat_key=<?php echo $c_id; ?>" class="uppercase"><?php echo $c_name; ?></a></li>

<?php } ?>

<li class="p-4 h-full transition-all ease-in-out  hover:text-[#A23445]"><a href="" class=" uppercase">contact</a></li>
          </ul>
          <!-- <div class="w-1/2 flex justify-around items-center">
            <a href="<?php //echo $fb; ?>"class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-facebook"></i></a>
           <a href="<?php //echo $tw; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-twitter"></i></a>
           <a href="<?php //echo $ig; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-instagram"></i></a>
           <a href="<?php// echo $yt; ?>" class="mx-2"><i class="hover:text-[#A23445] transition-all ease-linear fa-brands fa-youtube"></i></a>
           </div> -->
        </div>
        <!-- laptop menu -->
<!-- /HEADER -->