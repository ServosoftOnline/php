/*
    FORMULARIO PARA AÑADIR TAREAS:
*/

// React
import {useState} from 'react';

// Componente ppal
const FormularioTareas = () => {

    // Estado que almacena el contenido del único input
    const [inputTarea, cambiarInputTarea] = useState('');

    // Función que obtiene el input y valida que se adjunten tareas vacias
    const handleInput = (e) => {
        
        const value = e.target.value;
        // Verificar si el valor es una cadena completamente vacía al eliminar espacios externos
        if (value.trim() !== '') {
            cambiarInputTarea(value); // Conservar los espacios internos
        } else {
            cambiarInputTarea(''); // Evitar que se asignen valores vacíos
        }
    };
    
    // Renderizo el componente ppal y envio al backend el contenido del input
    return ( 
        
        // Uso variables de entorno para almacenar parciamente la ruta de donde envio los datos del formulario
        <form action={`${import.meta.env.VITE_API_URL}/almacenarTarea.php`} className="formulario-tareas" method="POST">
            <input 
                type ="text" 
                name="descripcion"
                className="formulario-tareas__input"
                placeholder="Añada una tarea"
                value={inputTarea}
                onChange={(e)=> handleInput(e)}
            />
            <button 
                type = "submit"
                name="guardar_tarea"
                className="formulario-tareas__btn"
            >
                {/* Boton de fontawesome. Plan de Javascript gratuito. El de react me dio problemas al instalarlo */}
                <i className="fa-regular fa-square-plus fa-xl formulario-tareas__icono-btn"/>
            </button>
            
        </form>        
     );
}
 
export default FormularioTareas;