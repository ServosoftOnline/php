/*
  APP: LISTA DE TAREAS

    - Usaré local storage para almacenar las tareas
    - El archivo App.css contendrá los estilos
    - Usaré la metodologia BEM para nombrar las clases
    - El componente App contiene la aplicacion
    

*/

// React
import React from 'react';
import ReactDOM from 'react-dom/client';

// Estilos
import './index.css';

// Importar componente ppal de la aplicación
import App from './componentes/App';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
