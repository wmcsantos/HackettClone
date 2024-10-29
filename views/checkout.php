<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pageTitle ?></title>
    </head>
    <body class="bg-white">
        <?php if ( empty($cartItems) ) { ?>
            <?php require_once("templates/header.php") ?>
            <div class="flex flex-col items-center p-32">
                <h1 class="text-gray-600 text-3xl font-serif font-extralight tracking-wider pb-8">Your bag is empty. Have you tried taking a look at our collection?</h1>
                <p class="leading-8 text-sm">Registered with us, but, you can't see your items?</p>
                <p class="leading-8 text-sm">Sign in to see your bag and get shopping!</p>
                <div class="mt-8">
                    <a href="/" class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Continue shopping</a>
                    <a href="/login" class="uppercase p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Sign in</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="mx-16 mt-16">
                <div id="order-summary">
                    <table class="w-full text-[#323232]">
                        <tr class="bg-[#1e2134] text-white text-lg text-left">
                            <th class="pl-4">Order Summary</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        <?php 
                            $totalItems = count($cartItems);
                            foreach ($cartItems as $index => $item) { 
                                $isPenultimateRow = ($index === $totalItems - 1);
                        ?>
                                <tr class="border-b <?= $isPenultimateRow ? "border-solid border-[#1e2134]" : "border-dashed" ?>">
                                    <td class="flex">
                                        <picture class="block w-[100px] h-[160px] pt-4 mx-10">
                                            <img src="<?= $item["image_url"] ?>" alt="">
                                        </picture>
                                        <div class="flex flex-col justify-center">
                                            <p class="uppercase text-lg pb-2"><?= $item["product_name"] ?></p>
                                            <p class="text-sm">Size: <?= $item["size"] ?></p>
                                            <p class="text-sm capitalize">Color: <span class="uppercase"><?= $item["color"] ?></span></p>
                                        </div>
                                    </td>
                                    <td><?= $item["quantity"] ?></td>
                                    <td>€ <?= $item["price"] ?></td>
                                    <td>€ <?= number_format($item["price"] * $item["quantity"], 2) ?></td>
                                </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="pt-2">Items total</td>
                            <td class="pt-2">€ <?= $cartTotalPrice["total_price"] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="flex mt-10 gap-4">
                    <div id="billing-address" class="basis-1/2 capitalize">
                        <p class="text-lg p-2 mb-6 bg-[#1e2134] text-white">Billing address</p>
                        <form action="/checkout" method="post" class="text-[#323232]">
                            <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                            <fieldset>
                                <div class="flex flex-col w-full">
                                    <input type="text" name="customer-address" class="border-b w-full h-10 text-sm outline-none" required minlength="3" maxlength="200" placeholder="Address Name">
                                </div>
                                <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                    <div class="w-full relative group">
                                        <input type="text" name="customer-first-name" required minlength="3" maxlength="100" class="border-b w-full h-10 text-sm peer outline-none" value="<?= $user["first_name"] ?? "" ?>">
                                        <label for="customer-first-name" class="transform transition-all absolute top-0 left-0 h-full flex items-center text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">First Name</label>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                    <div class="w-full relative group">
                                        <input type="text" name="customer-last-name" required minlength="3" maxlength="100" class="border-b w-full h-10 text-sm peer outline-none" value="<?= $user["last_name"] ?? "" ?>">
                                        <label for="customer-last-name" class="transform transition-all absolute top-0 left-0 h-full flex items-center text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Last Name</label>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                    <div class="w-full relative group">
                                        <input type="text" name="customer-email" required minlength="3" maxlength="252" class="border-b w-full h-10 text-sm peer outline-none" value="<?= $user["email"] ?? "" ?>">
                                        <label for="customer-email" class="transform transition-all absolute top-0 left-0 h-full flex items-center text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Email</label>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6 text-sm">
                                    <div class="w-full relative group">
                                        <select required class="w-full" name="customer-country" id="customer-country">
                                            <option value="">Please select</option>
                                            <option value="albania">Albania</option>
                                            <option value="finland">Finland</option>
                                            <option value="portugal" selected>Portugal</option>
                                            <option value="spain">Spain</option>
                                            <option value="united-kingdom">United Kingdom</option>
                                            <option value="france">France</option>
                                            <option value="germany">Germany</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                    <input type="text" name="customer-city" class="border-b w-full h-10 text-sm outline-none" required minlength="3" maxlength="50" placeholder="City / Suburb">
                                </div>
                                <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                    <div class="w-full relative group">
                                        <input type="text" name="customer-zip" required minlength="3" maxlength="10" class="border-b w-full h-10 text-sm peer outline-none">
                                        <label for="customer-zip" class="transform transition-all absolute top-0 left-0 h-full flex items-center text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Zip / Postcode</label>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <button type="submit" name="send" class="uppercase text-sm px-12 py-3 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Pay and place order</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div id="delivery-address" class="basis-1/2">
                        <p class="text-lg p-2 mb-6 bg-[#1e2134] text-white capitalize">Delivery address</p>
                        <div class="flex text-[#323232] text-base items-center cursor-pointer border border-black pl-2 py-3">
                            <label for="default-delivery slate-800" class="relative flex items-center cursor-pointer">
                                <input 
                                    type="radio" 
                                    value="default" 
                                    class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" 
                                    id="default-delivery slate-800"
                                    checked 
                                />
                                <span class="absolute bg-[#cccccc] w-4 h-4 p-[10px] rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                            </label>
                            <label class="ml-2 cursor-pointer" for="default-delivery">Default (same as billing address)</label>
                        </div>
                    </div>
                </div>
                <div class="flex mt-10 gap-4">
                    <div class="basis-full">
                        <p class="text-lg p-2 mb-6 bg-[#1e2134] text-white capitalize">Shipping method</p>
                            <div class="flex text-[#323232] text-base items-center cursor-pointer border border-black pl-2 py-3">
                                <label for="shipping-method slate-800" class="relative flex items-center cursor-pointer">
                                    <input 
                                        type="radio" 
                                        value="default" 
                                        class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-slate-300 checked:border-slate-400 transition-all" 
                                        id="shipping-method slate-800"
                                        checked 
                                    />
                                    <span class="absolute bg-[#cccccc] w-4 h-4 p-[10px] rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                </label>
                                <div>

                                    <label class="ml-2 cursor-pointer text-sm" for="shipping-method">Free - Standard Courier (3 to 4 business days)</label>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        <?php } ?>
    </body>
</html>