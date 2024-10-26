<?php require("templates/header.php") ?>
<div class="flex h-full grow">
    <?php require("templates/sidebar.php") ?>
    <div class="px-4 mt-6 w-4/5">
        <div id="overview-cards" class="flex gap-2">
            <div class="flex rounded-xl bg-gray-100 w-1/4 h-16 p-2 gap-1">
                <div id="icon" class="my-auto rounded-full bg-gray-200 p-2">
                    <svg class="w-6 h-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path d="m0 0h32v32h-32z"/>
                            <path d="m19 1.73205081 7.8564065 4.53589838c1.8564064 1.07179677 3 3.05255889 3 5.19615241v9.0717968c0 2.1435935-1.1435936 4.1243556-3 5.1961524l-7.8564065 4.5358984c-1.8564065 1.0717968-4.1435935 1.0717968-6 0l-7.85640646-4.5358984c-1.85640646-1.0717968-3-3.0525589-3-5.1961524v-9.0717968c0-2.14359352 1.14359354-4.12435564 3-5.19615241l7.85640646-4.53589838c1.8564065-1.07179677 4.1435935-1.07179677 6 0zm4.0203166 9.82532719c-.259282-.4876385-.8647807-.672758-1.3524192-.4134761l-5.6794125 3.0187491-5.6793299-3.0187491c-.4876385-.2592819-1.09313718-.0741624-1.35241917.4134761-.25928198.4876385-.07416246 1.0931371.41347603 1.3524191l5.61827304 2.9868539.0000413 6.7689186c0 .5522848.4477153 1 1 1 .5522848 0 1-.4477152 1-1l-.0000413-6.7689186 5.6183556-2.9868539c.4876385-.259282.6727581-.8647806.4134761-1.3524191z" fill="#202327"/>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col my-auto gap-1">
                    <h1 class="text-xs text-gray-500">Total Products</h1>
                    <div class="flex items-center gap-2">
                        <p id="quantity-number" class="text-md">250</p>
                        <div id="quantity-percentage" class="w-3 h-3 flex items-center rounded-full p-[2px] bg-red-300">
                            <svg class="w-3 h-3" viewBox="0 0 72 72" id="emoji" xmlns="http://www.w3.org/2000/svg">
                            <g id="color">
                                <polygon id="_x2199__xFE0F__1_" fill="#ffffff" stroke="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            <g id="hair"/>
                            <g id="skin"/>
                            <g id="skin-shadow"/>
                            <g id="line">
                                <polygon id="_x2199__xFE0F__1_" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            </svg>
                        </div>
                        <p class="text-xs text-red-300">-2.5%</p>
                    </div>
                </div>
            </div>
            <div class="flex rounded-xl bg-gray-100 w-1/4 h-16 p-2 gap-1">
                <div id="icon" class="my-auto rounded-full bg-gray-200 p-2">
                <svg class="w-6 h-6" viewBox="0 0 1024 1024" fill="#000000" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M824.8 1003.2H203.2c-12.8 0-25.6-2.4-37.6-7.2-11.2-4.8-21.6-12-30.4-20.8-8.8-8.8-16-19.2-20.8-30.4-4.8-12-7.2-24-7.2-37.6V260c0-12.8 2.4-25.6 7.2-37.6 4.8-11.2 12-21.6 20.8-30.4 8.8-8.8 19.2-16 30.4-20.8 12-4.8 24-7.2 37.6-7.2h94.4v48H203.2c-26.4 0-48 21.6-48 48v647.2c0 26.4 21.6 48 48 48h621.6c26.4 0 48-21.6 48-48V260c0-26.4-21.6-48-48-48H730.4v-48H824c12.8 0 25.6 2.4 37.6 7.2 11.2 4.8 21.6 12 30.4 20.8 8.8 8.8 16 19.2 20.8 30.4 4.8 12 7.2 24 7.2 37.6v647.2c0 12.8-2.4 25.6-7.2 37.6-4.8 11.2-12 21.6-20.8 30.4-8.8 8.8-19.2 16-30.4 20.8-11.2 4.8-24 7.2-36.8 7.2z" fill="" /><path d="M752.8 308H274.4V152.8c0-32.8 26.4-60 60-60h61.6c22.4-44 67.2-72.8 117.6-72.8 50.4 0 95.2 28.8 117.6 72.8h61.6c32.8 0 60 26.4 60 60v155.2m-430.4-48h382.4V152.8c0-6.4-5.6-12-12-12H598.4l-5.6-16c-12-33.6-43.2-56-79.2-56s-67.2 22.4-79.2 56l-5.6 16H334.4c-6.4 0-12 5.6-12 12v107.2zM432.8 792c-6.4 0-12-2.4-16.8-7.2L252.8 621.6c-4.8-4.8-7.2-10.4-7.2-16.8s2.4-12 7.2-16.8c4.8-4.8 10.4-7.2 16.8-7.2s12 2.4 16.8 7.2L418.4 720c4 4 8.8 5.6 13.6 5.6s10.4-1.6 13.6-5.6l295.2-295.2c4.8-4.8 10.4-7.2 16.8-7.2s12 2.4 16.8 7.2c9.6 9.6 9.6 24 0 33.6L449.6 784.8c-4.8 4-11.2 7.2-16.8 7.2z" fill="" /></svg>
                </div>
                <div class="flex flex-col my-auto gap-1">
                    <h1 class="text-xs text-gray-500">Completed Orders</h1>
                    <div class="flex items-center gap-2">
                        <p id="quantity-number" class="text-md">250</p>
                        <div id="quantity-percentage" class="w-3 h-3 flex items-center rounded-full p-[2px] bg-emerald-300">
                            <svg class="w-3 h-3" viewBox="0 0 72 72" id="emoji" xmlns="http://www.w3.org/2000/svg">
                            <g id="color">
                                <polygon id="_x2199__xFE0F__1_" fill="#ffffff" stroke="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            <g id="hair"/>
                            <g id="skin"/>
                            <g id="skin-shadow"/>
                            <g id="line">
                                <polygon id="_x2199__xFE0F__1_" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            </svg>
                        </div>
                        <p class="text-xs text-emerald-300">+2.5%</p>
                    </div>
                </div>
            </div>
            <div class="flex rounded-xl bg-gray-100 w-1/4 h-16 p-2 gap-1">
                <div id="icon" class="my-auto rounded-full bg-gray-200 p-2">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="#000000" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="1" d="M16 4C18.175 4.01211 19.3529 4.10856 20.1213 4.87694C21 5.75562 21 7.16983 21 9.99826V15.9983C21 18.8267 21 20.2409 20.1213 21.1196C19.2426 21.9983 17.8284 21.9983 15 21.9983H9C6.17157 21.9983 4.75736 21.9983 3.87868 21.1196C3 20.2409 3 18.8267 3 15.9983V9.99826C3 7.16983 3 5.75562 3.87868 4.87694C4.64706 4.10856 5.82497 4.01211 8 4" stroke="#000000" stroke-width="1.5"/>
                    <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="#000000" stroke-width="1.5"/>
                    <path d="M14.5 11L9.50004 16M9.50002 11L14.5 16" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="flex flex-col my-auto gap-1">
                    <h1 class="text-xs text-gray-500">Canceled Orders</h1>
                    <div class="flex items-center gap-2">
                        <p id="quantity-number" class="text-md">250</p>
                        <div id="quantity-percentage" class="w-3 h-3 flex items-center rounded-full p-[2px] bg-emerald-300">
                            <svg class="w-3 h-3" viewBox="0 0 72 72" id="emoji" xmlns="http://www.w3.org/2000/svg">
                            <g id="color">
                                <polygon id="_x2199__xFE0F__1_" fill="#ffffff" stroke="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            <g id="hair"/>
                            <g id="skin"/>
                            <g id="skin-shadow"/>
                            <g id="line">
                                <polygon id="_x2199__xFE0F__1_" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            </svg>
                        </div>
                        <p class="text-xs text-emerald-300">+2.5%</p>
                    </div>
                </div>
            </div>
            <div class="flex rounded-xl bg-gray-100 w-1/4 h-16 p-2 gap-1">
                <div id="icon" class="my-auto rounded-full bg-gray-200 p-2">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C15.866 16 19 12.866 19 9C19 5.13401 15.866 2 12 2C8.13401 2 5 5.13401 5 9C5 12.866 8.13401 16 12 16ZM12 6C11.7159 6 11.5259 6.34084 11.1459 7.02251L11.0476 7.19887C10.9397 7.39258 10.8857 7.48944 10.8015 7.55334C10.7173 7.61725 10.6125 7.64097 10.4028 7.68841L10.2119 7.73161C9.47396 7.89857 9.10501 7.98205 9.01723 8.26432C8.92945 8.54659 9.18097 8.84072 9.68403 9.42898L9.81418 9.58117C9.95713 9.74833 10.0286 9.83191 10.0608 9.93531C10.0929 10.0387 10.0821 10.1502 10.0605 10.3733L10.0408 10.5763C9.96476 11.3612 9.92674 11.7536 10.1565 11.9281C10.3864 12.1025 10.7318 11.9435 11.4227 11.6254L11.6014 11.5431C11.7978 11.4527 11.8959 11.4075 12 11.4075C12.1041 11.4075 12.2022 11.4527 12.3986 11.5431L12.5773 11.6254C13.2682 11.9435 13.6136 12.1025 13.8435 11.9281C14.0733 11.7536 14.0352 11.3612 13.9592 10.5763L13.9395 10.3733C13.9179 10.1502 13.9071 10.0387 13.9392 9.93531C13.9714 9.83191 14.0429 9.74833 14.1858 9.58118L14.316 9.42898C14.819 8.84072 15.0706 8.54659 14.9828 8.26432C14.895 7.98205 14.526 7.89857 13.7881 7.73161L13.5972 7.68841C13.3875 7.64097 13.2827 7.61725 13.1985 7.55334C13.1143 7.48944 13.0603 7.39258 12.9524 7.19887L12.8541 7.02251C12.4741 6.34084 12.2841 6 12 6Z" fill="#1C274C"/>
                        <path d="M7.09301 15.9414L6.71424 17.323C6.0859 19.6148 5.77173 20.7607 6.19097 21.3881C6.3379 21.6079 6.535 21.7844 6.76372 21.9008C7.41634 22.2331 8.424 21.7081 10.4393 20.658C11.1099 20.3086 11.4452 20.1339 11.8014 20.0959C11.9335 20.0818 12.0665 20.0818 12.1986 20.0959C12.5548 20.1339 12.8901 20.3086 13.5607 20.658C15.576 21.7081 16.5837 22.2331 17.2363 21.9008C17.465 21.7844 17.6621 21.6079 17.809 21.3881C18.2283 20.7607 17.9141 19.6148 17.2858 17.323L16.907 15.9414C15.5208 16.9231 13.8278 17.5 12 17.5C10.1722 17.5 8.47915 16.9231 7.09301 15.9414Z" fill="#1C274C"/>
                    </svg>
                </div>
                <div class="flex flex-col my-auto gap-1">
                    <h1 class="text-xs text-gray-500">Top Products</h1>
                    <div class="flex items-center gap-2">
                        <p id="quantity-number" class="text-md">250</p>
                        <div id="quantity-percentage" class="w-3 h-3 flex items-center rounded-full p-[2px] bg-emerald-300">
                            <svg class="w-3 h-3" viewBox="0 0 72 72" id="emoji" xmlns="http://www.w3.org/2000/svg">
                            <g id="color">
                                <polygon id="_x2199__xFE0F__1_" fill="#ffffff" stroke="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            <g id="hair"/>
                            <g id="skin"/>
                            <g id="skin-shadow"/>
                            <g id="line">
                                <polygon id="_x2199__xFE0F__1_" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="8" points="14.5044,34.702 13.6073,58.9309 37.8362,58.0338 37.6303,52.4758 23.4704,53.0004 59.3629,17.1079 55.4303,13.1753 19.5378,49.0678 20.0624,34.9079"/>
                            </g>
                            </svg>
                        </div>
                        <p class="text-xs text-emerald-300">+2.5%</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="sales-report" class="mt-6">
            <h1 class="text-md">Your sales report</h1>
            <p class="text-gray-500 text-xs mt-1">Look at your sales</p>
            <div id="overview-total-sales" class="flex h-64 items-center gap-4">
                <h2 class="text-3xl">$4,456.99</h2>
                <div id="overview-sales-graph" class="grow h-full">

                </div>
            </div>
        </div>
    </div>
</div>