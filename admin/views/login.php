
<nav class="flex justify-between items-center h-[4.5rem] px-8 bg-white">
    <img src="../images/logos/hackett-logo.svg" alt="Hackett Logo">
</nav>
<div class="flex mt-10">
    <div class="flex w-full justify-center">
        <p class="w-full pb-2 text-xs text-center border-b text-[#1f2134] border-[#1f2134] uppercase">Restricted area only accessible to staff</p>
    </div>
</div>
<div class="flex w-full lg:w-5/6 gap-4 mx-auto text-sm lg:mt-10">
    <div id="register" class="w-full bg-white justify-center px-32 md:px-14 pb-14 lg:block">
        <h2 class="my-14 text-center font-semibold tracking-[0.25rem] uppercase text-[#1f2134]">Admin | Employees</h2>
        <form method="post" action="<?=ROOT?>/login/">
            <div class="h-12 mb-14">
                <label class="flex h-full border-b border-slate-400 py-2">
                    <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="email" name="email" require placeholder="Email">
                </label>
            </div>
            <div class="h-12 mb-14">
                <label class="flex h-full border-b border-slate-400 py-2">
                    <input class="w-full appearance-none bg-transparent border-none leading-tight focus:outline-none" type="password" name="password" require placeholder="Password" required minlength="3" maxlength="252">
                </label>
            </div>
            <div class="flex flex-col justify-center text-sm">
                <a href="#" class="text-center tracking-[0.1rem] text-[#1f2134] underline underline-offset-8 pt-10 pb-2 hover:text-slate-500">Forgot your password?</a>
                <button class="uppercase text-center p-4 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300" type="submit" name="send">Sign In</button>
            </div>
        </form>
    </div>
</div>
<script>
</script>
