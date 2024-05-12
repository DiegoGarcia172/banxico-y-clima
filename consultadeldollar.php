<?php

// URL de la API de Banxico para el tipo de cambio del dólar
$url = 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos';

// Agrega tu token de acceso de Banxico aquí
$token = '6f11963ce2c75a9fd1622d0fd8ed2d958203cc8a121e2fcb3230ac574d5b6a28';

// Construye la URL con el token de acceso
$url_with_token = $url . '?token=' . $token;

// Realiza la solicitud GET a la API de Banxico
$response = file_get_contents($url_with_token);

// Decodifica la respuesta JSON
$data = json_decode($response, true);

// Verifica si la solicitud fue exitosa y obtiene el tipo de cambio
if ($data && isset($data['bmx']['series'][0]['datos'][0]['dato'])) {
    $tipo_de_cambio = $data['bmx']['series'][0]['datos'][0]['dato'];
    echo "El tipo de cambio del dólar es: $tipo_de_cambio MXN por USD";
} else {
    echo "Hubo un error al obtener el tipo de cambio.";
}
?>
