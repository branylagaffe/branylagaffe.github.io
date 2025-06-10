    <main>
      <section>
        <h1>Title of the article</h1>
        <time datetime="1996-01-17">[ 17/01/1996 ]</time>
      </section>
      <article>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
        <?= figure("https://placehold.co/600x400", "Placeholder") ?>
        <?= h("subtitle") ?>
        <p>Lorem ipsum dolor sit <a href="/">amet</a> consectetur adipisicing elit...</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <p>Lorem <?= code("ipsum") ?> dolor sit amet consectetur adipisicing elit...</p>
        <?= h("Test Code") ?>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
<pre>
<?= cli_input("git clone git@github.com:fabiensanglard/cpsb.git") ?>
<?= cli_output("lorem10") ?>
<?= cli_input("cs cpsb") ?>
<?= cli_input("sudo apt install inkscape") ?>
<?= cli_input("sudo apt install -y texlive-full") ?>
<?= cli_input("./make.sh release") ?>
</pre>
      </article>
    </main>
