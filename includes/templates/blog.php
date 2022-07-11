<?php
use App\Blog;
$blog = Blog::all();
if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $blog = Blog::all();
}else{
    $blog = Blog::get(2);
}
?>

<?php foreach ($blog as $blog){ ?>
    <article class="entrada-blog">


        <div class="imagen">
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="texto de Entrada blog">
        </div>

        <div class="texto-entrada">
            <a href="#.php">
                <h4> <?php echo $blog->tituloBlog; ?> </h4>
                <p>Escrito el: <span> <?php echo $blog->creadoBlog; ?> </span></span></p>

                <p> <?php echo $blog->descripcionBlog; ?> </p>
            </a>
        </div>

    </article>
<?php } ?>