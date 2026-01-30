# 🧩 PHP CRUD – Gestión de Productos

Aplicación **CRUD (Create, Read, Update, Delete)** desarrollada en **PHP puro** con **MySQL**, enfocada en la gestión de productos.  
El proyecto aplica separación de responsabilidades entre **lógica de datos** y **vistas**, simulando una estructura organizada para proyectos backend.

Este repositorio fue creado como **prueba técnica / práctica**, reforzando el manejo de formularios, métodos HTTP y conexión a base de datos.

---

## 🚀 Funcionalidades

- 📋 Listado de productos
- ➕ Creación de productos (INSERT)
- ✏️ Edición de productos (UPDATE)
- ❌ Eliminación de productos (DELETE)
- 🔁 Uso de métodos **GET** y **POST**
- 🔗 Conexión centralizada a base de datos
- 📄 Vistas separadas para cada acción

---

## 🛠️ Tecnologías utilizadas

- **PHP**
- **MySQL**
- **HTML5**
- **CSS**
- **Apache**

---

## 📂 Estructura del proyecto

```text
/
├── PruebaTec/
│   ├── Data/
│   │   ├── Conecction.php          # Conexión a la base de datos
│   │   ├── DataBaseFunctions.php   # Funciones CRUD
│   │   ├── InsertProduct.php       # Inserción de productos
│   │   ├── EditProduct.php         # Edición de productos
│   │   └── DeleteProduct.php       # Eliminación de productos
│   │
│   ├── Views/
│   │   ├── index.php               # Listado principal
│   │   ├── FormCreate.php          # Formulario de creación
│   │   ├── Edit.php                # Formulario de edición
│   │   └── Delete.php              # Confirmación de eliminación
│
├── Productos.sql                   # Script SQL para pruebas
└── README.md
