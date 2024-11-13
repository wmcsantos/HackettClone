<body class="bg-gray-100">
    <?php require_once("templates/header.php") ?>
    <div class="flex flex-col mx-auto mt-4 w-96">
    <?php if (isset($_SESSION['error'])): ?>
        <p class="font-light text-red-800"><?= $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
        <h2 class="text-[#1f2134] font-bold text-lg mb-8">Set New Password</h2>
        <p class="text-[#1f2134] text-md mb-2">Please enter your new password below.</p>
        <form action="<?=ROOT?>/process-reset-password" method="POST">
            <fieldset>
                <div>
                    <label for="new-password">
                        <span class="font-light text-gray-600">New Password</span>
                        <span class="font-light text-red-800">*</span>
                    </label>
                    <div class="flex h-full border-b border-slate-400 py-2">
                        <input type="password" id="new-password" name="new-password" placeholder="Enter new password" class="w-full py-3 appearance-none bg-transparent border-none leading-tight focus:outline-none" required>
                    </div>
                    <label for="confirm-password">
                        <span class=" font-light text-gray-600">Confirm New Password</span>
                        <span class=" font-light text-red-800">*</span>
                    </label>
                    <div class="flex h-full border-b border-slate-400 py-2">
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password" class="w-full py-3 appearance-none bg-transparent border-none leading-tight focus:outline-none" required>
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    </div>
                </div>
                <div>
                    <button type="submit" class="capitalize w-full text-center font-extralight text-sm p-4 bg-[#1f2134] text-white tracking-wider mt-16 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Change password</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>