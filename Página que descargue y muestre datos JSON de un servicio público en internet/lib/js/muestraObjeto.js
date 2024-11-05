export function muestraObjeto(datos, elemento) {
    elemento.innerHTML = ""; // Limpiar contenido
    datos.ciudades.forEach(ciudad => {
        const div = document.createElement("div");
        div.textContent = `${ciudad.nombre} - Población: ${ciudad.poblacion}`;
        elemento.appendChild(div);
    });
}
