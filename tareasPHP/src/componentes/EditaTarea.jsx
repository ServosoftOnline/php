/*
  FORMULARIO QUE PERMITE EDITAR LAS TAREAS

*/

// React
import { useState } from "react";

// Componente
const EditaTarea = ({tarea}) => {
  
  // Estado que contendŕa la tarea que deseo modificar. Por defecto tendrá el texto que traia por defecto en tarea.descripcion
  const [tareaAModificar, cambiarTareaAModificar] = useState(tarea.descripcion);

  // Renderizo el formulario
  return (

    <form action= {`${import.meta.env.VITE_API_URL}/editarTarea.php`} className="formulario-editar-tarea" method="POST">

      {/* Input oculto donde envio el id de la tarea */}
      <input
        type="hidden"
        name="tarea_id"
        value={tarea.id}
      />

      {/* Input con la tarea modificada */}
      <input
        type ="text"
        name ="nuevoTexto"
        className="formulario-editar-tarea__input"
        value={tareaAModificar}
        onChange={(e)=>{cambiarTareaAModificar(e.target.value)}}
      />

      {/* Boton     */}
      <button
        type ="submit"
        name = "editar_tarea"
        className="formulario-editar-tarea__btn"
      >
        Actualizar
      </button>
      
    </form>
  );
}
 
export default EditaTarea;