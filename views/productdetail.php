<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Clothing</title>
    </head>
    <body class="bg-white">
        <?php require_once("templates/header.php") ?>
        <?= print_r($_SESSION) ?>
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
                            <span class="capitalize ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= $subcategory ?></span>
                        </div>
                        </li>
                    </ol>
                </nav>
                <h1 id="product-title" class="capitalize text-lg font-semibold" data-product-id=<?= $productInfo["id"] ?>><?= $productInfo["name"] ?></h1>
                <p class="text-xs mt-2">€ <?= $productInfo["price"] ?></p>
                <div id="choose-color" class="mt-6">
                    <span class="uppercase font-semibold text-xs tracking-wider">Choose color:</span>
                    <span class="text-xs capitalize">
                        <?php 
                            // Get color from the URL
                            $currentColor = isset($_GET["color"]) ? $_GET["color"] : "";
                            $currentSize = isset($_GET["size"]) ? $_GET["size"] : "";

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
                                    <a href="?color=<?= $color["code"] ?>" class="color-option" data-color-id="<?= $color["color_id"] ?>" data-default-color-id="<?= $currentColor === $color["code"]  ? $color["color_id"] : "" ?>">
                                        <img class="border border-gray-200 h-full" src="<?=ROOT?>/<?= $color["image_url"] ?>" alt="">
                                    </a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
                <div id="product-sizes" class="mt-4">
                    <div class="flex gap-2 items-center">
                        <span class="uppercase font-semibold text-xs tracking-wider">Select size:</span>
                        <p id="missing-size-message" class="text-red-800 text-xs"></p>
                    </div>
                    <div>
                        <ul id="sizes-list" class="flex gap-2 h-8 mt-4 mb-8 text-xs font-semibold text-center">
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[0]["id"] ?>" data-default-size-id="<?= $currentSize === "XS" ? 1 : "" ?>" onclick="updateUrl('XS')" class="size-option block p-2 hover:border hover:border-black">XS</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[1]["id"] ?>" data-default-size-id="<?= $currentSize === "S" ? 2 : "" ?>" onclick="updateUrl('S')" class="size-option block p-2 hover:border hover:border-black">S</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[2]["id"] ?>" data-default-size-id="<?= $currentSize === "M" ? 3 : "" ?>" onclick="updateUrl('M')" class="size-option block p-2 hover:border hover:border-black">M</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[3]["id"] ?>" data-default-size-id="<?= $currentSize === "L" ? 4 : "" ?>" onclick="updateUrl('L')" class="size-option block p-2 hover:border hover:border-black">L</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[4]["id"] ?>" data-default-size-id="<?= $currentSize === "XL" ? 5 : "" ?>" onclick="updateUrl('XL')" class="size-option block p-2 hover:border hover:border-black">XL</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[5]["id"] ?>" data-default-size-id="<?= $currentSize === "XXL" ? 6 : "" ?>" onclick="updateUrl('XXL')" class="size-option block p-2 hover:border hover:border-black">XXL</a></li>
                            <li class="w-10"><a href="" data-size-id="<?= $productSizes[6]["id"] ?>" data-default-size-id="<?= $currentSize === "3XL" ? 7 : "" ?>" onclick="updateUrl('3XL')" class="size-option block p-2 hover:border hover:border-black">3XL</a></li>
                        </ul>
                    </div>

                    <a href="" class="uppercase underline underline-offset-1 text-sm">Size Guide</a>
                </div>

                <button id="add-to-cart" type="submit" value="Add to Bag" class="after:content-[url('<?=ROOT?>/images/icons/shopping-cart-icon.svg')] hover:after:content-[url('<?=ROOT?>/images/icons/shopping-cart-hover-icon.svg')] w-full uppercase p-2 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] hover:fill-black border-2 border-[#1f2134] transition-all duration-300">
                    Add to bag
                </button>
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
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        let selectedColor = urlParams.get('color') || null;
        let selectedSize = urlParams.get('size') || null;

        const defaultColorElement = document.querySelector("[data-default-color-id]:not([data-default-color-id=''])");
        
        const defaultSizeElement = document.querySelector("[data-default-size-id]:not([data-default-size-id=''])");

        window.onload = function() {

            if (defaultColorElement) {
                selectedColor = defaultColorElement.getAttribute("data-default-color-id");               
            }
            
            if (defaultSizeElement) {
                selectedSize = defaultSizeElement.getAttribute("data-default-size-id");
            }

            const urlParams = new URLSearchParams(window.location.search);
            const size = urlParams.get('size');
            highlightSelectedSize(size);
        };

        document.querySelectorAll(".color-option").forEach(function(colorOption) {
            colorOption.addEventListener("click", function(event) {
                selectedColor = this.getAttribute("data-color-id");
            });
        });

        document.querySelectorAll(".size-option").forEach(function(sizeOption) {
            sizeOption.addEventListener("click", function(event) {
                event.preventDefault();
                selectedSize = this.getAttribute("data-size-id");
            });
        });

        function highlightSelectedSize(size)
        {
            const listItems = document.querySelectorAll('#sizes-list li');
            listItems.forEach(li => {
                const anchor = li.querySelector('a');
                const sizeInAnchor = anchor.innerText.trim();
                
                if (sizeInAnchor === size) 
                {
                    anchor.classList.add('border', 'border-black');
                } else 
                {
                    anchor.classList.remove('border', 'border-black');
                }
            });
        }

        function updateUrl(size)
        {

            const url = new URL(window.location.href);

            url.searchParams.set("size", size);

            window.history.pushState({}, '', url);

            highlightSelectedSize(size);
        }

        function updateCartQuantity()
        {
            fetch("/cart-items-count", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                }
            })
            .then( response => response.json() )
            .then( data => {
                if ( data.success )
                {
                    const cartQuantityElement = document.getElementById("cart-quantity");
                    cartQuantityElement.textContent = data.count;
                } else
                {
                    console.error( "Failed to fetch cart count:", data.message );
                }
            })
            .catch(( error ) => {
                console.error( "Error fetching cart count:", error );
            });
        }

        document.getElementById("add-to-cart").addEventListener("click", function(event) {
            event.preventDefault();
            
            const productId = document.getElementById("product-title").dataset.productId;
            
            const data = {
                productId,
                selectedSize,
                selectedColor
            };

            if (!selectedSize) {
                const missingSizeMessage = "Please select a size"
                document.getElementById("missing-size-message").textContent = missingSizeMessage;
                return;
            }

            fetch("/add-to-cart", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if( data.success )
                {
                    updateCartQuantity();
                }
            })
            .catch((error) => {
                console.error("Error: ", error);
            })
        })

    </script>
</html>
