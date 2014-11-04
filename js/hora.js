function valida_horas(edit, ev)


{


    li = new Array(':');


    liE = new Array(58);


    


    somenteNumero(edit,ev,li,liE);


    


    if(edit.value.length == 2 || edit.value.length == 5)


    edit.value += ":";


}

function verifica_horas(obj)


{


    if(obj.value.length < 8)


        obj.value = '';


    else


    {


        hr = parseInt(obj.value.substring(0,2));


        mi = parseInt(obj.value.substring(3,5));


        se = parseInt(obj.value.substring(6,8));


        if((hr < 0 || hr > 23) || (mi < 0 || mi > 60) || (se < 0 || se > 60 ))


        {


            obj.value = '';


            alert('Hora inválida');


        }


    }


}