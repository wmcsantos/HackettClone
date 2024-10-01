<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Shopping Basket Page</title>
        <style>
            table, tr, th, td {
                border: 1px solid #000;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body class="bg-slate-50">
        <?php require("templates/header.php") ?>
        
        <div class="flex flex-col items-center p-32">
            <h2 class="text-gray-600 text-3xl font-serif font-extralight tracking-wider pb-8">Your bag is empty. Have you tried taking a look at our collection?</h2>
            <p class="leading-8 text-sm">Registered with us, but, you can't see your items?</p>
            <p class="leading-8 text-sm">Sign in to see your bag and get shopping!</p>
            <div>
                <button class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Continue shopping</button>
                <button class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Sign in</button>
            </div>
        </div>
    </body>
</html>
