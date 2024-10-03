<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title><?= $category === 'view-all' ? $subcategory : $category ?></title>
    </head>
    <body class="bg-white">
        <?php require("templates/header.php") ?>
        <h1 class="uppercase tracking-[0.25rem] mt-4 mb-12 text-center font-semibold text-3xl"><?= $category === 'view-all' ? $subcategory : $subcategory ?></h1>

        <div class="relative">
            <div id="filters" class="flex h-12 justify-between border-t border-gray-400 uppercase text-xs font-semibold px-8">
                <div class="flex">
                    <div class="flex lg:hidden items-center py-3 pr-4">
                        <button id="open-filters" class="uppercase">Filters</button>
                    </div>
                    <div class="hidden lg:flex items-center py-3 pr-4 cursor-pointer group">
                        <p>Product type</p>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div id="" class="bg-white absolute top-12 left-0 w-full max-h-[800px] lg:p-6 opacity-0 hidden lg:group-hover:opacity-100 lg:group-hover:flex">
                            <div class="grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                                <a href="" class="flex lowercase font-light">
                                    <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center mr-3"></div>
                                    <span class="">shirt</span>
                                    <span>(141)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center py-3 pr-4 cursor-pointer group">
                        <p>Colour</p>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div id="" class="bg-white absolute top-12 left-0 w-full max-h-[800px] lg:p-6 opacity-0 hidden lg:group-hover:opacity-100 lg:group-hover:flex">
                            <div class="grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                                <a href="" class="flex lowercase font-light">
                                    <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center mr-3"></div>
                                    <span class="">shirt</span>
                                    <span>(141)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center py-3 pr-4 cursor-pointer group">
                        <p>Size</p>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div id="" class="bg-white absolute top-12 left-0 w-full max-h-[800px] lg:p-6 opacity-0 hidden lg:group-hover:opacity-100 lg:group-hover:flex">
                            <div class="grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                                <a href="" class="flex lowercase font-light">
                                    <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center mr-3"></div>
                                    <span class="">shirt</span>
                                    <span>(141)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center py-3 pr-4 cursor-pointer group">
                        <p>Length</p>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div id="" class="bg-white absolute top-12 left-0 w-full max-h-[800px] lg:p-6 opacity-0 hidden lg:group-hover:opacity-100 lg:group-hover:flex">
                            <div class="grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                                <a href="" class="flex lowercase font-light">
                                    <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center mr-3"></div>
                                    <span class="">shirtshirt</span>
                                    <span>(141)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center py-3 pr-4 cursor-pointer group">
                        <p>Composition</p>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div id="" class="bg-white absolute top-12 left-0 w-full max-h-[800px] lg:p-6 opacity-0 hidden lg:group-hover:opacity-100 lg:group-hover:flex">
                            <div class="grid grid-rows-4 grid-cols-4 grid-flow-col gap-4">
                                <a href="" class="flex lowercase font-light">
                                    <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center mr-3"></div>
                                    <span class="">shirt</span>
                                    <span>(141)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <span class="hidden lg:block border-r m-3 border-black"></span>
                    <div class="hidden lg:flex items-center py-3 pr-4">
                        <p class="text-gray-500">Clear all filters</p>
                    </div>
                </div>
    
                <div class="flex gap-6">
                    <p class="hidden my-auto lg:block py-3 capitalize text-gray-500 font-extralight">(634) results</p>
                    <div class="flex items-center py-3 pr-4">
                    <button class="uppercase">Sort by</button>
                    <svg class="hidden lg:block" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Drawer for Filters (hidden by default) -->
        <div id="filter-drawer" class="fixed top-0 left-0 h-full w-1/2 bg-white transform -translate-x-full transition-transform duration-300 z-50 lg:hidden">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="uppercase text-xs font-bold">Filters</h2>
                <button id="close-filters" class="text-sm font-bold">✕</button>
            </div>
            <div class="p-4 overflow-y-auto h-full">
                <!-- Accordion for Filters -->
                <div class="accordion-item">
                    <div class="accordion-header flex justify-between py-4 px-0 uppercase text-xs font-semibold cursor-pointer">
                        <h3 class="">Product type</h3>
                        <svg class="accordion-icon lg:block transition-transform duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="accordion-content py-2 px-0 hidden">
                        <a href="" class="flex lowercase font-light">
                            <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center my-auto mr-3"></div>
                            <span class="text-xs">shirt</span>
                            <span class="text-xs">(141)</span>
                        </a>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header flex justify-between py-4 px-0 uppercase text-xs font-semibold cursor-pointer">
                        <h3 class="">Colour</h3>
                        <svg class="accordion-icon lg:block transition-transform duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="accordion-content py-2 px-0 hidden">
                        <a href="" class="flex lowercase font-light">
                            <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center my-auto mr-3"></div>
                            <span class="text-xs">shirt</span>
                            <span class="text-xs">(141)</span>
                        </a>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header flex justify-between py-4 px-0 uppercase text-xs font-semibold cursor-pointer">
                        <h3 class="">Size</h3>
                        <svg class="accordion-icon lg:block transition-transform duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="accordion-content py-2 px-0 hidden">
                        <a href="" class="flex lowercase font-light">
                            <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center my-auto mr-3"></div>
                            <span class="text-xs">shirt</span>
                            <span class="text-xs">(141)</span>
                        </a>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header flex justify-between py-4 px-0 uppercase text-xs font-semibold cursor-pointer">
                        <h3 class="">Length</h3>
                        <svg class="accordion-icon lg:block transition-transform duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="accordion-content py-2 px-0 hidden">
                        <a href="" class="flex lowercase font-light">
                            <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center my-auto mr-3"></div>
                            <span class="text-xs">shirt</span>
                            <span class="text-xs">(141)</span>
                        </a>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header flex justify-between py-4 px-0 uppercase text-xs font-semibold cursor-pointer">
                        <h3 class="">Composition</h3>
                        <svg class="accordion-icon lg:block transition-transform duration-300" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 9L12 16L5 9" stroke="#383838" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="accordion-content py-2 px-0 hidden">
                        <a href="" class="flex lowercase font-light">
                            <div class="checkbox block w-3 h-3 min-w-3 border border-black text-center my-auto mr-3"></div>
                            <span class="text-xs">shirt</span>
                            <span class="text-xs">(141)</span>
                        </a>
                    </div>
                </div>

                <!-- Add other accordion items as necessary -->
            </div>
        </div>

        <!-- Overlay for closing drawer -->
        <div id="drawer-overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40 lg:hidden"></div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            <div id="product" class="flex flex-col mb-10" onclick="">
                <a href="<?=ROOT?>/<?= $category ?>/<?= $subcategory ?>/1"><img class="object-cover mb-4 h-auto w-full" src="<?=ROOT?>/images/product-example.webp" alt=""></a>
                <div class="pl-2">
                    <h4 class="uppercase font-semibold">HIGH NECK WOOL JUMPER WITH ZIPPER</h4>
                    <p class="text-xs">€ 169,00</p>
                </div>
            </div>
            <div id="product" class="flex flex-col mb-10">
                <a href="<?=ROOT?>/<?= $category ?>/<?= $subcategory ?>/2"><img class="object-cover mb-4 h-auto w-full" src="<?=ROOT?>/images/product-example.webp" alt=""></a>
                <div class="pl-2">
                    <h4 class="uppercase font-semibold">HIGH NECK WOOL JUMPER WITH ZIPPER</h4>
                    <p class="text-xs">€ 169,00</p>
                </div>
            </div>
            <div id="product" class="flex flex-col mb-10">
                <a href="<?=ROOT?>/<?= $category ?>/<?= $subcategory ?>/3"><img class="object-cover mb-4 h-auto w-full" src="<?=ROOT?>/images/product-example.webp" alt=""></a>
                <div class="pl-2">
                    <h4 class="uppercase font-semibold">HIGH NECK WOOL JUMPER WITH ZIPPER</h4>
                    <p class="text-xs">€ 169,00</p>
                </div>
            </div>
            <div id="product" class="flex flex-col mb-10">
                <a href="<?=ROOT?>/<?= $category ?>/<?= $subcategory ?>/4"><img class="object-cover mb-4 h-auto w-full" src="<?=ROOT?>/images/product-example.webp" alt=""></a>
                <div class="pl-2">
                    <h4 class="uppercase font-semibold">HIGH NECK WOOL JUMPER WITH ZIPPER</h4>
                    <p class="text-xs">€ 169,00</p>
                </div>
            </div>
            <div id="product" class="flex flex-col mb-10">
                <a href="<?=ROOT?>/<?= $category ?>/<?= $subcategory ?>/5"><img class="object-cover mb-4 h-auto w-full" src="<?=ROOT?>/images/product-example.webp" alt=""></a>
                <div class="pl-2">
                    <h4 class="uppercase font-semibold">HIGH NECK WOOL JUMPER WITH ZIPPER</h4>
                    <p class="text-xs">€ 169,00</p>
                </div>
            </div>
        </div>
        <script>
            // Drawer opening and closing
            const openFiltersBtn = document.getElementById('open-filters');
            const closeFiltersBtn = document.getElementById('close-filters');
            const filterDrawer = document.getElementById('filter-drawer');
            const drawerOverlay = document.getElementById('drawer-overlay');

            // Open drawer
            openFiltersBtn.addEventListener('click', function() {
                filterDrawer.classList.remove('-translate-x-full');
                drawerOverlay.classList.remove('hidden');
            });

            // Close drawer
            closeFiltersBtn.addEventListener('click', function() {
                filterDrawer.classList.add('-translate-x-full');
                drawerOverlay.classList.add('hidden');
            });

            // Close drawer on overlay click
            drawerOverlay.addEventListener('click', function() {
                filterDrawer.classList.add('-translate-x-full');
                drawerOverlay.classList.add('hidden');
            });

            // Accordion functionality
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.accordion-icon');
                    
                    
                    // Toggle the 'show' class on the clicked header's content
                    content.classList.toggle('hidden');

                    // Toggle the 'rotate-180' class for the icon
                    icon.classList.toggle('rotate-180');

                    // Optionally collapse other sections when one is opened
                    accordionHeaders.forEach(otherHeader => {
                        const otherContent = otherHeader.nextElementSibling;
                        if (otherHeader !== header) {
                            otherContent.classList.add('hidden');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });
                });
            });
        </script>

    </body>
</html>
