<?php
class CSS
{
    public function estiloHTML($altoHeader = 160, $altoFigure = 68, $altoNav = 32, $anchoBotonMenu = 120)
    {       
        $codigo ="
        <style>
        body
        {
            ".self::colorFondo("fondoPagina")."
        }
        
            header
            {
                ".self::ancho(100, "%")."
                ".self::alto($altoHeader)."         
            }

                figure
                {
                    ".self::ancho(250)."
                    ".self::alto($altoFigure, "%")."
                }                
                                  
            section 
            {
                ".self::ancho(98, "%")."
                ".self::alto(100, "%")." 
                ".self::centrar(1)."
            }
                article {
                    ".self::ancho(100, "%")."
                    ".self::alto(-1,"", "100%")."
                    ".self::sombra()."
                    ".self::borde()."
                }
        </style>
        ";

        return $codigo;
    }
    
    static function centrar($centrar)
    {
        if($centrar == 1)
        {
            $codigo = "margin: auto;
                       word-break: break-all;
                       word-wrap: break-word;
                      ";
        }        
        return $codigo;
    }
    
    static function borde($borde=4)
    {
        $codigo = "
            -webkit-border-radius: ".$borde."px;
            -moz-border-radius: ".$borde."px;
            border-radius: ".$borde."px;
            border-color: #357ebd;
        ";
        return $codigo;
    }
    
    static function sombra($sombra="30px")
    {
        $codigo = "
            -webkit-box-shadow: 0px 1px ".$sombra." 0px rgba(50, 50, 50, 0.75);
            -moz-box-shadow: 0px 1px ".$sombra." 0px rgba(50, 50, 50, 0.75);
            box-shadow: 0px 1px ".$sombra." 0px rgba(50, 50, 50, 0.75);
        ";
        return $codigo;
    }
    
    static function ancho($ancho, $medida="px")
    {
        $codigo = "
            max-width:".$ancho.$medida.";
            width:100%;
        ";
        return $codigo;
    }
    
    static function alto($alto, $medida="px", $minimoAlto="auto")
    {
        if($alto == -1)
        {
            $codigo = "
                height:auto;
                min-height:".$minimoAlto.";
            ";
        }
        else
        {
            $codigo = "
                height:".$alto.$medida.";
                min-height:".$minimoAlto.";
            "; 
        }
        
        return $codigo;
    }
    
    static function colorFondo($tipo)
    {
        $codigo = "";
        switch ($tipo)
        {
            case "botonMenu":
                $codigo = "background:#428bca;";
                break;
            case "fondoPagina":
                $codigo = "background:#EFEFEF;";
                break;
        }
        return $codigo;
    }
}
?>