/*
    COMPONENTE QUE MOSTRARÁ UNA TAREA:

        - Mostrará un icono de check para que el usuario marque si la tiene finalizada 
        - La descripcion de la tarea
        - Cuando coloque el ratón sobre ella mostrará lo iconos de editar y eliminar
            - Cuando haga click sobre editar le indicaré que ya no quiere eliminar
                - Si quiere editar muestro el componente EditarTarea y el botón actualizar que confirma la operación
            - Cuando haga click en eliminar le indicaré que ya no quiere editar
                - Si quiere borrar la tarea muestro el componente con el boton eliminar que confirma la operación

*/

// React
import {useState}  from "react";

// Componentes importados
import EditaTarea from "./EditaTarea";
import EliminaTarea from "./EliminaTarea";

// Componente ppal
const Tarea = ({tarea}) => {
    
    // Estados que contendrán el deseo del usuario por editar o cambiar una tarea
    const [quiereEditarTarea, cambiarQuiereEditarTarea] = useState(false);
    const [quiereEliminarTarea, cambiarQuiereEliminarTarea] = useState(false);

    // Funcion que hará la peticion al backend para haga un toogle para alternar el estado de completada
    const toogleCompletada = async (id) => {

        try {
            
            const response = await fetch(`${import.meta.env.VITE_API_URL}/toogleTarea.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded', // Formato para datos enviados por POST
                },
                body: new URLSearchParams({ id }), // Enviar el id en el cuerpo de la solicitud
            });
    
            // Manejo de la respuesta. Si se actualiza de forma correcta recargo la pagina para actualizar el check
            const data = await response.json();
            if (response.ok) {
                console.log('Tarea actualizada:', data);
                window.location.reload();

            } else {
                console.error('Error al actualizar la tarea:', data);
            }

        } catch (error) {
            console.error('Error en la solicitud:', error);
        }
    };
    

    // vble que contendrá -check o un espacio en blanco dependiendo si la tarea se encuentra o no completada
    let tareaRealizada = '';
    tarea.finalizada == 1 ? tareaRealizada = "-check" : "";

    // Renderizo. Muestro el icono check, muestro los componentes EditarTarea o EliminarTarea y los iconos de editar o eliminar    
    return (
        
        <li className="lista-tareas__tarea">

            <i 
                className={`
                    fa-regular fa-square${tareaRealizada} fa-lg
                    lista-tareas__icono
                    lista-tareas__icono-check
                `}
                onClick={() => {toogleCompletada(tarea.id)}}
            >                
            </i>

            <div className="lista-tareas__texto">
                {quiereEditarTarea ? <EditaTarea tarea={tarea}/> : quiereEliminarTarea ? <EliminaTarea tarea={tarea}/> : tarea.descripcion}
                
            </div>

            <div className="lista-tareas__contenedor-botones">
                <i 
                    className="
                        fa-regular fa-pen-to-square fa-lg
                        lista-tareas__icono
                        lista-tareas__icono-accion
                    "
                    onClick = {()=>{
                        cambiarQuiereEditarTarea(!quiereEditarTarea);
                        quiereEliminarTarea && cambiarQuiereEliminarTarea(false);
                    }}>
                </i>

                <i 
                    className="
                        fa-solid fa-trash fa-lg
                        lista-tareas__icono
                        lista-tareas__icono-accion
                    "
                    onClick = {()=>{
                        cambiarQuiereEliminarTarea(!quiereEliminarTarea);
                        quiereEditarTarea && cambiarQuiereEditarTarea(false);
                    }}>

                </i>
            </div>
        </li>
      );
}
 
export default Tarea;