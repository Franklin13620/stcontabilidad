<?php

if (!defined('FS_TMP_NAME')) {
    define('FS_TMP_NAME', '');
}

if (!defined('FS_PATH')) {
    define('FS_PATH', '');
}

if (!defined('FS_MYDOCS')) {
    define('FS_MYDOCS', '');
}

if (FS_TMP_NAME != '' && ! file_exists('tmp/' . FS_TMP_NAME)) {
    if (!file_exists('tmp') && mkdir('tmp')) {
        file_put_contents('tmp/index.php', "<?php\necho 'ACCESO DENEGADO';");
    }

    mkdir('tmp/' . FS_TMP_NAME);
}

if (!defined('FS_COMMUNITY_URL')) {
    define('FS_COMMUNITY_URL', 'https://www.FacturaScripts.com/comm3');
}

$GLOBALS['config2'] = array(
    'zona_horaria' => 'America/El_Salvador',
    'nf0' => 2,
    'nf0_art' => 2,
    'nf1' => ',',
    'nf2' => ' ',
    'pos_divisa' => 'right',
    'factura' => 'factura',
    'facturas' => 'facturas',
    'factura_simplificada' => 'factura simplificada',
    'factura_rectificativa' => 'factura rectificativa',
    'albaran' => 'albarán',
    'albaranes' => 'albaranes',
    'pedido' => 'pedido',
    'pedidos' => 'pedidos',
    'presupuesto' => 'presupuesto',
    'presupuestos' => 'presupuestos',
    'provincia' => 'provincia',
    'apartado' => 'apartado',
    'cifnif' => 'CIF/NIF',
    'iva' => 'IVA',
    'irpf' => 'IRPF',
    'numero2' => 'número 2',
    'serie' => 'serie',
    'series' => 'series',
    'cost_is_average' => 1,
    'precio_compra' => 'coste',
    'homepage' => 'admin_home',
    'check_db_types' => 0,
    'stock_negativo' => 1,
    'ventas_sin_stock' => 1,
    'ip_whitelist' => '*',
    'libros_contables' => 1,
    'foreign_keys' => 1,
    'new_codigo' => 'new',
    'db_integer' => 'INTEGER'
);

if (file_exists('tmp/' . FS_TMP_NAME . 'config2.ini')) {
    $ini_data = parse_ini_file('tmp/' . FS_TMP_NAME . 'config2.ini');
    foreach ($ini_data as $i => $value) {
        $GLOBALS['config2'][$i] = $value;
    }
}

foreach ($GLOBALS['config2'] as $i => $value) {
    if ($i == 'zona_horaria') {
        date_default_timezone_set($value);
    } else {
        define('FS_' . strtoupper($i), $value);
    }
}

if (!file_exists('plugins')) {
    mkdir('plugins');
    chmod('plugins', octdec(777));
}

/// Cargamos la lista de plugins activos
$GLOBALS['plugins'] = array();
if (file_exists('tmp/' . FS_TMP_NAME . 'enabled_plugins.list')) {
    $list = explode(',', file_get_contents('tmp/' . FS_TMP_NAME . 'enabled_plugins.list'));
    if (!empty($list)) {
        foreach ($list as $f) {
            if (file_exists('plugins/' . $f)) {
                $GLOBALS['plugins'][] = $f;
            }
        }
    }
}

/// cargamos las funciones de los plugins
foreach ($GLOBALS['plugins'] as $plug) {
    if (file_exists('plugins/' . $plug . '/functions.php')) {
        require_once 'plugins/' . $plug . '/functions.php';
    }
}
