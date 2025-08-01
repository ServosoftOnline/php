/*
  COMPONENTE PRINCIPAL: APP.JS:

    - Contiene el estado mostrarCompletadas que almacena el deseo del usuario de mostrar u ocultar las tareas.
      - Lo declaro aquí porque lo paso como propiedades a los componentes Header y ListaTareas

    - Renderizo cada uno de los componentes que componen la aplicacion:

      - Header contiene el titulo de la aplicación y un boton que permite mostrar u ocultar las tareas
        - Tendrá el control sobre el estado mostrarCompletadas y la capacidad de cambiar la decisión del usuario

      - FormularioTareas permite añadir tareas.        
        - Es un componente independiente que no precisa de ninguna propiedad que le pase desde aquí

      - ListaTareas muestra las tareas que existen actualemente en la base de datos mysql
        - Le paso el estado mostrarTodas para que las muestre u oculte
*/

// React
import { useState, useEffect } from 'react';

// Css
import './App.css';

// Componentes importados
import Header from './Header';
import AnadirTarea from './AnadirTarea';
import ListaTareas from './ListaTareas';

// Componente ppal
const App = () => {

  /*
  // Muestro en consola todas las variables de entorno  
  console.log(`VITE_API_URL: ${import.meta.env.VITE_API_URL}`);
  console.log(`VITE_REDIRECT_URL: ${import.meta.env.VITE_REDIRECT_URL}`);    
  console.log(`VITE_DB_HOST: ${import.meta.env.VITE_DB_HOST}`);    
  console.log(`VITE_DB_USER: ${import.meta.env.VITE_DB_USER}`);  
  console.log(`VITE_DB_PASSWORD: ${import.meta.env.VITE_DB_PASSWORD}`);      
  console.log(`VITE_DB_NAME: ${import.meta.env.VITE_DB_NAME}`);    
  */

  // Estado que contiene el deseo de mostrar u ocultar las tareas completadas
  const [mostrarTodas, setMostrarTodas]= useState(true);
  
  // Renderizo los tres componentes de la aplicación almacenadas en el contenedor ppal de la aplicación
  return (

    <div className="contenedor">
      
      <Header
        mostrarTodas={mostrarTodas}
        setMostrarTodas={setMostrarTodas}
      />

      <AnadirTarea/>

      {/* <ListaTareas
        mostrarTodas = {mostrarTodas}        
      /> */}

    </div>
  );

}

export default App;