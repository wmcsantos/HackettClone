<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>
    <?php require_once("templates/header.php") ?>
    <div class="bg-gray-100">
        <h2 class="text-3xl text-center tracking-[0.1rem] pt-4 pb-12">Welcome back, <?= $_SESSION["user_title"] ?> <?= $_SESSION["user_name"] ?> </h2>
        <div class="flex mx-8 pb-12 gap-4">
            <div id="account-navigation" class="bg-white px-8 py-8">
                <ul class="flex flex-col gap-4">
                    <li><a href="/account" class="uppercase text-xs font-medium">My account</a></li>
                    <li><a href="/orders" class="uppercase text-xs font-medium">Order history</a></li>
                    <li><a href="/logout" class="uppercase text-xs font-medium">Sign out</a></li>
                </ul>
            </div>
            <?php if (empty($orders)) { ?>
                <div class="bg-white flex-1 px-8 py-8">
                    <p class="uppercase text-[#0e0f0f] tracking-[0.1rem] font-semibold">Your recent orders</p>
                    <p class= "text-[#0e0f0f] text-sm font-light mb-2">We have no order records for this account.</p>
                    <a href="/" class="underline">Continue Shopping</a>
                </div>
            <?php return; } ?>
                <div class="bg-white flex-1 px-8 py-8">
                    <table class="w-full text-[#323232]">
                        <tr class="bg-[#1e2134] text-white text-lg text-left">
                            <th>Order Id</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>Order Status</th>
                        </tr>
                        <?php foreach($orders as $order) { ?>
                            <tr class="border-b">
                                <td>#<?= $order["id"] ?></td>
                                <td><?= $order["order_date"] ?></td>
                                <td>€<?= $order["total_amount"] ?></td>
                                <td><?= $order["order_status"] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
        </div>
    </div>
</body>
</html>