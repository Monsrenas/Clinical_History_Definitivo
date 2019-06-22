@include('history.PATIENTDATA')
          
    <script>
 
        /**
         * Función que solo permite la entrada de numeros, un signo negativo y
         * un punto para separar los decimales
         */
        function soloNumeros(e)

        {
            // capturamos la tecla pulsada

            var teclaPulsada=window.event ? window.event.keyCode:e.which;
            // capturamos el contenido del input
            var valor=document.getElementById("inputNumero").value;
     
            if(valor.length<20)
            {
                // 13 = tecla enter
                // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
                // punto
                if(teclaPulsada==13)
                {
                    return false;
                }
     
                // devolvemos true o false dependiendo de si es numerico o no
                return /\d/.test(String.fromCharCode(teclaPulsada));
            }else{
                return false;
            }
        }



        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}

        iniSelect("nation",nation);
        iniSelect("myrelation",srelation);
        iniSelect("marital",marital);


        if(document.forms[1].length > 0) {
                                        
                                        if(document.forms[0].elements.length > 0) {
                                                                                    document.forms[0].elements[1].focus();
                                                                                  }
                                        for (i = 3; i < document.forms[1].elements.length; i++) {
                                                                               
                                                                            /*document.forms[1].elements[i].disabled =true;*/ 
                                                                           
                                                                         };
                                       }

</script>
@endsection