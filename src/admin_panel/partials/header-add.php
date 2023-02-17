
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/icons/favicon.png" type="image/png">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ecb4095fb.js" crossorigin="anonymous"></script>
    <!-- tailwindwind css -->
    <link rel="stylesheet" href="../css/output.css">
    <link rel="shortcut icon" href="../images/icons/favicon.png" type="image/x-icon">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- wysiwyg editor -->
    <script src="https://cdn.tiny.cloud/1/g1zemnecrffm9foubaxwbrdcn4eefyegw09o0jq6z6m923xr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <script type="text/javascript" src="tinymce/tinymce.min.js"></script> -->

    <title>Admin</title>
    <script language=JavaScript>
function reload(form){
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index?cat=' + val ;
}
</script>
</head>
<body>

    <div class="flex">
        <aside class="w-44 hidden lg:block fixed left-0 top-0 h-screen  bg-[#1D2327] py-2 pl-4">
        <ul class="mt-[80px]">
    <li class="flex  items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-globe mr-2"></i><a href="../">visit website</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-gauge mr-2"></i><a href="index">Dashboard</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-thumbtack mr-2"></i><a href="add">New Post</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-thumbtack mr-2"></i><a href="see-drafts">Drafts</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-brands fa-youtube mr-2"></i></i><a href="videos">Videos</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-address-card mr-2"></i><a href="profile">About</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-user mr-2"></i><a href="password">Password</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-regular fa-folder mr-2"></i><a href="categories">Categories</a></li>
   
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i><a href="logout">log out</a></li>
</ul>
        </aside>

        <main class="flex-1 lg:ml-44  ">
           
 <!-- header info -->
 <header class="relative w-full h-[80px] bg-[#1D2327] text-white flex justify-between items-center flex-row-reverse p-4">
<div class="website_ttitle ">
<a href="index" class="text-[2rem]" title="Massi Martha">
       <h1 class="header_h1 font-extrabold leading-tight italic "><span class="text-[#EBA826]">M</span>assi</h1>
       </a>
</div>

    <div class="menu__btn lg:hidden">
        <i class="fa-solid fa-bars font-bold text-xl" onclick="openNav()"></i>
    </div>
    
    <div>
       <p> howdy_admin</p>
    </div>


    <!-- mobile sidenave for mobile devices -->
<div class="side__nav absolute w-0 left-0 overflow-hidden transition-all ease-in-out h-screen top-0 bg-opacity-70 bg-[#1D2327]">
<div class="inner w-full h-screen flex flex-col justify-start overflow-hidden">
<!-- close menu -->
<div class="cm flex items-center justify-start">
<i class="w-10 h-10 text-center fa-solid fa-close font-bold m-4 text-2xl bg-[#2271B1]  rounded-full hover:text-red-500" onclick="closeNav()"></i>
</div>
    <!-- menu contents right here -->
<div class="w-1/2">
<ul >
    <li class="flex  items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-globe mr-2"></i><a href="../">visit website</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-gauge mr-2"></i><a href="index">Dashboard</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-thumbtack mr-2"></i><a href="add">New Post</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-thumbtack mr-2"></i><a href="see-drafts">Drafts</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-brands fa-youtube mr-2"></i></i><a href="videos">Videos</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-address-card mr-2"></i><a href="profile">About</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-user mr-2"></i><a href="password">Password</a></li>
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-regular fa-folder mr-2"></i><a href="categories">Categories</a></li>
   
    <li class="flex items-center hover:text-white hover:bg-[#2271B1] bg-[#1D2327] transition-all ease-linear w-full py-2 pl-4  text-white capitalize"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i><a href="logout">log out</a></li>
</ul>
</div>
</div>
</div>


    </header>
    <!-- /header -->


   