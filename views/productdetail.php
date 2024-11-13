<style>
    /* Drawer styles */
    #cart-drawer {
        /* Initially hidden offscreen to the right */
        transform: translateX(100%);
        transition: transform 0.5s ease-in-out;
    }

    #cart-drawer.open {
        /* When open, the drawer slides into view */
        transform: translateX(0);
    }

    /* Basic utility styles for close button */
    button#close-cart-drawer {
        background: none;
        border: none;
        cursor: pointer;
    }
</style>
<body class="bg-white">
    <?php require_once("templates/header.php") ?>
    <!-- Modal -->
    <div id="message-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="flex flex-col bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <p id="modal-message" class="text-[#1f2134]"></p>
            <button id="modal-login-btn" class="uppercase text-center text-sm p-2 bg-[#1f2134] text-white tracking-wider mt-6 mx-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Log In</button>
        </div>
    </div>
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
                        <span class="capitalize ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= $subcategorySanitized ?></span>
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
                                    <img class="border border-gray-200 h-full" src="<?=ROOT?><?= $color["image_url"] ?>" alt="">
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
                        <li class="w-10"><a <?= isset($productSizes[0]["stock"]) && $productSizes[0]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[0]["size_id"] ?>" data-default-size-id="<?= $currentSize === "XS" ? 1 : "" ?>" <?= isset($productSizes[0]["stock"]) && $productSizes[0]["stock"] != 0 ? "onclick=updateUrl('XS')" : "" ?>  class="<?= $productSizes[0]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">XS</a></li>
                        <li class="w-10"><a <?= isset($productSizes[1]["stock"]) && $productSizes[1]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[1]["size_id"] ?>" data-default-size-id="<?= $currentSize === "S" ? 2 : "" ?>" <?= isset($productSizes[1]["stock"]) && $productSizes[1]["stock"] != 0 ? "onclick=updateUrl('S')" : "" ?> class="<?= $productSizes[1]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">S</a></li>
                        <li class="w-10"><a <?= isset($productSizes[2]["stock"]) && $productSizes[2]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[2]["size_id"] ?>" data-default-size-id="<?= $currentSize === "M" ? 3 : "" ?>" <?= isset($productSizes[2]["stock"]) && $productSizes[2]["stock"] != 0 ? "onclick=updateUrl('M')" : "" ?> class="<?= $productSizes[2]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">M</a></li>
                        <li class="w-10"><a <?= isset($productSizes[3]["stock"]) && $productSizes[3]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[3]["size_id"] ?>" data-default-size-id="<?= $currentSize === "L" ? 4 : "" ?>" <?= isset($productSizes[3]["stock"]) && $productSizes[3]["stock"] != 0 ? "onclick=updateUrl('L')" : "" ?> class="<?= $productSizes[3]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">L</a></li>
                        <li class="w-10"><a <?= isset($productSizes[4]["stock"]) && $productSizes[4]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[4]["size_id"] ?>" data-default-size-id="<?= $currentSize === "XL" ? 5 : "" ?>" <?= isset($productSizes[4]["stock"]) && $productSizes[4]["stock"] != 0 ? "onclick=updateUrl('XL')" : "" ?> class="<?= $productSizes[4]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">XL</a></li>
                        <li class="w-10"><a <?= isset($productSizes[5]["stock"]) && $productSizes[5]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[5]["size_id"] ?>" data-default-size-id="<?= $currentSize === "XXL" ? 6 : "" ?>" <?= isset($productSizes[5]["stock"]) && $productSizes[5]["stock"] != 0 ? "onclick=updateUrl('XXL')" : "" ?> class="<?= $productSizes[5]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">XXL</a></li>
                        <li class="w-10"><a <?= isset($productSizes[6]["stock"]) && $productSizes[6]["stock"] != 0 ? "href=''" : "" ?> data-size-id="<?= $productSizes[6]["size_id"] ?>" data-default-size-id="<?= $currentSize === "3XL" ? 7 : "" ?>" <?= isset($productSizes[6]["stock"]) && $productSizes[6]["stock"] != 0 ? "onclick=updateUrl('3XL')" : "" ?> class="<?= $productSizes[6]["stock"] == 0 ? "text-gray-400" : "size-option hover:border hover:border-black" ?>  block p-2">3XL</a></li>
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
    <!-- Overlay When Cart Drawer is Open -->
    <div id="overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden z-40"></div>
    <!-- Shopping Cart Drawer -->
    <div id="cart-drawer" class="fixed top-16 right-0 w-[400px] h-full bg-white transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="p-6 pb-0 flex justify-between items-center">
            <h2 class="text-sm font-semibold uppercase tracking-[0.2rem]">In your bag</h2>
            <button id="close-cart-drawer" class="text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div id="cart-items">
                
            </div>
            <div class="mt-6">
                <p class="text-xs font-semibold">Subtotal <span id="cart-total" class=" right-0">€ 0.00</span></p>
            </div>
            <div class="mt-6 flex justify-between gap-2 text-center">
                <a href="/cart" class="basis-1/2 text-xs tracking-[0.2rem] text-[#1f2134] border border-[#1f2134] px-4 py-3 uppercase bg-white">Shopping bag</a>
                <a href="/checkout" class="basis-1/2 text-xs tracking-[0.2rem] text-white px-4 py-3 uppercase bg-[#1f2134]">Checkout</a>
            </div>
        </div>
    </div>

</body>
<script>

    // Fetch the CSRF token from the meta tag if it exists
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    const urlParams = new URLSearchParams(window.location.search);
    let selectedColor = urlParams.get('color') || null;
    let selectedSize = urlParams.get('size') || null;

    const defaultColorElement = document.querySelector("[data-default-color-id]:not([data-default-color-id=''])");
    
    const defaultSizeElement = document.querySelector("[data-default-size-id]:not([data-default-size-id=''])");

    const cartDrawer = document.getElementById("cart-drawer");
    const closeCartDrawer = document.getElementById("close-cart-drawer");
    const overlay = document.getElementById("overlay");

    // Select modal elements
    const messageModal = document.getElementById("message-modal");
    const modalMessage = document.getElementById("modal-message");
    const modalLoginBtn = document.getElementById("modal-login-btn");

    // Function to show the modal
    function showModal(message) {
        modalMessage.textContent = message;
        messageModal.classList.remove("hidden");
    }

    modalLoginBtn.addEventListener("click", () => {
        window.location.href = "/login";
    });

    // Close modal function
    function closeModal() {
        messageModal.classList.add("hidden");
    }

    // Close modal when clicking outside of the modal content
    messageModal.addEventListener("click", (event) => {
        if (event.target === messageModal) {
            closeModal();
        }
    });

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
                "CSRF-Token": csrfToken
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

    // Function to open the cart drawer
    function openCartDrawer() {
        cartDrawer.classList.add("open");
        overlay.classList.remove("hidden");
    }

    // Function to close the cart drawer
    function closeCartDrawerHandler() {
        cartDrawer.classList.remove("open");
        overlay.classList.add("hidden");
    }

    // Add click event to close button
    closeCartDrawer.addEventListener("click", closeCartDrawerHandler);
    overlay.addEventListener("click", closeCartDrawerHandler);

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
                "CSRF-Token": csrfToken
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if( data.success )
            {
                updateCartQuantity();

                // Fetch the updated cart items and re-render the cart drawer
                updateCartDrawerItems();

                // Show the drawer
                openCartDrawer();

                // Update subtotal price
                updateSubTotalCartPrice(data.newTotalPrice);
            } else {
                console.log(data.message);
                showModal(data.message);
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    })

    function updateSubTotalCartPrice(totalPrice) {
        const cartTotalElements = document.querySelectorAll("#cart-total");
        
        cartTotalElements.forEach(el => {
            el.textContent = `€ ${totalPrice ?? 0}`;
        });
    }

    function updateCartDrawerItems() {
        fetch("/cart-items", { // Assume this endpoint returns the updated cart HTML or JSON data
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "CSRF-Token": csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Assuming data.items contains an array of cart items.
                const cartItems = data.items;
                const cartItemsContainer = document.getElementById("cart-items");

                // Clear the existing cart items
                cartItemsContainer.innerHTML = '';

                // Loop through the cart items and append them to the cart drawer
                cartItems.forEach(item => {
                    const cartItemHTML = `
                        <div id="cart-item-id-${item.id}" class="flex relative gap-4 my-4">
                            <div id="product-variant">
                                <div class="product-image">
                                    <a href="">
                                        <picture class="block w-[115px] h-[160px]">
                                            <img src="${item.image_url}" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>
                            <div id="product-details" class="flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xs font-semibold capitalize">${item.product_name}</h3>
                                    <p class="text-xs mt-2">€ ${item.price}</p>
                                </div>
                                <div>
                                    <p class="text-sm capitalize">Color: ${item.color}</p>
                                    <p class="text-sm">Size: ${item.size}</p>
                                    <span class="text-sm">Quantity: </span>
                                    <span class="text-sm">${item.quantity}</span>
                                </div>
                                <div>
                                    <a href="" class="text-sm underline capitalize">Edit item</a>
                                    <span>|</span>
                                    <a href="javascript:void(0)" id="remove-item" class="text-sm underline capitalize" data-cart-item-id="${item.id}">Remove</a>
                                </div>
                            </div>
                        </div>
                    `;

                    // Append the new item to the cart drawer
                    cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);

                    const removeButtons = document.querySelectorAll("#remove-item");
                    removeButtons.forEach( button => {
                        button.addEventListener("click", function() {
                            const cartItemId = this.dataset.cartItemId;
                            const cartItemCard = document.getElementById(`cart-item-id-${cartItemId}`)
                            
                            // Fetch the CSRF token from the meta tag if it exists
                            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                            
                            fetch("/remove-from-cart", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "CSRF-Token": csrfToken
                                },
                                body: JSON.stringify({ cartItemId })
                            })
                            .then( response => response.json())
                            .then( data => {
                                if ( data.success )
                                {
                                    const cartQuantity = document.getElementById("cart-quantity");
                                    cartQuantity.textContent = data.newCartQuantity ?? 0;

                                    // Update total price
                                    const cartTotalElements = document.querySelectorAll("#cart-total");
                                    cartTotalElements.forEach( el => {
                                        el.textContent = `€ ${data.newTotalPrice ?? 0}`
                                    });

                                    cartItemCard.remove();
                                }
                            })
                            .catch( error => {
                                console.error("Error: ", error);
                            });
                        });
                    });
                });
            } else {
                console.error("Failed to fetch cart items:", data.message);
            }
        })
        .catch((error) => {
            console.error("Error fetching cart items:", error);
        });
    }
</script>
