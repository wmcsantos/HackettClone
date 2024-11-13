<body class="bg-gray-100">
    <?php require_once("templates/header.php") ?>
        <!-- Indication of a failed login -->
        <?php 
            if (isset($_SESSION['loginStatusMessage'])) {
                echo "<p class='text-center m-4 text-red-800 text-md font-medium'>{$_SESSION['loginStatusMessage']}</p>";
                unset($_SESSION['loginStatusMessage']);
            }
        ?>
    <!-- Modal Forgot Password -->
    <div id="forgot-password-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="flex flex-col bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h1 class="text-medium font-semibold mb-4">Forgot your password?</h1>
            <p id="modal-forgot-password-message" class="text-[#1f2134] text-sm mb-8">
                Don't worry - it's easily done! Just enter your email address below and we'll send you a link to reset your password.
            </p>
            <form method="POST" action="<?= ROOT ?>/forgot-password">
                <label class="flex h-full border-b border-slate-400 py-2">
                    <input name="email" class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="text" placeholder="Enter your email">
                </label>
                <button type="submit" name="send" id="modal-forgot-password-btn" class="uppercase w-full text-center text-sm p-2 bg-[#1f2134] text-white tracking-wider mt-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Reset Password</button>
            </form>
        </div>
    </div>
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
            <form method="POST" action="<?=ROOT?>/login">
                <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                <div class="h-12 mb-14">
                    <label class="flex h-full border-b border-slate-400 py-2">
                        <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="email" name="email" required placeholder="Email">
                    </label>
                </div>
                <div class="h-12 mb-14">
                    <label class="flex h-full border-b border-slate-400 py-2">
                        <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="password" name="password" placeholder="Password" required minlength="3" maxlength="1000">
                    </label>
                </div>
                <div class="flex flex-col justify-center text-sm">
                    <a id="forgot-password-link" class="text-center tracking-[0.1rem] text-[#1f2134] underline underline-offset-8 pt-10 pb-2 hover:text-slate-500 cursor-pointer">Forgot your password?</a>
                    <button type="submit" name="send" class="uppercase text-center p-4 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300" type="submit" name="send">Sign In and checkout</button>
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

        const forgotPassword = document.getElementById("forgot-password-link");
        const forgotPasswordModal = document.getElementById("forgot-password-modal");

        forgotPassword.addEventListener("click", () => {
            forgotPasswordModal.classList.toggle("hidden");
        });

        // Close modal when clicking outside of the modal content
        forgotPasswordModal.addEventListener("click", (event) => {
            if (event.target === forgotPasswordModal) {
                forgotPasswordModal.classList.add("hidden");
            }
        });
    </script>
</body>