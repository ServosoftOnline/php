/*
  FORMULARIO PARA CONFIRMAR LA ELIMINACION DE UNA TAREA
*/

// Componente
const EliminaTarea = ({tarea}) => {

  // Renderizo el formulario
  return (

    <form action={`${import.meta.env.VITE_API_URL}/eliminarTarea.php`} className="formulario-editar-tarea" method="POST">

      {/* Input oculto donde envio el id de la tarea */}
      <input
        type="hidden"
        name="tarea_id"
        value={tarea.id}
      />

      {/* Input de lectura con la tarea a eliminar */}
      <input
        readOnly
        type ="text"
        name ="tareaAEliminar"
        className="formulario-editar-tarea__input"
        value={tarea.descripcion}        
      />

      {/* Boton     */}
      <button
        type ="submit"
        name = "eliminar_tarea"
        className="formulario-eliminar-tarea__btn"
      >
        Confirmar eliminacion
      </button>
      
    </form>

  );
}
 
export default EliminaTarea;