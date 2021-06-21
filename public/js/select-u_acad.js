const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_unidadAcademica').addEventListener('change',(e)=>{
        fetch('carreras',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Elegir</option>";
            for (let i in data.lista) {
               opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].carrera+'</option>';
            }
            document.getElementById("_carrera").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })