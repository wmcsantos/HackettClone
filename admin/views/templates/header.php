<header class="flex gap-4 px-8 h-14 grow border-b items-center justify-end text-sm text-[#1f2134] bg-white">
    <div id="view-shop">
        <a class="flex gap-1 items-center" href="/" target="_blank">
            View your shop
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path id="Vector" d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <div class="flex gap-1 items-center">
        <div class="flex items-center relative overflow-hidden">
            <p class="text-center m-4 text-black text-md font-medium"><?= isset($_SESSION["admin_name"]) ? $_SESSION["admin_name"] : '' ?></p>
            <a href="<?php echo isset($_SESSION["admin_name"]) ? ROOT . '/logout' : ROOT . '/login' ?>">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM10 13C7.79086 13 6 14.7909 6 17V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V17C18 14.7909 16.2091 13 14 13H10Z" fill="#383838"/>
                </svg>
            </a>
        </div>
    </div>
</header>