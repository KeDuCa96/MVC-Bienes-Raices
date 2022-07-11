<?php
use App\Nosotros;
$nosotros = Nosotros::all();
?>

<?php foreach ($nosotros as $nosotros){?>
    <div class="seccion-nosotros">
        <div class="nosotros">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $nosotros->imagen ?>" alt="Sobre Nosotros">
        </div>

        <div class="texto-nosotros">
            <blockquote>
                <?php echo $nosotros->tituloNosotros ?>
            </blockquote>
            <p> <?php echo $nosotros->descripcionNosotros ?> </p>
        </div>
    </div>
<?php } ?>