///declaro variable que tiene el elemneto con el id provincia
let inputciudad = document.getElementById('ciudad')

//cuando ocurra un cambio llama a la funcion
inputciudad.addEventListener('change', hotelcorres); 

function hotelcorres() {
    //declaro variable que tiene la provincia que se seleccione //tiene el valor seleccionado

    let usuario_ciudad = inputciudad.value;
    
 
    //"¡Oye servidor! ¿Me puedes dar esta información?"
    fetch('../php/verificarhotel.php', {
        method: 'POST',
        body: JSON.stringify({ 'ciudad': usuario_ciudad })
    })
     .then(response => response.text())
   
    .then(data => {
       // Actualiza el contenido del elemento HTML con id igual a 'ptovincia' con el contenido de data
        document.getElementById('hotel').innerHTML = data
    });
}

