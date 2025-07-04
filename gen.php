<?php

function figure($image_path, $caption) {
?>
    <figure>
        <img loading="lazy" src="<?= $image_path ?>" alt="<?= $caption ?>">
        <figcaption><?= $caption ?></figcaption>
    </figure>
<?php
}

function cli_input($command) {
    echo "<span>$ </span>$command\n";
}

function cli_output($result) {
    echo "<span>> $result</span>\n";
}

function code($code_word) {
    echo "<code>$code_word</code>";
}

function h($title) {
    echo "<h3>$title</h3>";
    echo "<hr>";
}

function a($url, $content) {
    echo "<a href=\"$url\" target=\"_blank\" rel=\"noopener noreferrer\">$content</a>";
}

/**
 * Find all directory containing a 'src.php. file
 */
function find_articles($directory) {
    $folder_with_src = [];

    // Use RecursiveDirectoryIterator to traverse the directory
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

    foreach ($iterator as $fileInfo) {
        // Check if the current item is a file and its name is 'src.php'
        if ($fileInfo->isFile() && $fileInfo->getFilename() === 'src.php') {
            // Get the directory of the file and add it to the array if not already present
            $folder_path = $fileInfo->getPath();
            if (!in_array($folder_path, $folder_with_src)) {
                $folder_with_src[] = $folder_path;
            }
        }
    }

    return $folder_with_src;
}

/**
 * Generated on page based on the diretory
 *
 */
function generate($src_dir) {
    $dst = basename($src_dir) . "/index.html";
    $src = basename($src_dir) . "/src.php";

    $cwd = getcwd();

    /* footnotes_reset(); */
    ob_start();
    chdir($src_dir);

    include("header.php");
    include($src);
    include("footer.php");

    $contents = ob_get_contents();

    chdir($cwd);

    ob_end_clean();
    file_put_contents($dst, $contents);

    echo("Generated $dst \n");
}

/**
* MAIN SCRIPT
*/
$folders = find_articles(".");
foreach ($folders as $_ => $folder) {
    generate($folder);
}

?>

