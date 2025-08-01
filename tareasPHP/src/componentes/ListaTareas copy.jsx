/*
    MUESTRA LAS TAREAS ALMACENADAS EN EL ESTADO TAREAS

      - Contiene un efecto que obtendrá las tareas almacenadas en la base de datos y las almacenará en el estado tareas.

*/

// React
import React from "react";
import { useState, useEffect } from 'react';

// Componente importado
import Tarea from "./Tarea";

// Componente ppal
const ListaTareas = ({mostrarTodas}) => {

    // Estado que almacenará las tareas de la base de datos
    const [tareas, setTareas] = useState([]);

    // Efecto que obtiene las tareas desde el backend y las almaceno en el estado tareas
    useEffect(() => {    
        // fetch('http://localhost/tareasPHP/backend/obtenerTareas.php')
        fetch('http://localhost/tareasPHP/backend/obtenerTareas.php')
        .then((response) => response.json())
        .then((data) => setTareas(data))
        .catch((error) => console.error('Error al obtener tareas:', error));
    }, []);
    
    // Renderizo el componente ppal
    return (

        <ul className="lista-tareas">
            {   
                tareas.length > 0
                ?
                    tareas.map((tarea)=>{
                        
                        if(mostrarTodas) {
                            return <Tarea
                                key = {tarea.id}
                                tarea = {tarea}
                            />

                        // Si la tarea no está completada la devolvemos
                        } else {

                            if(tarea.finalizada == 0) {
                                return <Tarea
                                    key = {tarea.id}
                                    tarea = {tarea}                    
                                />
                            } else {

                                // Si ya está completada no la devolvemos
                                return false;                  

                            }

                        } 
                
                    })
                :
                    <div className="lista-tareas__mensaje ">~ No hay tareas agregadas ~</div>                   
            }
        </ul>
    );
}
 
export default ListaTareas;