$(function(){
    // const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    $.get('/api/unidadAcademica',function (data){ // Al iniciar, cargo el primer combo con las Unidadades academicas
      console.log(data);
      html=$('#unidadAcademica');
      html.empty();
      html.append(`<option value='0' selected>Seleccione Unidad Academica</option>`);
      for(let valor of data)
      {
        html.append(`
          <option value='${valor.id_unidad_academica}'>${valor.unidad_academica}</option>
        `);
      }
    })

    $('#unidadAcademica').on('change',function (){

      idUnidadAcademica=$('#unidadAcademica').val();
      $.get('/api/unidadAcademica/'+idUnidadAcademica+'/carreras',function (data){
        html=$('#carrera');
        html.empty();
        for (let valor of data){
          html.append(`
            <option value='${valor.id_carrera}'>${valor.carrera}</option>
          `);
        }
      });
    });
});
