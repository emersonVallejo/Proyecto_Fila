$(document).ready(function (){
   
    $('a').click(function(e)
    {
        var link = $(this).attr('link');
        if(link)
        {
            $('[data-toggle="collapse"]').click();
            $("article").load("include/incluir.php?"+$.param(
                {ruta: link}
            ));
        }
    });
});

