# Greenter
    
Esta libreria le permite realizar la implementación de la **Facturación Electrónica** en Perú, desde los sistemas desarrollados por el 
contribuyente, la cual esta normado por SUNAT.   
Greenter realiza la mayoria de tareas del proceso, genera el XML según el estándar UBL, firma con el certificado digital que sunat exige,
comprime el archivo XML en formato zip, conexión al webservice de SUNAT y procesa el CDR (Comprobante de Recepción).

<p align="center">
  <img alt="Sunat Facturacion Electronica" width="256px" src="https://greenter.dev/img/logo.svg">
</p>


## Requerimientos
- PHP 7.2 o superior
- Extensiones PHP Activadas: `soap`, `dom`, `zip`, `zlib`, `openssl`.

## Instalar
```bash
composer require greenter/greenter
```
Puede ver una demostración en [@greenter/demo](https://github.com/thegreenter/demo).

## Caracteristicas

### Documentos Soportados.

- Factura Electrónica
- Boleta Electrónica
- Nota de Crédito Electrónica
- Nota de Débito Electrónica
- Resumen Diario de Boletas
- Comunicación de Bajas
- Guia Remisión Electrónica
- Retención Electrónica
- Percepción Electrónica
- Resumen de Reversiones

### Web Services
- Envío y empaquetado de los comprobantes electrónicos
- Consulta de tickets (Resumen diario, Comunicación de Bajas)
- Consulta de Cdr

### XML
- Estandar UBL v2.0, v2.1
- Firma con certificado digital

### Representación Impresa.
- Generación de [HTML Report](https://github.com/thegreenter/report)
- Generación de [PDF](https://github.com/thegreenter/htmltopdf)

### API REST
API REST con [Lycet](https://github.com/giansalex/lycet) empleando Symfony Framework.
