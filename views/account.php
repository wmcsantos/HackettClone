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
            <div class="bg-white flex-1 px-8 py-8">
                <p class="uppercase text-[#0e0f0f] tracking-[0.1rem] font-medium">Personal details</p>
                <div class="border border-gray-200 py-8 px-4 mt-8">
                    <form action="#" method="post">
                        <fieldset>
                            <div class="flex flex-col w-full sm:w-1/2">
                                <label class="text-sm" for="customer-title">
                                    Title
                                </label>
                                <div class="border-b w-full pb-2 mb-2">
                                    <select required class="w-full" name="customer-title" id="customer-title">
                                        <option value="">Please select</option>
                                        <option value="ms">Ms.</option>
                                        <option value="mr">Mr.</option>
                                        <option value="professor">Professor</option>
                                        <option value="lord">Lord</option>
                                        <option value="mrs">Mrs.</option>
                                        <option value="sheik">Sheik</option>
                                        <option value="dr">Dr.</option>
                                        <option value="sir">Sir</option>
                                        <option value="miss">Miss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                <div class="w-full sm:w-1/2 relative group">
                                    <input type="text" name="customer-first-name" required minlength="3" maxlength="100" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                    <label for="customer-first-name" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">First Name</label>
                                </div>
                                <div class="w-full sm:w-1/2 relative group">
                                    <input type="text" name="customer-last-name" required minlength="3" maxlength="100" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                    <label for="customer-last-name" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Last Name</label>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                                <div class="w-full sm:w-1/2 relative group">
                                    <label class="text-sm" for="customer-gender">
                                        Gender
                                    </label>
                                    <div class="border-b w-full">
                                        <select required class="w-full" name="customer-gender" id="customer-gender">
                                            <option value="">Please select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 relative group">
                                    <input type="text" name="customer-email" required minlength="3" maxlength="252" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                    <label for="customer-email" class="h-10 transform transition-all absolute top-0 left-0 flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Email</label>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 my-10">We will always have your back, Hackett London does not share or sell presonal info.</p>
                            <div class="flex gap-6 justify-center">
                                <span class="uppercase py-2 px-8 text-sm font-medium tracking-wider bg-white text-[#1f2134] border-2 border-[#1f2134] cursor-pointer">Cancel</span>
                                <button class="uppercase py-2 px-6 bg-[#1f2134] text-white text-sm tracking-wider">Save changes</button>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>