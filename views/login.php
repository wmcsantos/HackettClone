<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>My account: Login | Hackett</title>
    </head>
    <body class="bg-gray-100">
        <?php require_once("templates/header.php") ?>
            <!-- Indication of a succesfull registration in case the user has done the registration -->
            <?php 
                if (isset($_SESSION['registrationStatusMessage'])) {
                    echo "<p class='text-center m-4 text-red-800 text-md font-medium'>{$_SESSION['registrationStatusMessage']}</p>";
                    unset($_SESSION['registrationStatusMessage']);
                }
            ?>
        <div class="flex mt-10 lg:hidden">
            <div class="flex w-1/2 justify-center">
                <input class="hidden peer" type="radio" id="tab-registered" name="tabs" checked>
                <label for="tab-registered" class="w-full pb-2 text-sm text-center border-b peer-checked:border-b-black peer-checked:text-black text-gray-400 border-b-gray-400 cursor-pointer" onclick="showDiv('register')">Registered</label>
            </div>
            <div class="flex w-1/2 justify-center">
                <input class="hidden peer" type="radio" id="tab-guest" name="tabs">
                <label for="tab-guest" class="w-full pb-2 text-sm text-center border-b peer-checked:border-b-black peer-checked:text-black text-gray-400 border-b-gray-400 cursor-pointer" onclick="showDiv('create-account')">Guest</label>
            </div>
        </div>
        <div class="flex w-full lg:w-5/6 gap-4 mx-auto text-sm lg:mt-10">
            <div id="register" class="w-full lg:w-1/2 bg-white justify-center px-32 md:px-14 pb-14 lg:block">
                <h2 class="my-14 text-center font-semibold tracking-[0.25rem] uppercase text-[#1f2134]">Registered</h2>
                <form method="post" action="<?=ROOT?>/login/">
                    <div class="h-12 mb-14">
                        <label class="flex h-full border-b border-slate-400 py-2">
                            <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="email" name="email" require placeholder="Email">
                        </label>
                    </div>
                    <div class="h-12 mb-14">
                        <label class="flex h-full border-b border-slate-400 py-2">
                            <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="password" name="password" require placeholder="Password" required minlength="8" maxlength="1000">
                        </label>
                    </div>
                    <div class="flex flex-col justify-center text-sm">
                        <a href="#" class="text-center tracking-[0.1rem] text-[#1f2134] underline underline-offset-8 pt-10 pb-2 hover:text-slate-500">Forgot your password?</a>
                        <a class="uppercase text-center p-4 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300" type="submit" name="send">Sign In and checkout</a>
                    </div>
                </form>
            </div>
            <div id="create-account" class="w-full lg:w-1/2 hidden bg-white justify-center px-32 md:px-14 lg:block">
                <h2 class="my-14 text-sm text-center font-semibold tracking-[0.25rem] uppercase text-[#1f2134]">New at hackett?</h2>
                <p class="mb-6 text-[#1f2134] tracking-wider uppercase text-sm font-medium">Membership has its benefits</p>
                <ul class="text-[#1f2134] text-sm">
                    <li class="pt-3 pb-6">Save your billing and shipping for faster, easier checkout.</li>
                    <li class="pt-3 pb-6">Check the status of your orders and check the online.</li>
                    <li class="pt-3 pb-6">WhatsApp Fast track</li>
                    <li class="pt-3 pb-6">View your order history - a detailed list of each order.</li>
                </ul>
                <div class="flex flex-col justify-center">
                    <a href="<?=ROOT?>/register" class="uppercase text-center p-4 bg-[#1f2134] text-white text-sm tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Create account</a>
                </div>
            </div>
        </div>
        <script>
            const showDiv = (view) => {
                const registerDiv = document.getElementById('register');
                const createAccountDiv = document.getElementById('create-account');

                if (view === 'register') {
                    registerDiv.classList.remove('hidden');
                    createAccountDiv.classList.add('hidden');
                } else if (view === 'create-account') {
                    registerDiv.classList.add('hidden');
                    createAccountDiv.classList.remove('hidden');
                }
            }
        </script>
    </body>
</html>