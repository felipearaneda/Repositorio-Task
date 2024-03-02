Tecnologías usadas para el proyecto:

Xampp con una base de datos llamada "bd_generica", a partir de ahí lo demás es modificable en el modelo para que la información de la base de datos y la app sean concordantes.
Al realizar los cambios anteriores, se recomienda ver los archivos dentro de la carpeta "api", "views" y dentro de "assets" en la carpeta "js" en todos los archivos que comiencen con "ajax", esto ya que al tener una base de datos personalizada las peticiones de AJAX y por API tienen que comunicarse con las tablas y la información de la base datos.

En caso de haber errores del tipo "datatables" o "bootstrap" lo más probable es que el proyecto esté desactualizado. Dame tiempo, lo actualizo seguido!

Recordar que primero se modifica/corrige el "indicadores_model" ya que tendrás una base de datos personalizada y este archivo será el punto de entrada para todo lo demás. Luego tienes que modificar los controladores, o sea "api1.php" e "Indicadores.php", estos contendrán la lógica de programación y serán el siguiente recorrido de los datos. Por último tienes que revisar los AJAX (revisar párrafo de la línea 3) y revisar que los datos de tu base de datos y tu app sean iguales! este paso ya será lo último a modificar para que la app funcione correctamente.

Recuerda además de revisar las rutas en el archivo "routes.php".

En caso de que tengas un archivo JSON con muchísimos datos y quieras importarla para tener una base de datos grande y así poder probar la app de mejor manera, te recomiendo utilizar el archivo JSONparse.php y colocar tus datos JSON en el archivo "bd-generica.json". Luego tienes que modificar los datos dentro del archivo php según la base de datos que tú hayas creado y listo! Ahora sólo tienes que "ejecutar" el archivo JSONparse.php y te insertará todos los datos automáticamente en tu base de datos personal.

En caso que se me olvide algo y no sepas cómo solucionarlo, puedes comunicarte conmigo, ya sea por github o mediante mi correo dev-felipe@proton.me :D
