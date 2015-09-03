<?php
class HTML 
{   
    public function esquemaHTML($html)
    {
        $codigo = "
                    <html>
                        ".$html."
                    </html>
                  ";
        return $codigo;
    }
    
    public function head($css, $js, $titulo)
    {
        $codigo = "
                    <head>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0'>
                        <title>".$titulo."</title>
                        ".$css."
                        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Lato:300,400'>
                        <link rel='stylesheet' type='text/css' href='css/menuresponsive.css'>  
                        <link rel='stylesheet' type='text/css' href='css/flexigrid.css' />
                        <link rel='stylesheet' type='text/css' href='css/queryLoader.css' type='text/css' />
                        <link rel='stylesheet' type='text/css' href='css/estilos.css' />
                        <link rel='stylesheet' type='text/css' href='css/main.css' />

                        <script src='http://code.jquery.com/jquery-1.11.1.min.js'></script>
                        <link rel='stylesheet' href='//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css'>
                        <script src='//code.jquery.com/ui/1.11.3/jquery-ui.js'></script>
                        <script type='text/javascript' src='js/funciones.js'></script>
                        <script type='text/javascript' src='js/menuresponsive.js'></script>                        
                        <script type='text/javascript' src='js/queryLoader.js'></script>                       
                        <script type='text/javascript' src='js/flexigrid.js'></script>
                        <script type='text/javascript' src='js/menuBotones.js'></script>
                        <script type='text/javascript'>$.mobile.loader.prototype.options.html = ' ';</script>
						
                    </head>
                  ";
        return $codigo;
    }
    
    public function body($html)
    {
        $codigo = "
                    <body>
                        ".$html."
                        <script type='text/javascript'>
                            QueryLoader.init();
                        </script>
                    </body>
                  ";
        return $codigo;
    }
    
    public function header($html)
    {
        $codigo = "
                    <header>
                        ".$html."
                    </header>
                  ";
        return $codigo;
    }
    
    public function figure($rutaImagen)
    {        
        $codigo = "
                    <figure> 
                        <img src='".$rutaImagen."'/>
                    </figure>
                  ";
        return $codigo;
    }
    
    public function nav($menu)
    {   
        $codigo = "
                    <nav> 
                       <div class='container-fluid'>                
                            <div class='navbar-header'>
                              <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#menu'>                   
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                              </button>
                              <a class='navbar-brand' href='https://www.henry-chavez.com'>Menu Responsive</a>
                            </div>
                            <div class='collapse navbar-collapse' id='menu'>
                  ";
        
        $codigo .= $menu;
             
        $codigo .= "        </div>
                        </div>              
                    </nav>
                  ";            
        return $codigo;
    }
    
    public function section($html)
    {
        $codigo = "
                    <section>
                        ".$html."
                    </section>
                  ";
        return $codigo;
    }
    
    public function article($html)
    {
        $codigo = "
                    <article>
                         ".$html."
                    </article>
                  ";
        return $codigo;
    }
    
    public function aside($html)
    {
        $codigo = "
                    <aside> 
                        ".$html."
                    </aside>
                  ";
        return $codigo;
    }
    
    public function footer($html)
    {
        $codigo = "
                    <footer>
                        ".$html."
                    </footer>
                  ";
        return $codigo;
    }  
    
    public function popUp($html)
    {
        $codigo = "
                    <div id='popUp' style='display:none'>
                    </div>
                  ";
        return $codigo;
    }
    
    public function alert($html)
    {
        $codigo = "
                    <div id='alert'>
                        ".$html."
                    </div>
                  ";
        return $codigo;
    }
    
    static function mensaje($mensaje, $tipo=0)
    {    
        switch($tipo)
        {
            case 0:
            $tipo="tipoError";
            break;
            default:
            return self::mensaje("Tipo de error defindo incorrectamente");
            break;
        }
        
        echo "<p class".$tipo.">".$mensaje."</p>";
        
        if($tipo == "tipoError")
        {
            die();
        }
    }
    
    public function tabla($cabecera = array(), $filas = array())
    {
        $codigo = "<table border='1'><thead><tr>";
        
        foreach($cabecera as $campo)
        {
            $codigo .= "<td>".$campo."</td>";                
        }
        
        $codigo .= "</tr><thead><tbody>";
       
        $i=0;
        foreach ($filas as $clave => $valor) 
        {
            $codigo .= "<tr>";
            foreach ($valor as $clave2 => $valor2) 
            {
                $codigo .= "<td>".$valor2."</td>";
            }
            $codigo .= "</tr>";  
        }
        
        $codigo .= "</tbody></table>";   
        return $codigo;
    }
    
    public function texto($id, $texto = "") 
    {
        $codigo = "<label ";
        
        if (!empty($id)) 
        {
            $codigo .= "id='".$id."'";
        }
        
        $codigo .= ">";
            
        if (!empty($texto)) 
        {
            $codigo .= $texto;
        }
        
        $codigo .= "</label>";        
        return $codigo;
    }   
        
    public function parrafo($texto, $clase = "")
    {
        $codigo = "<p"; 

        if (empty($clase))
        {
            $codigo .=  " class='".$clase."'";
        }

        $codigo .= ">";
        
        if (!empty($texto))
        {
            $codigo .= $texto;
        }
        
        $codigo .= "</p>";
        return $codigo;
    }
    
    public function cajaTexto($id, $texto = "",$maxlength="", $ayuda = "", $clase = "")
    {
        $codigo = "<input type='text' ";
        if(!empty($id))
        {
            $codigo .= "id='".$id."'";
        }
        else
        {
            return self::mensaje("Error al utilizar la funcion cajaTexto: no envio id");
        }
        
        if(!empty($clase))
        {
            $codigo .= "class='".$clase."'";
        }
        else
        {
            return self::mensaje("Error al utilizar la funcion cajaTexto: no envio clase");
        }
        
        if(!empty($texto))
        {
            $codigo .= "value='".$texto."'";
        }
        
        if(!empty($ayuda))
        {
            $codigo .= "placeholder='".$ayuda."'";
        }

        if(!empty($maxlength))
        {
            $codigo .= "maxlength='".$maxlength."'";
        }

        $codigo .= "/>"; 
        return $codigo;
    }
    
    public function lista($id, $valores = array(), $clase = "")
    {
        $codigo = "<select ";
        
        if(!empty($id))
        {
            $codigo .= "id='".$id."'";
        }
        else
        {
            return self::mensaje("Error al utilizar la funcion lista: no envio id");
        }
        
        if(!empty($clase))
        {
            $codigo .= " class='".$clase."'";
        }
        
        $codigo .= ">";
        
        if (!empty($valores))
        {
            foreach ($valores as $clave => $valor) 
            {
                $codigo .= "<option value=".$valor[0].">".$valor[1]."</option>";  
            } 
        }
        else
        {
            return self::mensaje("Error al utilizar la funcion lista: no envio valores");
        }
        
        $codigo .= "</select>";        
        return $codigo;
    }


    
    public function boton($id, $texto = "", $ayuda = "", $clase = "")
    {
        $codigo = "<input type='button' ";
        
        if(!empty($id))
        {
            $codigo .= "id='".$id."'";
        }
        else
        {
            return self::mensaje("Error al utilizar la funcion boton: no envio id");
        }
        
        if (!empty($texto))
        {
            $codigo .= "value='".$texto."' ";
        }
        
        if (!empty($ayuda))
        {
            $codigo .= "tooltip='".$ayuda."' ";
        }
        
        if (!empty($clase))
        {
            $codigo .= "class='".$clase."' ";
        }
        
        $codigo .= "/>";
        
        return $codigo;
    }
    
    public function link($id, $texto = "", $link="", $ruta="", $clase = "")
    {
        $codigo = "<a ";
        
        if(!empty($id))
        {
            $codigo .= "id='".$id."'";
        }
        
        if (!empty($link))
        {
            $codigo .= "link='".$link."' ";
        }

        if (!empty($ruta))
        {
            $codigo .= "href='".$ruta."' ";
        }
        
        if (!empty($clase))
        {
            $codigo .= "class='".$clase."' ";
        }
        
        $codigo .= ">";
        
        if (!empty($texto))
        {
            $codigo .= $texto;
        }
        
        $codigo .= "</a>";
        
        return $codigo;
    }

    public function opciones($id, $texto = array(), $clase = "") 
    {
        $codigo = "<ul";

        if (!empty($id)) 
        {
            $codigo .= " id='".$id."'";
        }

        if (!empty($clase)) 
        {
            $codigo .= " class='".$clase."'";
        }

        $codigo .= ">";

        if (!empty($texto)) 
        {
            foreach ($texto as $texto => $link) {
                if (empty($link))
                {
                    $codigo .= "<li>".$texto."</li>";
                } 
                else
                {
                    $codigo .= "<li>".self::link("", $texto, "", $link)."</li>";
                }
                
                
            }
        }
        $codigo .= "</ul>";
        return $codigo;
    }

    public function ventanaDialogo() 
    {
        $codigo = "";


        return $codigo;
    }

    
    public function saltoLinea()
    {
        $codigo = "<br/>";
        return $codigo;
    }
    
    public function menuPrincipal($arreglo, $clase)
    {
        $codigo = "<ul class ='".$clase."'>";
        foreach ($arreglo as $clave => $valor) 
        {
            $codigo .= "<li ";
            $idMenu = $valor[0];
            
            $link = self::link($idMenu, $valor[1], $valor[2], "", $clase = "itemMenu");            

            $consulta = SQL::filasEnArreglo(SQL::seleccionar("mnsId, mnsDescripcion, mnsRuta","bif_menus", "mnsPadre = $idMenu"));

            if ($consulta) 
            {
                $clase = "class ='dropdown'>";
                $hijos = self::menuPrincipal($consulta, "dropdown-menu");
            }
            else
            {
                $clase=">";
                $hijos="";
            }

            $codigo .= $clase.$link.$hijos;
            $codigo .= "</li>";

        }
        $codigo .= "</ul>";

        return $codigo;
    }

    public function menuBotones()
    {
        $codigo = "<ul>
            <li id='menu_consultar'>Consultar</li>
            <li id='menu_editar'>Editar</li>
            <li id='menu_eliminar'>Eliminar</li>
            <li id='menu_agregar'>Nuevo</li>
            <li id='menu_favoritos'>otros</li>
        </ul>";

        $codigo = self::contenedor("menuBotones", $codigo);

        return $codigo;
    }

    public function contenedor($id, $contenido = "") 
    {
        $codigo = "<div id='".$id."'>";

        if (!empty($contenido))
        {
            $codigo .= $contenido;
        }

        $codigo .= "</div>";

        return $codigo;
    }

    public function tablaDinamica($campos="'mnsId', 'mnsPadre'", $tabla="bif_menus", $condicion="1=1")
    {
        $registros = SQL::filasEnArreglo(SQL::seleccionar("COLUMN_NAME, NUMERIC_PRECISION, CHARACTER_MAXIMUM_LENGTH", "INFORMATION_SCHEMA.COLUMNS", "COLUMN_NAME IN (".$campos.")"));

        $codigo = "
        <script>
        $(document).ready(function(){
            
            $('.flexme3').flexigrid({
                url : 'include/obtenerTabla.php',
                dataType : 'json',
                colModel : [ ";

                foreach ($registros as $clave => $valor) 
                {           
                    $cabecera = self::idiomaTexto($valor[0]);
                    $lenCabecera = strlen($cabecera);
                    
                    if(!empty($valor[1]))
                    {
                       $lenColumna = $valor[1];
                    }
                    else
                    {
                        $lenColumna = $valor[2];
                    }
                    
                    if($lenCabecera > $lenColumna)
                    {
                        $lenCampo = $lenCabecera*10;
                    }
                    else
                    {
                        $lenCampo = $lenColumna-100;
                    }
                    
                    $codigo .= "{ 
                                    display : '". $cabecera . "'
                                    , name : '". $valor[0] . "'
                                    , width : 200
                                    , sortable : true,
                                    align : 'center'
                                },";            
                }

                $codigo = substr($codigo, 0, strlen($codigo)-1);

                $codigo.= " ],
                    
                sortname : '".$registros[0][0]."',
                title : 'Menus',
                query : '".str_replace("'", "", $campos)."/".$tabla."/".$condicion."',            
                sortorder : 'asc',
                usepager : true,
                useRp : true,
                rp : 10,
                showTableToggleBtn : true,
                width : 'auto',
                height : 'auto',
                pagestat: '{from} de {to}, Total: {total} registros',
                pagetext: 'Pagina',
                outof: 'de',
                dblClickResize: true, 
                onDoubleClick: true,
                singleSelect : true
            });      
           
        });
        </script>

        <table class='flexme3' style='display: none'></table>
        ";

        return $codigo;
    }

	public function idiomaTexto($clave, $tipo=0)
    {
        $idioma = "ESP";        
        switch ($tipo) {
            case 0:
                $carpeta = "campos";
                break;
            
            default:
                $carpeta = "campos";
                break;
        }

        $ruta = "../idiomas/".$carpeta."/".$idioma.".php";
        include($ruta);

        if(!empty($textoIdioma[$clave]))
        {
            return $textoIdioma[$clave];
        }
        else
        {
            return $clave;
        }
    }

    public function FormularioDinamico($Camposfo ="",$Tabla ="",$condicion ="")
    {
      
      $registros = SQL:: filasEnArreglo(SQL::seleccionar("COLUMN_NAME, NUMERIC_PRECISION, CHARACTER_MAXIMUM_LENGTH,COLUMN_COMMENT", "INFORMATION_SCHEMA.COLUMNS", "COLUMN_NAME IN (".$Camposfo.")"));
         foreach($registros as $clave => $valor)
        { 
            $LabelNombre = self::idiomaTexto($valor[0]);
            if ($valor[3] == "texto")
            {
                $codigo.= self::texto($LabelNombre,$LabelNombre).":";
                $resultado = SQL::filasEnArreglo(SQL::seleccionar($valor[0],$Tabla,$condicion));
                
                   $codigo.= self::cajaTexto($valor[0],$resultado[0][0],$valor[2]); 
                 
            }
            
            if ($valor[3] == "Combo") 
            {
                $codigo.= self::texto($LabelNombre,$LabelNombre).":";
                $codigo.= self::lista($valor[0]);
            }
                           
        }
         
         return $codigo ;
     
    }
}
?>
