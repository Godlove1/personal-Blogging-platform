
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
    <!-- ckeditor -->
<!-- <script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script> -->
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>

    <title>Admin</title>
    <script language=JavaScript>
function reload(form){
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index?cat=' + val ;
}
</script>
</head>
<body>
    <!-- header info -->
    <header class="relative w-full h-[80px] bg-teal-500 text-white flex justify-between items-center  pr-4">
<div class="website_ttitle ">
   <img src="../images/logos/l5.png" alt="" class="w-1/2">
</div>

    <div class="menu__btn lg:hidden">
        <i class="fa-solid fa-bars font-bold text-xl" onclick="openNav()"></i>
    </div>
    
<!-- menu for laptop devices -->
<div class="w-full h-full hidden lg:block">
<ul class="flex justify-end items-center w-full h-full">
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="../">visit website</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="index">Home</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="profile">About</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="password">Profile</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="categories">Categories</a></li>
   
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="logout">log out</a></li>
</ul>
</div>



    <!-- mobile sidenave for mobile devices -->
<div class="side__nav absolute w-0 right-0 overflow-hidden transition-all ease-in-out h-screen top-0 bg-opacity-70 bg-slate-500">
<div class="inner w-full h-full flex justify-end border-4 ">
<!-- close menu -->
<div class="cm">
<i class="fa-solid fa-close font-bold mx-2 text-2xl hover:bg-red-500 hover:text-white" onclick="closeNav()"></i>
</div>
    <!-- menu contents right here -->
<div class="h-full">
<ul>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="../">visit website</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="index">Home</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="profile">About</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="password">Profile</a></li>
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="categories">Categories</a></li>
   
    <li class="flex justify-center items-center hover:text-red-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="logout">log out</a></li>
</ul>
</div>
</div>
</div>


    </header>
    <!-- /header -->