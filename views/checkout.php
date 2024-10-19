<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pageTitle ?></title>
    </head>
    <body class="bg-white">
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
        </div>
    </body>
</html>