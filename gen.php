<?php

function generate($src_dir) {
    $dst = $src_dir . "/index.html";
    $src = $src_dir . "/src.php";

    $cwd = getcwd();

    /* footnotes_reset(); */
    ob_start();
    chdir($src_dir);

    include("header.php");
    include($src);
    /* include("footer.php"); */

    $contents = ob_get_contents();

    chdir($cwd);

    ob_end_clean();

    file_put_contents($dst, $contents);

    echo("Generated $dst \n");
}


// List of generation (manual)
generate(".");
generate("test");
?>

