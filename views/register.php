<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
    </head>
    <body class="bg-gray-100">
        <?php require_once("templates/header.php") ?>
        <p class="text-center m-4 text-red-800 text-md font-medium"><?= isset($registrationStatusMessage) ? $registrationStatusMessage : '' ?></p>
        <div class="bg-white mt-2 px-6 py-8 lg:mx-8">
            <h1 class="uppercase text-sm tracking-[0.25rem] text-[#1f2134] font-semibold">Create an account</h1>
            <div>
                <p class="text-xs text-[#1f2134] my-4">Your personal dat is safe with us. We will never share it.</p>
                <form action="<?=ROOT?>/register" method="post">
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
                                <input type="text" name="customer-email" id="customer-email" required minlength="3" maxlength="252" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                <label for="customer-email" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Email</label>
                                <p id="email-status" class="text-red-800"></p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-12 w-full mt-12 mb-6">
                            <div class="w-full sm:w-1/2 relative group">
                                <input type="password" name="customer-password" required minlength="3" maxlength="1000" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                <label for="customer-password" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Password</label>
                            </div>
                            <div class="w-full sm:w-1/2 relative group">
                                <input type="password" name="customer-confirm-password" required minlength="3" maxlength="255" class="border-b w-full h-10 px-4 text-sm peer outline-none">
                                <label for="customer-confirm-password" class="transform transition-all absolute top-0 left-0 h-full flex items-center pl-2 text-sm group-focus-within:text-xs peer-valid:text-xs group-focus-within:h-1/2 peer-valid:h-1/2 group-focus-within:-translate-y-full peer-valid:-translate-y-full group-focus-within:pl-0 peer-valid:pl-0">Confirm Password</label>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" name="send" class="uppercase text-sm px-12 py-3 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Create Account</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="mt-16 bg-white mx-auto py-10">
            <img src="<?=ROOT?>/images/hackett-logo-footer.webp" alt="Hackett Logo Footer" class="bg-contain h-32 mx-auto">
        </div>
    </body>
    <script>
        document.getElementById("customer-email").addEventListener("input", function() {
            const email = this.value;
            const statusMessage = document.getElementById("email-status");

            if (email.length > 3) 
            {
                fetch("/check-email-availability", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "email=" + encodeURIComponent(email)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.available) 
                    {
                        statusMessage.textContent = "Email is available.";
                        statusMessage.style.color = "green";
                    } else {
                        statusMessage.textContent = "Email is already registered.";
                        statusMessage.style.color = "text-red-800";
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
            } else {
                statusMessage.textContent = "";
            }
        });
    </script>
</html>