/***************************/  
//@Author: Adrian "yEnS" Mato Gondelle
//@website: http://yensdesign.com
//@email: yensamg@gmail.com  
//@license: Feel free to use it, but keep this credits please!  
/***************************/  


//Cuando el documento esté listo...
$(document).ready(function(){
 

//variables de control
var menuId = "menuBotones";
var menu = $("#"+menuId);

//EVITAMOS que se muestre el MENU CONTEXTUAL del sistema operativo al hacer CLICK con el BOTON DERECHO del RATON
/*$(".wrapper").bind("contextmenu", function(e){
    menu.css({'display':'block', 'left':e.pageX, 'top':e.pageY});
    return false;
});*/
    
    //controlamos ocultado de menu cuando esta activo
    //click boton principal raton
    $(document).click(function(e){
        if(e.button == 0 && e.target.parentNode.parentNode.id != menuId){
            menu.css("display", "none");
        }
    });
    //pulsacion tecla escape
    $(document).keydown(function(e){
        if(e.keyCode == 27){
            menu.css("display", "none");
        }
    });

    function realizaProceso(valorCaja1, valorCaja2){
        var parametros = {

                "variable" : valorCaja1,

                "valorCaja2" : valorCaja2

        };


        $.ajax({

                data:  parametros,

                url:   'include/obtenerPopUp.php',

                type:  'get',

                 beforeSend: function () {

                },
                success:  function (response) {

                        $("#popUp").html(response);


                }


        });

}

    
    //Control sobre las opciones del menu contextual
    menu.click(function(e){
        //si la opcion esta desactivado, no pasa nada
        if(e.target.className == "disabled"){
            return false;
        }
        //si esta activada, gestionamos cada una y sus acciones
        else{

            switch(e.target.id){
                case "menu_consultar":
                        realizaProceso(1, 0);
                        $( "#popUp" ).attr("display", "block");
                        $( "#popUp" ).dialog({
                            title: "Dialog Title",
                            closeOnEscape:true,
                            resizable: false,
                            show: {effect: "fade"},
                            hide: {effect: "fade"},
                            buttons: {
                                "Aceptar": function() {
                                  $( "#popUp" ).dialog( "close" );
                                }
                              },
                            modal: true,
                            height: 500,
                            width: 600
                        });
                        $( "#tabs" ).tabs();
                    break;
                case "menu_editar":
                    alert("editar");
                    break;
                case "menu_eliminar":
                    alert("eliminar");
                    break;
                case "menu_agregar":
                    alert("agregar");
            }
            menu.css("display", "none");
        }
    });

});