<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
</head>
<body>
    <?php require("templates/sidebar.php") ?>
    <div class="grow">
        <?php require("templates/header.php") ?>
        <div class="relative px-4 mt-6">
            <h1 class="text-2xl mb-4">Edit Role</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-2">
                <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <form action="">
                            <div class="mb-5">
                                <label for="user-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Rui" required disabled readonly/>
                            </div>
                            <div class="mb-5">
                                <label for="user-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="rui@mail.com" required disabled readonly/>
                            </div>
                            <div class="mb-5">
                                <label for="user-role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select id="product-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black">
                                    <option>Admin</option>
                                    <option>Manager</option>
                                    <option>Employee</option>
                                    <option>Customer</option>
                                </select>
                            </div>
                            <button type="submit" class="uppercase text-xs px-3 rounded-xl py-3 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Update Role</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>