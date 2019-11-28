<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen - CPR "Cristichi"</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <?php
    $min = -100;
    $max = 100;
    for ($i = $min; $i < $max; $i++) {
        if ($i % 2 == 0) {
            $pares[] = $i;
        }
    }
    if (isset($pares)) {
        //DEBUG echo 'Números pares en (' . $min . ', ' . $max . '): ' . implode(', ', $pares);
        foreach ($pares as $pos => $valor) {
            if ($pos % 4 == 0) {
                unset($pares[$pos]);
            } else {
                echo 'En la posición ' . $pos . ' se encuentra el valor ' . $valor . '<br>';
            }
        }
    } else {
        echo 'No hay números pares en (' . $min . ', ' . $max . ')';
    }
    ?>
    <h1>Ejercicio 2</h1>
    <?php
    $palabras = array(
        array(
            'Palabra' => 'Melifluo',
            'Definicion' => 'Sonido excesivamente dulce, suave o delicado.',
            'Tamano' => '6',
            'Color' => 'Rojo',
        ),
        array(
            'Palabra' => 'Inefable',
            'Definicion' => 'Algo tan increíble que no puede ser expresado en palabras.',
            'Tamano' => '4',
            'Color' => 'Amarillo',
        ),
        array(
            'Palabra' => 'Etéreo',
            'Definicion' => 'Extremadamente delicado y ligero, algo fuera de este mundo.',
            'Tamano' => '4',
            'Color' => 'Amarillo',
        ),
        array(
            'Palabra' => 'Limerencia',
            'Definicion' => 'Estado mental involuntario propio de la atracción romántica por parte de una persona hacia otra.',
            'Tamano' => '3',
            'Color' => 'Blanco',
        ),
        array(
            'Palabra' => 'Serendipia',
            'Definicion' => 'Hallazgo afortunado e inesperado que se produce cuando se está buscando otra cosa distinta.',
            'Tamano' => '4',
            'Color' => 'Azul',
        ),
        array(
            'Palabra' => 'Arrebol',
            'Definicion' => 'Cuando las nubes adquieren un color rojo al ser iluminadas por los rayos del sol.',
            'Tamano' => '5',
            'Color' => 'Negro',
        ),
        array(
            'Palabra' => 'Iridiscencia',
            'Definicion' => 'Fenómeno óptico donde el tono de la luz varía creando pequeños arcoiris.',
            'Tamano' => '7',
            'Color' => 'Rojo',
        ),
        array(
            'Palabra' => 'Elocuencia',
            'Definicion' => 'El arte de hablar de modo eficaz para deleitar o conmover.',
            'Tamano' => '1',
            'Color' => 'Verde',
        ),
        array(
            'Palabra' => 'Efímero',
            'Definicion' => 'Aquello que dura por un período muy corto de tiempo.',
            'Tamano' => '7',
            'Color' => 'Verde',
        ),
        array(
            'Palabra' => 'Inmarcesible',
            'Definicion' => 'Que no puede marchitarse.',
            'Tamano' => '2',
            'Color' => 'Azul',
        )
    );

    $colores = array(
        'Rojo' => 'FF0000',
        'Amarillo' => 'FFFF00',
        'Verde' => '00FF00',
        'Blanco' => 'FFFFFF',
        'Azul' => '0000FF',
        'Negro' => '000000',
    );

    echo '<ul> Palabras más bonitas de la lengua castellana:';
    foreach ($palabras as $palabra) {
        echo '<li><p><font size="' . $palabra['Tamano'] . 'px" color="' . $colores[$palabra['Color']] . '">' . $palabra['Palabra'] . ': ' . $palabra['Definicion'] . '</font></p></li>';
    }
    echo '</ul>';

    ?>
    <h1>Ejercicio 3</h1>
    <?php
    function formatear($num, $formato = 4){
        switch($formato){
            case 1:
                printf('El valor pasado es %d en decimal<br>', $num);
                break;
            case 2:
                printf('El valor pasado es %x en hexadecimal<br>', $num);
                break;
            case 3:
                printf('El valor pasado es %X en hexadecimal<br>', $num);
                break;
            case 4:
                printf('El valor pasado es %o en octal<br>', $num);
                break;
            case 5:
                printf('El valor pasado es %e en exponencial<br>', $num);
                break;
            case 6:
                printf('El valor pasado es %b en binario<br>', $num);
                break;
            default:
                echo 'Formato incorrecto!!!<br>';
        }
    }

    formatear(12, 1);
    formatear(12, 2);
    formatear(12, 3);
    formatear(12, 4);
    formatear(12, 5);
    formatear(12, 6);
    formatear(12, 'algo');
    formatear(12);
    ?>
    <h1>Ejercicio 4</h1>
    <?php
    function parsear_email($email){
        $array = explode('@', $email);
        if (count($array)!=2){
            return false;
        }
        return array('Nombre'=>$array[0], 'Dominio'=>$array[1]);
    }

    function testear ($email){
        $resultado = parsear_email($email);
        if ($resultado===false)
            echo 'Error al parsear "'.$email.'": No es un email válido.<br>';
        else
            printf('"'.$email.'": "%s" en "%s".<br>', $resultado['Nombre'], $resultado['Dominio']);
    }

    testear('cristichi@hotmail.es');
    testear('alguien@hotmail.es');
    testear('cristichi@hotmail@es');
    testear('cristichi.hotmail.es');
    ?>
    <h1>Ejercicio 5</h1>
    <?php
    // ¿Es esto una referencia a la n-word?
    function n_palabra(){
        if (func_num_args()!=2){
            return false;
        }
        $palabras = func_get_arg(0);
        $pos = func_get_arg(1);
        if (!is_integer($pos)){
            return false;
        }
        $array_palabras = explode(' ', $palabras);
        $pos--;
        if (!isset($array_palabras[$pos])){
            return false;
        }
        return $array_palabras[$pos];
    }

    echo '<ol>';
    $resultado = n_palabra('Hola qué tal', 2);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal');
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal', 2, 35);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal', 5);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal', 1);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal', 2);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    $resultado = n_palabra('Hola qué tal', 3);
    echo '<li>'.($resultado===false?'Error':$resultado).'</li>';
    echo '</ol>';
    ?>
</body>

</html>