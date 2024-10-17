<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-between items-center h-[4.5rem] px-8 bg-white">
        <a href="/">
            <img src="<?=ROOT?>/images/logos/hackett-logo.svg" alt="Hackett Logo">
        </a>
        <nav class="flex h-full items-center w-full lg:w-auto lg:block z-10">
            <div class="nav-links absolute lg:static lg:min-h-fit bg-white min-h-full left-0 top-[-100%] w-full md:w-1/2 flex items-start px-5 border-[#eee]">
                <div class="absolute right-5 -top-12 cursor-pointer" onclick="toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <ul class="w-full lg:flex flex-col lg:flex-row lg:h-full leading-[4rem]">
                    <?php foreach ( $categories as $cat) { ?>
                        <li class="category-list group lg:px-5 h-full" data-category-id="<?= $cat['name'] ?>-<?= $cat['id'] ?>">
                            <div class="category-menu flex justify-between cursor-pointer">
                                <a href="<?=ROOT?>/view-all/<?= $cat['name'] ?>" class="hidden lg:block h-full text-sm leading-[4rem] uppercase text-[#1f2134] font-semibold hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-[#1f2134] lg:before:absolute before:left-0 before:bottom-3">
                                    <?= $cat['name'] ?>
                                </a>
                                <a class="lg:hidden h-full text-sm leading-[4rem] block uppercase text-[#1f2134] font-semibold hover:before:scale-x-100 hover:before:origin-left relative before:w-full before:h-0.5 before:origin-right before:transition-transform before:duration-300 before:scale-x-0 before:bg-[#1f2134] lg:before:absolute before:left-0 before:bottom-3">
                                    <?= $cat['name'] ?>
                                </a>
                                <svg class="block my-auto lg:hidden text-gray-800 dark:text-white size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                                </svg>
                            </div>
                            <div id="dropdown-header" class="dropdown-menu flex flex-row gap-4 pl-5 lg:justify-center bg-white absolute left-0 w-full max-h-[800px] lg:p-6 hidden opacity-0 lg:group-hover:opacity-100 lg:group-hover:flex">
                                <div class="w-full lg:w-2/5">
                                    <ul id="subcategories-<?= $cat['name'] ?>-<?= $cat['id'] ?>" class="dropdown-submenu flex flex-col lg:grid grid-flow-col grid-cols-2 grid-rows-7 h-full uppercase text-[#1f2134] text-sm">
                                        
                                    </ul>
                                </div>
                                <div class="1/5 hidden lg:block">
                                    <img class="object-scale-down h-80 w-160" src="<?=ROOT?>/images/clothing-header.jpg" alt="">
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <div class="utility-menu-icons flex h-full justify-center items-center gap-x-2">
            <div class="flex items-center relative overflow-hidden">
                <p class="text-center m-4 text-black text-md font-medium"><?= isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : '' ?></p>
                <a href="<?php echo isset($_SESSION['user_name']) ? ROOT . '/account' : ROOT . '/login' ?>">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM10 13C7.79086 13 6 14.7909 6 17V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V17C18 14.7909 16.2091 13 14 13H10Z" fill="#383838"/>
                    </svg>
                </a>
            </div>
            <a href="<?=ROOT?>/cart" class="flex">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                </svg>
                <span id="cart-quantity">
                    <?php 
                        if (isset($_SESSION["user_id"]))
                        {

                            require_once("models/carts.php");
                            $modelCarts = new Carts();
                            $userActiveCart = $modelCarts->getUserActiveCart($_SESSION["user_id"]);
                            $cartItemsCount = $modelCarts->countCartItemsFromCart($userActiveCart["id"]);
                            
                            echo $cartItemsCount["total_cart_items"];
                        }
                    ?>
                </span>
            </a>
            <button data-collapse-toggle="navbar-default" onclick="toggleMenu()" type="button" class="inline-flex items-center py-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
                    <path fill-rule="evenodd" d="M3 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 5.25Zm0 4.5A.75.75 0 0 1 3.75 9h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

    </div>
    <script>
        const toggleMenu = () => {
            const navLinks = document.querySelector('.nav-links')
            const navUtilityIcons = document.querySelector('.utility-menu-icons')
            navLinks.classList.toggle("top-[4.5rem]")
            navUtilityIcons.classList.toggle("hidden")
        }

        const toggleSubMenu = (event) => {
        // Prevent default behavior if any
        event.stopPropagation();

        // Get the clicked li element
        const clickedLi = event.currentTarget;

        // Find all first-level li elements within the same parent (ul)
        const allLi = clickedLi.parentElement.children;

        // Loop through all li elements
        Array.from(allLi).forEach(li => {
            // Get the dropdown of the current li
            const dropdownMenu = li.querySelector('.dropdown-menu');
            const categoryMenu = li.querySelector('.category-menu');
            
            // Check if the current li is the clicked one
            if (li === clickedLi) {
                // Toggle the visibility of the clicked li's dropdown
                dropdownMenu?.classList.toggle('hidden');
                dropdownMenu?.classList.toggle('opacity-0');

                dropdownMenu.classList.toggle('border-t');
                categoryMenu?.classList.toggle('flex-row-reverse');
                categoryMenu?.classList.toggle('justify-between');
                categoryMenu?.classList.toggle('justify-end');
                categoryMenu?.classList.toggle('space-x-4');
                
            } else {
                // Hide the other li's dropdowns and the li elements themselves
                dropdownMenu?.classList.add('hidden');
                dropdownMenu?.classList.add('opacity-0');
                
                // Hide the li elements
                li.classList.toggle('hidden');
            }
        });
    }

    function addEventListeners() {

        // Check if the screen size is less than 1024px (Tailwind lg)
        if (window.innerWidth < 1024) {
            document.querySelectorAll('nav ul > li.group').forEach(li => {
                li.addEventListener('click', toggleSubMenu);
            });
        } else {
            // Remove the event listener if screen size is greater than or equal to 1024px
            document.querySelectorAll('nav ul > li.group').forEach(li => {
                li.removeEventListener('click', toggleSubMenu);
            });
        }
    }

    // Run on initial load
    addEventListeners();

    // Add event listener on window resize
    window.addEventListener('resize', addEventListeners);

    document.querySelectorAll('.category-list').forEach(item => {
        item.addEventListener('mouseenter', function() {
            const categoryId = this.getAttribute('data-category-id');
            const dropdown = document.querySelector(`#subcategories-${categoryId}`);           
            console.log(categoryId);
            
            if ( dropdown.innerHTML.trim() === '' )
            {
                fetch('/subcategories', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        parent_id: categoryId.split('-')[1]
                    })
                })
                .then( response => response.json() )
                .then( data => {
                    dropdown.innerHTML = '';
                    data.forEach(subcategory => {
                        dropdown.innerHTML += `<li class="h-16 content-center"><a href="/${categoryId.split('-')[0]}/${subcategory.name.replaceAll(' ', '-')}">${subcategory.name}</a></li>`;
                    });
                    dropdown.innerHTML += `<li class="h-16 content-center"><a href="/view-all/${categoryId.split('-')[0]}">View all</a></li>`
                })
                .catch( error => console.error('Error: ', error ));
            }
        })
    })
    </script>
</body>
</html>