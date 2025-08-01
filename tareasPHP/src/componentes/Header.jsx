/*
    CABECERA DE LA APP
        - Contiene la cabecera de color azul
            - A la izda el titulo Lista de tareas

            - A la derecha un boton que cambiará dependiendo del estado de mostrarCompletadas
                - Si es true mostrará el texto Ocultar completadas y un icono de un ojo cerrado
                - Si es false mostrará el texto Mostrarlas todas y un icono de un ojo abierto
            
            - Cuando haga click sobre el botón se ejecuta la funcion que cambia su estado al contrario
        
        - 

*/

import React from "react";

const Header = ({ mostrarTodas, setMostrarTodas }) => {
  
  return (
    <header className="header">
      <h1 className="header__titulo">Lista de tareas</h1>

      {mostrarTodas ?
        <button className="header__boton" onClick={() => setMostrarTodas(!mostrarTodas)} >
            Ocultar completadas
            <i className="
                fa-regular fa-eye-slash
                header__icono-boton">
            </i>
        </button>
      :
        <button className="header__boton" onClick={() => setMostrarTodas(!mostrarTodas)} >
            Mostrarlas todas
            <i className="
                fa-regular fa-eye
                header__icono-boton">
            </i>
        </button>
      }

    </header>
  );
};

export default Header;
