<?php
header('Content-Type: text/txt; charset=utf-8');

$doc = new DOMDocument();

/**
 * Este arquivo "cidades.kml" deve ser obtido da seguinte forma:
 *
 *  - Visite o site do IBGE e baixe o arquivo .kmz (informações geográficas para o Google Earth)
 *  - Converta a extensão do arquivo para .zip e extraia
 *  - Utilize o arquivo doc.kml extraído
 *
 * URL: ftp://geoftp.ibge.gov.br/organizacao_territorial/localidades/Google_KML/BR%20Localidades%202010%20v1.kml
 */
$doc->loadXML(file_get_contents('cidades.kml'));

echo 'Cidade;UF;Longitude;Latitude', "\n";

foreach ($doc->getElementsByTagName('Document') as $documento) {

    foreach ($documento->getElementsByTagName('Folder') as $folder) {

        foreach ($folder->getElementsByTagName('Placemark') as $cidade) {

            // Nome da cidade
            foreach ($cidade->getElementsByTagName('name') as $name) {
                echo trim($name->nodeValue), ';';
            }

            // UF
            foreach ($cidade->getElementsByTagName('description') as $description) {

                $description = $description->nodeValue;

                $description = str_replace(
                    array('<META http-equiv="Content-Type" content="text/html">'),
                    '',
                    $description
                );

                $html = new DOMDocument();
                $html->loadXML($description);

                foreach ($html->getElementsByTagName('body') as $body) {

                    foreach ($body->getElementsByTagName('table') as $k => $table) {

                        if ($k == 1) {

                            foreach ($table->getElementsByTagName('tr') as $k => $tr) {

                                if ($k == 3) {

                                    foreach ($tr->getElementsByTagName('td') as $k => $td) {

                                        if ($k == 1) {
                                            echo $td->nodeValue, ';';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Coordenadas
            foreach ($cidade->getElementsByTagName('MultiGeometry') as $geometria) {

                foreach ($geometria->getElementsByTagName('Point') as $ponto) {

                    foreach ($ponto->getElementsByTagName('coordinates') as $coordenadas) {

                        echo trim(str_replace(',', ';', $coordenadas->nodeValue));
                    }
                }
            }

            echo "\n";
        }
    }
}
