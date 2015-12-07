# Dados geográficos úteis

Este repositório contém arquivos `.csv` com:

* Latitude e longitude dos [municípios](latitude-longitude-cidades-csv) do Brasil
* Latitude e longitude de vários [bairros](latitude-longitude-bairros-csv) do Brasil

Se você encontrar algum problema (dados incorretos ou ausentes), por favor abra
uma [Issue](https://github.com/alanwillms/geoinfo/issues) ou
[Pull Request](https://github.com/alanwillms/geoinfo/pulls). Obrigado!

## Atenção!

Atualmente, a base reúne `5583` municípios e `36.982` bairros. Não garantimos a
confiabilidade desses dados, pois eles mudam com frequência.

Só estão listados os bairros dos maiores municípios do Brasil. As demais cidades
só terão um bairro, chamado de “Centro”.

## Origem dos dados

Os dados originalmente foram extraídos do
[FTP do IBGE](ftp://geoftp.ibge.gov.br/organizacao_territorial/localidades/Google_KML/BR%20Localidades%202010%20v1.kml)
e comparados com uma lista de municípios e CEPs de uma base baixada do site
[Coisas Úteis](http://www.coisasuteis.com.br/banco-de-dados-de-cep-2012-em-mysql/).

### Divergências

Durante a comparação entre estas duas fontes, diversos dados foram corrigidos,
tais como:

* Municípios novos
* Erros de ortografia
* Cidades que mudaram de nome

Exemplos:

* Ipauçu-SP corrigida para Ipaussu-SP
* Governador Lomanto Júnior-BA virou Barro Preto-BA
* etc.
