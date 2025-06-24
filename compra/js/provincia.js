//declaro variable que tiene el elemneto con el id provincia
let inputprovincia = document.getElementById('provincia')

//cuando ocurra un cambio llama a la funcion
inputprovincia.addEventListener('change', ciudadcorres); 

function ciudadcorres() {
    //declaro variable que tiene la provincia que se seleccione //tiene el valor seleccionado

    let usuario_provincia = inputprovincia.value;
      if (usuario_provincia !== "") {
        document.getElementById('ciudad').disabled = false;
    } else {
        // Si no eligió país, deshabilitar todo
        document.getElementById('hotel').disabled = true;
        return;
    }
 
    //"¡Oye servidor! ¿Me puedes dar esta información?"
    fetch('../php/verificarciudad.php', {
        method: 'POST',
        body: JSON.stringify({ 'provincia': usuario_provincia })
    })
     .then(response => response.text())
   
    .then(data => {
       // Actualiza el contenido del elemento HTML con id igual a 'ptovincia' con el contenido de data
        document.getElementById('ciudad').innerHTML = data
    });
}


    