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
            <form class="max-w-lg mx-auto" method="POST" action="<?= ROOT ?>/insert-product" enctype="multipart/form-data">
                <div class="mb-5">
                    <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="product-name" id="product-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Jacket" required />
                </div>
                <div class="mb-5">
                    <label for="product-reference" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reference</label>
                    <input type="text" name="product-reference" id="product-reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="HM309977" required />
                </div>
                <div class="mb-5">
                    <label for="product-category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="product-category" name="product-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black">
                        <?php foreach ( $categories as $category ) { 
                            $categoryName = str_replace(" ", "-", $category["name"]);
                        ?>
                            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="product-subcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subcategory</label>
                    <select id="product-subcategory" name="product-subcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black">
                        <?php foreach ( $subcategories as $subcategory ) {
                            require_once("../models/categories.php");
                            
                            $modelCategories = new Categories();

                            $subcategoryName = str_replace(" ", "-", $subcategory["name"]);

                            $sub = $modelCategories->getSubcategoryParentId($subcategory["id"]);
                        ?>
                            <option value="<?= $subcategory["id"] ?>" data-category-id="<?= $sub["parent_id"] ?>"><?= $subcategory["name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="product-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description (Optional)</label>
                    <textarea id="product-description" name="product-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-black focus:border-black dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black dark:focus:border-black" placeholder="Write a description of the product..."></textarea>
                </div>
                <div class="mb-5">
                    <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="product-price" step="1.00" class="bg-gray-50 rounded-lg border px-2 py-1">
                </div>
                <div class="mb-5 text-sm">
                    <h2 class="font-medium">Colors</h2>
                    <label for="colors">Select the colors of the product:</label>
                    <input type="text" id="color-search" name="color-search" list="color-options" placeholder="Select colors" oninput="handleSelection(event)">
                    <datalist id="color-options">
                        <?php foreach ($colors as $color) { ?>
                            <?php 
                                $colorN = str_replace("/", " ", $color); 
                                $colorName = str_replace(" ", "-", $colorN);
                            ?>
                            <option value="<?= $color["id"] ?>" data-url="<?= $color["image_url"] ?>"><?= $colorName["name"] ?></option>
                        <?php } ?>
                    </datalist>

                    <div id="selected-colors" class="flex gap-1"></div>

                    <!-- Hidden input to store selected color IDs -->
                    <input type="hidden" id="selected-colors-input" name="color-options" value="">
                </div>

                <!-- Div to dynamically add image upload fields for each color -->
                <div id="color-image-uploads"></div>

                <div class="text-sm">
                    <h2 class="font-medium">Sizes & Stocks</h2>
                    <div class="size-stock-container">
                        <!-- Size: XS -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xs">XS</label>
                            <input type="number" id="size-xs" name="stock[1]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: S -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-s">S</label>
                            <input type="number" id="size-s" name="stock[2]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: M -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-m">M</label>
                            <input type="number" id="size-m" name="stock[3]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: L -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-l">L</label>
                            <input type="number" id="size-l" name="stock[4]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: XL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xl">XL</label>
                            <input type="number" id="size-xl" name="stock[5]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: XXL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-xxl">XXL</label>
                            <input type="number" id="size-xxl" name="stock[6]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>

                        <!-- Size: 3XL -->
                        <div class="size-stock-row">
                            <label class="size-label" for="size-3xl">3XL</label>
                            <input type="number" id="size-3xl" name="stock[7]" placeholder="Stock" class="stock-input" min="0" required>
                        </div>
                    </div>
                </div>

                <button type="submit" name="send" class="uppercase text-xs px-3 rounded-xl py-3 bg-[#1f2134] text-white tracking-wider my-6 hover:bg-white hover:text-[#1f2134] border-2 border-[#1f2134] transition-all duration-300">Create product</button>
            </form>
        </div>
    </div>
    <script>
        let selectedColors = [];

        document.getElementById("product-category").addEventListener("change", function () {
            const selectedCategoryId = this.value; // Get the selected category ID
            const subcategorySelect = document.getElementById("product-subcategory");

            // Get all subcategory options
            const subcategoryOptions = subcategorySelect.querySelectorAll("option");

            // Loop through each subcategory option
            subcategoryOptions.forEach(option => {
                const categoryId = option.getAttribute("data-category-id");

                if (categoryId === selectedCategoryId || option.value === "") {
                    option.style.display = "block"; // Show the matching subcategory
                } else {
                    option.style.display = "none"; // Hide non-matching subcategories
                }
            });

            // Reset the subcategory select to its first option
            subcategorySelect.value = "";
        });

        function previewImages(event, colorId) {
            const files = event.target.files;
            const previewContainer = document.getElementById(`image-preview-${colorId}`);
            
            // Clear the container first to avoid multiple appends
            previewContainer.innerHTML = "";

            // Loop through each file and create an image preview
            Array.from(files).forEach(file => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.classList.add('w-24', 'h-24', 'object-cover', 'rounded-lg'); // Tailwind styles for thumbnail
                        previewContainer.appendChild(imgElement);
                    };

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });
        }

        function createColorImageUploadField(colorId, colorName) {
            const uploadDiv = document.getElementById("color-image-uploads");

            // Create a container for this color
            const colorContainer = document.createElement("div");
            colorContainer.className = "mb-5";
            colorContainer.innerHTML = `
                <h3 class="font-medium mb-2">Upload images for ${colorName}</h3>
                <input type="file" name="color_images[${colorId}][]" multiple accept="image/*" onchange="previewImages(event, ${colorId})" />

                <div id="image-preview-${colorId}" class="flex flex-wrap gap-2 mb-5">
                    
                </div>
            `;

            uploadDiv.appendChild(colorContainer);
        }

        function handleSelection(event) {
            const color = event.target.value;
            const colorOption = Array.from(document.querySelectorAll("#color-options option"))
                .find(option => option.value === color);

            if (color && colorOption && selectedColors.length < 6 && !selectedColors.includes(colorOption.value)) {
                selectedColors.push({
                    id: colorOption.value, // Store the color ID
                    name: colorOption.innerText,
                    url: colorOption.dataset.url
                });
                event.target.value = ""; // Clear the input field after selection
                updateSelectedColors();
                updateHiddenInput();
                createColorImageUploadField(colorOption.value, colorOption.innerText);
            }
        }

        function updateSelectedColors() {
            const container = document.getElementById("selected-colors");
            container.innerHTML = ""; // Clear current selections

            selectedColors.forEach((colorObj, index) => {
                const colorTag = document.createElement("span");

                // Create the image element for the color
                const img = document.createElement("img");
                img.src = colorObj.url;
                img.width = 24;
                img.height = 24;
                img.alt = colorObj.name;
                
                colorTag.appendChild(img);
                colorTag.style.cursor = "pointer";
                colorTag.onclick = () => removeColor(index);

                container.appendChild(colorTag);
            });
        }

        function removeColor(index) {
            selectedColors.splice(index, 1);
            updateSelectedColors();
            updateHiddenInput();
        }

        function updateHiddenInput() {
            // Update hidden input field with the selected color IDs
            const hiddenInput = document.getElementById("selected-colors-input");
            const selectedColorIds = selectedColors.map(color => color.id); // Extract only the IDs
            hiddenInput.value = selectedColorIds.join(","); // Store IDs as comma-separated values
        }
    </script>
</body>
</html>