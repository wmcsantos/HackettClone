<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Clothing</title>
    </head>
    <body class="bg-white">
        <?php require_once("templates/header.php") ?>

        <div class="flex">
            <div id="product-images" class="w-3/5">
                <div class="grid grid-cols-8 gap-2">
                    <?php 
                        foreach ( $productImages as $image) { 
                            $imageSize = ( $image["position"] > 4 ) ? "" : "col-span-4";
                    ?>
                            <picture  class="<?= $imageSize ?>">
                                <img src="<?=ROOT . $image["image_url"] ?>" alt="">
                            </picture>
                    <?php } ?>
                </div>
            </div>
            <div id="product-details" class="w-2/5 h-[1000px] px-8 py-2">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li>
                        <div class="flex items-center">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm capitalize font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"><?= $category ?></a>
                        </div>
                        </li>
                        <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                        </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="capitalize text-lg font-semibold"><?= $productInfo["name"] ?></h1>
                <p class="text-xs mt-2">€ 169,00</p>
                <div id="choose-color" class="mt-6">
                    <span class="uppercase font-semibold text-xs tracking-wider">Choose color:</span>
                    <span class="text-xs capitalize">
                        <?php 
                            // Get color from the URL
                            $currentColor = isset($_GET["color"]) ? $_GET["color"] : "";

                            $selectedColorName = "";
                            foreach ( $productColors as $color )
                            {
                                if ( $currentColor === $color["code"] )
                                {
                                    $selectedColorName = $color["name"];
                                    break;
                                }
                            }

                            echo $selectedColorName;
                        ?>
                    </span>
                    <ul id="product-colors" class="flex h-8 mt-4 gap-x-2">
                        <?php 
                            foreach ( $productColors as $key => $color ) {
                                $border = ( $currentColor === $color["code"] ) ? "border-b border-black" : "";
                        ?>
                                <li class="<?= $border ?> pb-1">
                                    <a href="?color=<?= $color["code"] ?>" data-color-id="<?= $color["color_id"] ?>">
                                        <img class="border border-gray-200 h-full" src="<?=ROOT?>/<?= $color["image_url"] ?>" alt="">
                                    </a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="product-sizes" class="mt-4">
                    <span class="uppercase font-semibold text-xs tracking-wider">Select size:</span>
                    <div id="sizes-list" class="">
                        <ul class="flex h-8 mt-4 mb-8 text-xs font-semibold">
                            <li class="w-10"><a href="" class="p-1 border border-black">XS</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">S</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">M</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">L</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">XL</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">XXL</a></li>
                            <li class="w-10"><a href="" class="p-1 border border-black">3XL</a></li>
                        </ul>
                    </div>

                    <a href="" class="uppercase underline underline-offset-1 text-sm">Size Guide</a>
                </div>

                <form action="">
                    <button class="after:content-[url('<?=ROOT?>/images/icons/shopping-cart-icon.svg')] hover:after:content-[url('<?=ROOT?>/images/icons/shopping-cart-hover-icon.svg')] w-full uppercase p-2 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] hover:fill-black border-2 border-[#1f2134] transition-all duration-300">
                        Add to Bag 
                    </button>
                </form>
            </div>
        </div>
        <div class="product-details w-2/3 grid grid-cols-2 gap-4 mx-4 mt-12">
            <div>
                <div>
                    <div>
                        <h1 class="uppercase font-medium tracking-[0.25rem] text-sm pb-4">Product details</h1>
                    </div>
                    <div class="text-sm">
                        <?= $productInfo["description_details"] ?>
                    </div>
                </div>
                <div class="mt-4">
                    <div>
                        <h1 class="uppercase font-medium tracking-[0.25rem] text-sm pb-4">Composition</h1>
                    </div>
                    <div class="text-sm">
                    <?= $productInfo["description_composition"] ?>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <h1 class="uppercase font-medium tracking-[0.25rem] text-sm pb-4">Care</h1>
                    </div>
                    <div class="text-sm">
                        <?= $productInfo["description_care"] ?>
                    </div>
                </div>
                <div class="mt-4">
                    <div>
                        <h1 class="uppercase font-medium tracking-[0.25rem] text-sm pb-4">Delivery and returns</h1>
                    </div>
                    <div class="text-sm">
                    <?= $productInfo["description_delivery"] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 bg-white mx-auto py-10">
            <img src="<?=ROOT?>/images/hackett-logo-footer.webp" alt="Hackett Logo Footer" class="bg-contain h-32 mx-auto">
        </div>
    </body>
</html>
