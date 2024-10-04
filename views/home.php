<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Hackett London</title>
    </head>
    <body>
        <?php require_once("templates/header.php") ?>
        <main class="flex flex-col w-full">
            <div class="flex flex-col justify-center items-center gap-y-6 bg-auto w-full h-[700px]" style="background-image: url(<?=ROOT?>/images/home-image.png);">
                <h1 class="flex w-full justify-center font-serif text-white text-8xl tracking-wider">New Collection</h1>
                <h3 class="text-white">Discover our new collection.</h3>
                <button class="uppercase text-white border border-white px-8 py-3 font-medium hover:bg-white hover:text-black transition-all duration-500">Shop new in</button>
            </div>
        </main>
        <div id="our-brands">
            <div class="my-16 flex justify-center">
                <h1 class="uppercase text-[#1f2134] font-medium text-md tracking-[0.25rem]">Our brands</h1>
            </div>
            <div class="grid grid-cols-2 gap-8 lg:gap-0 lg:flex lg:flex-row h-32 lg:h-16 justify-around my-16">
                <div class="flex-1">
                    <div><img class="mx-auto w-2/5 lg:w-3/5" src="<?=ROOT?>/images/brands-hackett1.svg" alt=""></div>
                </div>
                <div class="flex-1">
                    <div><img class="mx-auto w-2/5 lg:w-3/5" src="<?=ROOT?>/images/brands-hackett2.svg" alt=""></div>
                </div>
                <div class="flex-1">
                    <div><img class="mx-auto w-2/5 lg:w-3/5" src="<?=ROOT?>/images/brands-hackett3.svg" alt=""></div>
                </div>
                <div class="flex-1">
                    <div><img class="mx-auto w-2/5 lg:w-3/5" src="<?=ROOT?>/images/brands-hackett4.svg" alt=""></div>
                </div>
            </div>
        </div>
        <div id="back-to-work" class="flex relative mt-4 gap-x-2 h-[500]">
            <div class="flex flex-col absolute bottom-0 left-1/2 lg:relative lg:left-0 transform -translate-x-1/2 -translate-y-1/2 lg:-translate-x-0 lg:-translate-y-0 lg:w-2/5 justify-center items-center bg-none lg:bg-stone-100">
                <p class="text-lg sm:text-2xl md:text-3xl mb-6 text-white lg:text-stone-700 font-extralight tracking-wider font-serif">Back to Work</p>
                <p class="text-white lg:text-stone-700 text-sm lg:text-md">Business-casual or formal looks</p>
                <div class="group mt-6">
                    <a href="" class="uppercase tracking-wide text-sm font-medium text-white lg:text-stone-700 lg:hover:text-stone-500">Shop now</a>
                    <div class="bg-stone-500 h-[2px] w-0 group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>
            <div class="flex w-full lg:w-3/5">
                <img src="<?=ROOT?>/images/back-to-work-landing-page.webp" alt="">
            </div>
        </div>
        <div id="back-to-shirts" class="flex relative mt-4 gap-x-2 h-[500]">
            <div class="flex w-full lg:w-3/5">
                <img src="<?=ROOT?>/images/back-to-shirts-landing-page.webp" alt="">
            </div>
            <div class="flex flex-col absolute bottom-0 left-1/2 lg:relative lg:left-0 transform -translate-x-1/2 -translate-y-1/2 lg:-translate-x-0 lg:-translate-y-0 lg:w-2/5 justify-center items-center bg-none lg:bg-stone-100">
                <p class="text-lg sm:text-2xl md:text-3xl mb-6 text-white lg:text-stone-700 font-extralight tracking-wider font-serif">Back to Shirts</p>
                <p class="text-white lg:text-stone-700 text-sm lg:text-md">Elegance and authenticity, with a British Edge</p>
                <div class="group mt-6">
                    <a href="" class="uppercase tracking-wide text-sm font-medium text-white lg:text-stone-700 lg:hover:text-stone-500">Discover more</a>
                    <div class="bg-stone-500 h-[2px] w-0 group-hover:w-full transition-all duration-500"></div>
                </div>
            </div>
        </div>
        <div class="mt-16 bg-white mx-auto py-10">
            <img src="<?=ROOT?>/images/hackett-logo-footer.webp" alt="Hackett Logo Footer" class="bg-contain h-32 mx-auto">
        </div>
    </body>
</html>