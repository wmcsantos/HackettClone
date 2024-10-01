<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title><?php echo $subcategories[0]["parent_name"]; ?></title>
    </head>
    <body>
        <main>
            <h1 class="bg-blue-400"><?php echo $subcategories[0]["parent_name"]; ?></h1>
            <ul>
<?php
    foreach($subcategories as $subcategory) {
        echo '
                <li class="bg-blue-400">
                    <a href="' .ROOT. '/products/' .$subcategory["category_id"]. '" >' .$subcategory["name"]. '</a>
                </li>
        ';
    }
?>
            </ul>
<?php
    require("templates/navigation.php");
?>
        </main>
    </body>
</html>