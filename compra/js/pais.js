


let inputpais = document.getElementById('pais')
inputpais.addEventListener('change', paiscorres); 
function paiscorres() {
    let usuario_pais = inputpais.value;



     if (usuario_pais !== "") {
        document.getElementById('provincia').disabled = false;
    } else {
        // Si no eligió país, deshabilitar todo
        document.getElementById('provincia').disabled = true;
        document.getElementById('ciudad').disabled = true;
        document.getElementById('hotel').disabled = true;
        return;
    }
 
    fetch('../php/verificarpais.php', {
        method: 'POST',
        body: JSON.stringify({ 'pais': usuario_pais })
    })
     .then(response => response.text())
   
    .then(data => {
       // Actualiza el contenido del elemento HTML con id igual a 'mensaje' con el contenido de data, que probablemente sea un mensaje de respuesta del servidor (por ejemplo, "Usuario disponible" o "Usuario ya registrado")
        document.getElementById('provincia').innerHTML = data
    });
}


    