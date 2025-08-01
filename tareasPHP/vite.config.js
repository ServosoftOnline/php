import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

export default defineConfig({
  base: './', // 👈 Esto es lo importante para rutas relativas
  plugins: [react()],
  define: {
    'process.env': process.env
  }
})
