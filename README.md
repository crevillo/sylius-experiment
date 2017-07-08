# Sylius Experiment

Aunque Sylius puede ser usado como un punto de partida para aplicación ecommerce, entendiendo esto
como una solución que permite realizar compras, gestionar catálogo, controlar usuarios, etc, 
una de las características que más me gustan sobre este proyecto es que está construido en base a componentes
desacoplados entre sí los cuales pueden ser reutilizados en cualquier aplicación PHP sin necesidad
de depender de ningún framework, ORM, o incluso servidor de base de datos a usar. 

En este repositorio se trata de demostrar como se puede construir un e-commerce desde 0. No sé usa ningún framework
tal como Symfony, Laravel o CodeIgniter. Simplemente añadimos una serie de archivos php y una 
serie de clases que nos servirán para ir montando esta tienda. 

Sí hemos añadido "Twig" como dependencia con el fin de hacer más legibles los archivos php, tratando
de que estos no contengan ningún html que pueda hacer más deficil su lectura. 
También, con el fin de que el resultado sea más agradable a la vista, estamos usando una plantilla de Boostrap. 

## Instalación. 
Si tienes curiosidad puedes instalarte esta dummy-aplicación en tu equipo, para ello 
puedes clonar este repositorio. 

Después, usa composer para instalar las dependencias. Yo tengo composer instalado de forma global y por eso hago

```
composer install
```

Una vez se haya descargado, puedes ver el resultado levantando el servidor de PHP. Personalmente, suelo
hacerlo en el puerto 8000
```
cd web
php -S localhost:8000
```
Abre tu navegador, vete a http://localhost:8000 y listo.

Comenzamos...

### Versión 0.1.0
* Añadimos Twig como dependencia.
* Añadimos el componente Product
* Ficha de producto. 

### Versión 0.1.0
* Añadimos el componente order
* permitir añadir a cesta desde ficha de producto
* Preparamos página de carrito con posibilidad de modificar cantidades y borrar items
