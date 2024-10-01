<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hackett London - Insert New Product</title>
</head>
<body>
    <?php require("templates/sidebar.php") ?>
    <div class="grow">
        <?php require("templates/header.php") ?>
        
        <div class="relative px-4 mt-6">
            <h1 class="text-2xl mb-4">Insert Product</h1>
            <form class="max-w-lg mx-auto" action="">
                <div class="mb-5">
                    <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Jacket" required />
                </div>
                <div class="mb-5">
                    <label for="product-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="product-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black">
                        <option>Clothing</option>
                        <option>Accessories</option>
                        <option>Shoes</option>
                        <option>Boys</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description (Optional)</label>
                    <textarea id="product-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-black focus:border-black dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Write a description of the product..."></textarea>
                </div>
                <div class="mb-5">
                    <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="product-price" step="1.00" class="bg-gray-50 rounded-lg border px-2 py-1">
                </div>
                <div class="mb-5 text-sm">
                    <h2 class="font-medium">Colors</h2>
                    <label for="colors">Select the colors of the product:</label>
                    <input type="text" id="color-search" list="color-options" placeholder="Select colors" oninput="handleSelection(event)">
                    <datalist id="color-options">
                        <option value="amr-navy"></option>
                        <option value="camel-beige"></option>
                        <option value="deep-green"></option>
                        <option value="green-white"></option>
                        <option value="light-grey"></option>
                    </datalist>

                    <div id="selected-colors" class="flex gap-1">
                        
                    </div>
                    <br>
                </div>
                <div class="text-sm">
                    <h2 class="font-medium">Sizes & Stocks</h2>
                    <div class="size-stock-container">
                        <!-- Size: XS -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xs">XS</label>
                            <input type="number" id="size-xs" name="stock[xs]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: S -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-s">S</label>
                            <input type="number" id="size-s" name="stock[s]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: M -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-m">M</label>
                            <input type="number" id="size-m" name="stock[m]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: L -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-l">L</label>
                            <input type="number" id="size-l" name="stock[l]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: XL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xl">XL</label>
                            <input type="number" id="size-xl" name="stock[xl]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: XXL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xxl">XXL</label>
                            <input type="number" id="size-xxl" name="stock[xxl]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: 3XL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-3xl">3XL</label>
                            <input type="number" id="size-3xl" name="stock[3xl]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="product-images">Upload Images</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="product-images" id="product-images" type="file">
                </div>
                <button type="submit" class="uppercase text-xs px-3 rounded-xl py-3 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Create product</button>
            </form>
        </div>
    </div>
    <script>
        let selectedColors = [];

        function handleSelection(event) {
            const color = event.target.value;
            if (color && selectedColors.length < 6 && !selectedColors.includes(color)) {
            selectedColors.push(color);
            event.target.value = '';
            updateSelectedColors();
            }
        }

        function updateSelectedColors() {
            const container = document.getElementById('selected-colors');
            container.innerHTML = '';
            selectedColors.forEach((color, index) => {
            const colorTag = document.createElement('span');

            const img = document.createElement('img')
            img.src = 'http://localhost:8888/finalProjectBackoffice/images/colors/' + color + '-color.webp'
            img.width = '24'
            img.height = '24'
            console.log(color + '-color.webp');
            colorTag.appendChild(img)
            colorTag.style.cursor = 'pointer';
            colorTag.onclick = () => removeColor(index);
            container.appendChild(colorTag);
            });
        }

        function removeColor(index) {
            selectedColors.splice(index, 1);
            updateSelectedColors();
        }
    </script>
</body>
</html>