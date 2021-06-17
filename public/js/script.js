   
$(function(){

const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('unidadAcademica').addEventListener('change',(e)=>{
        fetch('carreras',{
            method : 'GET',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json();
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            alert(data);
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].carrera+'</option>';
            }
            document.getElementById("carrera").innerHTML = opciones;
        }).catch(error =>console.error(error));
    });

});
