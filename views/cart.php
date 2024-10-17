<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Shopping Basket Page</title>
        <style>
            @keyframes slideInOverlay {
            0% {
                right: 0;
                width: 0;
            }
            100% {
                right: 0;
                width: 100%;
            }
            }

            .slide-out-overlay {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            background-color: #f5f5f5;
            animation: slideInOverlay 1s ease-out forwards;
            z-index: 10;
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: 500;
            text-transform: uppercase;
            }
        </style>
    </head>
    <body class="bg-slate-50">
        <?php require_once("templates/header.php") ?>
        <?php if ( empty($cartItems) ) { ?>
            <div class="flex flex-col items-center p-32">
                <h1 class="text-gray-600 text-3xl font-serif font-extralight tracking-wider pb-8">Your bag is empty. Have you tried taking a look at our collection?</h1>
                <p class="leading-8 text-sm">Registered with us, but, you can't see your items?</p>
                <p class="leading-8 text-sm">Sign in to see your bag and get shopping!</p>
                <div>
                    <button class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Continue shopping</button>
                    <button class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Sign in</button>
                </div>
            </div>
        <?php } else { ?>
            <div class="flex basis-2/3 mx-6 gap-8">
                <div class="basis-3/4 mt-2 bg-white text-[#0F0E0E]">
                    <div class="flex items-center gap-2 p-4">
                        <h1 class="uppercase text-sm font-bold tracking-[0.25rem]">Shopping bag</h1>
                        <span id="shopping-bag-quantity" class="text-gray-500">(3)</span>
                    </div>
                    <?php foreach ($cartItems as $item) { ?>
                        <div id="cart-item-id-<?= $item["id"] ?>" class="flex relative gap-4 m-4">
                            <div id="product-variant">
                                <div class="product-image">
                                    <a href="">
                                        <picture class="block w-[220px] h-[304px]">
                                            <img src="<?= $item["image_url"] ?>" alt="">
                                        </picture>
                                    </a>
                                </div>
                            </div>
                            <div id="product-details" class="flex flex-col justify-between ">
                                <div>
                                    <h3 class="text-xs font-semibold capitalize"><?= $item["product_name"] ?></h3>
                                    <p class="text-xs mt-2">€ <?= $item["price"] ?></p>
                                </div>
                                <div>
                                    <p class="text-sm capitalize">Color: <?= $item["color"] ?></p>
                                    <p class="text-sm">Size: <?= $item["size"] ?></p>
                                    <span class="text-sm">Quantity: </span>
                                    <span class="text-sm"><?= $item["quantity"] ?></span>
                                </div>
                                <div>
                                    <a href="" class="text-sm underline capitalize">Edit item</a>
                                    <span>|</span>
                                    <a href="javascript:void(0)" id="remove-item" class="text-sm underline capitalize" data-cart-item-id="<?= $item["id"] ?>">Remove</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="basis-1/3 mt-2 bg-white">
                    <div class="flex gap-2 p-4">
                        <h2 class="uppercase text-sm text-[#0F0E0E] font-bold tracking-[0.25rem]">Order summary</h2>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const removeButtons = document.querySelectorAll("#remove-item");

            removeButtons.forEach( button => {
                button.addEventListener("click", function() {
                    const cartItemId = this.dataset.cartItemId;
                    const cartItemCard = document.getElementById(`cart-item-id-${cartItemId}`)

                    const slidingPane = document.createElement('div');
                    slidingPane.classList.add('slide-out-overlay');

                    slidingPane.textContent = "Item removed";

                    cartItemCard.appendChild(slidingPane);

                    fetch("/remove-from-cart", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({ cartItemId })
                    })
                    .then( response => response.json())
                    .then( data => {
                        if ( data.success )
                        {
                            slidingPane.addEventListener("animationend", function() {
                                cartItemCard.remove();
                                
                                const shoppingBagQuantity = document.getElementById("shopping-bag-quantity");
                                const cartQuantity = document.getElementById("cart-quantity");
                                shoppingBagQuantity.textContent = `(${data.newCartQuantity ?? 0})`
                                cartQuantity.textContent = data.newCartQuantity ?? 0;
                            });
                        }
                    })
                    .catch( error => {
                        console.error("Error: ", error);
                    });
                });
            });
        });
    </script>
</html>
