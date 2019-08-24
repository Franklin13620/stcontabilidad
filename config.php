<?php

define('FS_DB_TYPE', 'MYSQL'); /// MYSQL o POSTGRESQL
define('FS_DB_HOST', 'ec2-174-129-242-183.compute-1.amazonaws.com');
define('FS_DB_PORT', '5432'); /// MYSQL -> 3306, POSTGRESQL -> 5432
define('FS_DB_NAME', 'd161psmgiu7jqm');
define('FS_DB_USER', '
membtwcvbqndvx'); /// MYSQL -> root, POSTGRESQL -> postgres
define('FS_DB_PASS', '89e32f5b5d490423efb234e59f460cb096ec0f16f6d168a791c15b38edbaa0a1');

/*
 * Un directorio de nombre aleatorio para mejorar la seguridad del directorio temporal.
 */
define('FS_TMP_NAME', 'wK4Jh9SR56DQ7yfcqpbv/');

/*
 * En cada ejecución muestra todas las sentencias SQL utilizadas.
 */
define('FS_DB_HISTORY', FALSE);

/*
 * Habilita el modo demo, para pruebas.
 * Este modo permite hacer login con cualquier usuario y la contraseña demo,
 * además deshabilita el límite de una conexión por usuario.
 */
define('FS_DEMO', FALSE);

/*
 * Configuración de memcache.
 * Host: la ip del servidor donde está memcached.
 * port: el puerto en el que se ejecuta memcached.
 * prefix: prefijo para las claves, por si tienes varias instancias de
 * Sistema Ontable conectadas al mismo servidor memcache.
 */

define('FS_CACHE_HOST', '');
define('FS_CACHE_PORT', '');
define('FS_CACHE_PREFIX', '');

/// caducidad (en segundos) de todas las cookies
define('FS_COOKIES_EXPIRE', 604800);

/// el número de elementos a mostrar en pantalla
define('FS_ITEM_LIMIT', 50);

/// desactiva el poder modificar plugins (añadir, descargar y eliminar)
define('FS_DISABLE_MOD_PLUGINS', FALSE);

/// desactiva el poder añadir plugins manualmente
define('FS_DISABLE_ADD_PLUGINS', FALSE);

/// desactiva el poder eliminar plugins manualmente
define('FS_DISABLE_RM_PLUGINS', FALSE);
