
<?php
    function redirect($url){
        echo "<script type='text/javascript'>window.location.href='$url'</script>";
    }
    function dd($var){
        echo "<pre>";
        die(print_r($var));
    }
    function getUrl($modulo,$controlador,$funcion){
        $url="index.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
        return $url;
    }
    function resolve(){
        //Modulo=Carpeta
        //Controlador=Archivo dentro del Modulo
        //Funcion=Metodo en el Controlador
        $modulo=ucwords($_GET['modulo']);
        $controlador=ucwords($_GET['controlador']);
        $funcion=$_GET['funcion'];
        if(is_dir("../controller/$modulo")){
            if(is_file("../controller/$modulo/".$controlador."Controller.php")){
                include_once "../controller/$modulo/".$controlador."Controller.php";
                $nombreClase=$controlador."Controller";
                $objeto=new $nombreClase();
                if(method_exists($objeto,$funcion)){
                    $objeto->$funcion;
                } else {
                    echo "Funcion No Existe";
                }
            } else {
                echo "Controlador No Existe";
            }
        } else {
            echo "Modulo No Existe";
        }
    }
?>