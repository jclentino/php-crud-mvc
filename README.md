# Php y MySQL (MVC) 

Este repositorio contiene una aplicación web escrita con php utilizando una arquitectura Modelo-Vista-Controlador (MVC), utiliza contenedores Docker (php-Apache y MySQL) para todo lo relacionado con el entorno. La aplicación es un crud de 2 entidades que se encuentran con una relacion de uno a muchos entre si, mediante una interfaz podemos realizar todas estas operaciones.

## Requisitos

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Configuración

1. Clona este repositorio:

    ```bash
    git clone https://github.com/jclentino/php-crud-mvc.git
    cd nombre-proyecto
    ```

2. Crea una carpeta db_data en la raiz del proyecto y ubicado en la raiz, construye las imagenes 

    ```
    docker-compose build
    ```

3. Inicia los contenedores con Docker Compose:

    ```
    docker-compose up -d
    ```
4. Ingresa a el contendor de mysql 
    
    ```
    docker exec -it mydb mysql -u jc -p
    clave: toor 
    ```

5. Usa la base de datos 

    ```
    USE app; 
    ```

6. Crea las tablas 
   
    ```
    CREATE TABLE Usuarios (
        cedula INT PRIMARY KEY,
        clave VARCHAR(255) NOT NULL,
        nombre VARCHAR(255) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL
    );

    CREATE TABLE Docentes (
        id INT PRIMARY KEY AUTO_INCREMENT,
        usuario_id INT,
        nombre VARCHAR(255) NOT NULL,
        apellidos VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        telefono VARCHAR(20) NOT NULL,
        blog VARCHAR(255),
        profesional BOOLEAN,
        escalaron BOOLEAN,
        idioma VARCHAR(50),
        añosExperiencia INT,
        areaTrabajo VARCHAR(255),
        FOREIGN KEY (usuario_id) REFERENCES Usuarios(cedula)
    ); 
    ```

7. Inserta registros de prueba 

    ```
    INSERT INTO Usuarios (cedula, clave, nombre, telefono, email)
    VALUES (1, 'juan1', 'Juan', '305', 'j@gmail.com');

    INSERT INTO Docentes (usuario_id, nombre, apellidos, email, telefono, blog, profesional, escalaron, idioma, añosExperiencia, areaTrabajo)
    VALUES (1, 'Jhon', 'Arrieta Arrieta', 'jhon@gmail.com', '456', 'jhonarrietablog.com', 1, 1, 'Español', 10, 'Software');
    ```

8. Sal de contenedor de mysql 

    ```
    exit;     
    ```

## Estructura del Proyecto

- **`/controladores`**: controladores de las entidades 
- **`./modelos`**: modelos de las entidades 
- **`./vistas/docente`**: Todas las vistas de la entidad de docentes 
- **`./vistas/usuario`**: Todas las vistas de la entidad de usuarios 
- **`./css`**: Estilos.
- **`./imagenes`**: Imagenes.
- **`./js`**: Scripts.
- **`./conexion.php`**: Conexion a la base de datos.
- **`./docker-compose.yml`**: Composicion de los contenedores 
- **`./Dockerfile`**: Archivo para crear el contexto de la imagen php-apache.
- **`./index.php`**: Index principal donde arranca la aplicacion.


## Uso

La aplicación estará disponible en http://localhost:80 después de ejecutar los contenedores.

## Detener y Limpiar

Detén los contenedores cuando hayas terminado:
    
    ```
    docker-compose down
    ```

