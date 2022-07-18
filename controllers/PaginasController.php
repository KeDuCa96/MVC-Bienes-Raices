<?php
namespace Controllers;

use Model\Propiedad;
use Model\Blog;
use Model\Nosotros;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $blog = Blog::get(2);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'blog' => $blog,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router){
        $nosotros = Nosotros::all();

        $router->render('paginas/nosotros',[
            'nosotros' => $nosotros
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = validarIDurl('/propiedades');
        $propiedades = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedades' => $propiedades
        ]);
    }
    public static function blog(Router $router){
        $blog = Blog::all();

        $router->render('paginas/blog',[
            'blog' => $blog
        ]);
    }

    public static function entrada(Router $router){
        $id = validarIDurl('/blog');
        $blog = Blog::find($id);

        $router->render('paginas/entrada', [
            'blog' => $blog
        ]);
    }

    public static function contacto(Router $router){
        
        $respuestas = $_POST['contacto'];

        debuguear($respuestas);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crear una instancia de PHPmailer
        $mail = new PHPMailer();
            // Configurar SMTP (protocolo para el envio de email)
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '0426be6505364d';
        $mail->Password = 'cc690a3a425b90';
        $mail->SMTPSecure = 'tls';  //(Transport Layer Security, seguridad de la capa de transporte). También se puede usar SSL. 
        $mail->Port = 2525;
            // Configurar contenido del mail
        $mail->setFrom('admin@bieneresraices.com'); // Quien envia
        $mail->addAddress('admin@bieneresraices.com', 'BienesRaices.com'); // Quien recibe
        $mail->Subject = 'Tienes un nuevo mensaje';
            // Habillitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
            // Definir contenido
        $contenido = '<html>';
        $contenido .= '<p>Tienes un nuevo mensaje</p>';
        $contenido .= '<p>Nombre: '. $respuestas['nombre'] .'</p>';
        $contenido .= '<p>Email: '. $respuestas['email'] .'</p>';
        $contenido .= '<p>Telefono: '. $respuestas['telefono'] .'</p>';
        $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
        $contenido .= '<p>Tipo de servicio: '. $respuestas['tipo'] .'</p>';
        $contenido .= '<p>Precio o presupuesto: $'. $respuestas['precio'] .'</p>';
        $contenido .= '<p>Contactar por: '. $respuestas['contacto'] .'</p>';
        $contenido .= '<p>Fecha: '. $respuestas['fecha'] .'</p>';
        $contenido .= '<p>Hora: '. $respuestas['hora'] .'</p>';
        $contenido .= '</html>';
        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto alternativo sin HTML';
            // Enviar el email
        if($mail->send())
            echo "Enviado";
        }else{
            echo "No enviado";
        }


        $router->render('paginas/contacto', [

        ]);
    }
}