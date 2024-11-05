/**
 * Función que representa obtener un videojuego (ejemplo de implementación).
 */
export function obtenerVideojuego() {
    // Lógica para obtener el videojuego
    return "Videojuego obtenido";
  }
  
  /**
   * Permite que los eventos de HTML usen la función.
   * @param {function} functionInstance
   */
  export function exportaAHtml(functionInstance) {
    window[nombreDeFuncionParaHtml(functionInstance)] = functionInstance;
  }
  
  /**
   * Genera el nombre de la función para su uso en HTML.
   * @param {function} valor
   */
  export function nombreDeFuncionParaHtml(valor) {
    const names = valor.name.split(/\s+/g);
    return names[names.length - 1];
  }
  
  // Llamada para exportar `obtenerVideojuego` a HTML
  exportaAHtml(obtenerVideojuego);
  