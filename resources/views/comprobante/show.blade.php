<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPROBANTE DE SERVICIO - ELECTRONICA DEL LITORAL</title>

    

    <style>

        @media print {
            .container {
                width: 100% !important;
                max-width: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            #btnimprimir{
                display:none;

            }
            #linkpdf{
                display:none;
            }
        }

        .lineheadtitle{
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            font-weight: bold;
            line-height: 0.5;
            
        }


        .linehead{
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            font-weight: bold;
            line-height: 0.5;
            
            
        }

        .lineheadTitleNrocomp{
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            font-weight: bold;
            line-height: 0.5;
            text-align: right;
            
        }
        .lineheadNrocomp{
            font-family: 'Courier New', Courier, monospace;
            font-size: 17px;
            font-weight: bold;
            line-height: 0.5;
            text-align: left;
            
        }
        .fieldtitle{
            font-family: 'Courier New', Courier, monospace;
            font-size: 17px;
            line-height: 1;
            text-align: left;
           
        }

        .line {
            border-bottom: 1px solid #000;
            margin: 1px 0;
        }

        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            width: 45%;
            text-align: center;
        }

        .footer {
            font-family: 'Courier New', Courier, monospace;
            text-align: left;
            line-height: 1;
            font-size: 15px;
        }
        .footer p {
            margin: 5px 0;
        }
       
    </style>    
    <!-- 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .comprobante-container {
            width: 95%;
            border: 1px solid #000;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            margin: 5px 0;
        }
       
        .details, .observations {
            margin-top: 20px;
        }
        .observations {
            height: 100px;
        }
      
    </style>

    
    -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    
    
   <div class="container">   
   <div>   
        <div class="line"></div>

        <div class="row"> 
            <div class="col-4"> 
                <p></p>
            </div>
            <div class="col-4">
                <p></p>
                <div class="lineheadtitle" style="text-align: center">- x -</div>
            </div>
            <div class="col-4"> 
                <p></p>
            </div>
        </div>

        <div class="row"> 
            <div class="col-5"> 
                <p></p>
                <div class="lineheadtitle">ELECTRONICA DEL LITORAL</div>
            </div>
            <div class="col-5">
                <p></p>
                <div class="lineheadTitleNrocomp"><strong>COMPROBANTE DE SERVICIO Nº:</strong></div>
                <p></p>
                <div class="lineheadTitleNrocomp">FECHA DE INGRESO: <strong>{{ \Carbon\Carbon::parse($comprobante->FecEntrada)->format('d/m/Y') }}</strong></div>
            </div>
            <div class="col-2"> 
                <p></p>
                <div class="lineheadNrocomp"><strong>{{ $comprobante->CodRepar }}</strong></div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-9"> 
                <p class="linehead"></p>
                <p class="linehead">TV COLOR - VIDEO - C.DISK</p>
                <p class="linehead">ESPAÑA 770 CP:3400 CORRIENTES - TE 4431320</p>
                <p class="linehead">CUIT Nº 20-13249176-4  DGR 091-18862  INICIO ACTIV. 26/05/1988</p>
            </div>
            <div class="col-3">
                
            </div>
        </div>
    
    <div class="line"></div>
    <p></p>
    <div class="row">
         <div class="col-8 fieldtitle">Señor/a: <strong> {{ $comprobante->ClientEmpresa }} </strong></div>
         <div class="col-4 fieldtitle">Te:  <strong>{{ $comprobante->Telefono }}</strong></div>
    </div>
    <p></p>
    <div class="row">
         <div class="col-4 fieldtitle">Aparato:  <strong>{{ $comprobante->Aparato->NomAparato }}</strong></div>
         <div class="col-4 fieldtitle">Marcas:  <strong>{{ $comprobante->Marca->NomMarca }}</strong></div>
         <div class="col-4 fieldtitle">Modelo:  <strong>{{ $comprobante->Modelo }}</strong></div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-6 fieldtitle">Nro Serie: <strong>{{ $comprobante->NroSerie }}</strong></div>
        <div class="col-6 fieldtitle">Fecha de Compra: <strong>{{ \Carbon\Carbon::parse($comprobante->FecCompra)->format('d/m/Y') }} </strong></div>
   </div>
   <p></p>
   <div class="row">
    
    <div class="col-12 fieldtitle">Casa Vendedora : <strong>{{ $comprobante->CasaVendedora->NomEmpresa }}</strong> </div>
    <p></p>
    <div class="row">
        <div class="col-6 fieldtitle">Factura Nº: <strong>{{ $comprobante->NroFactura }}</strong></div>
        <div class="col-6 fieldtitle">PRESUP: <strong>{{ $comprobante->ImporteCotiz }}</strong></div>
   </div>
   <p></p>
   <div class="row">
      <div class="col-12 fieldtitle">Accesorios: <strong>{{ $comprobante->Accesorios }}</strong> </div>
   </div>
   <p></p>
   <div class="row">
      <div class="col-12 fieldtitle">Observaciones: <strong>{{ $comprobante->Observaciones }}</strong> </div>
   </div> 
   <p></p>
   <p></p>
   <div class="row">
    <div class="signature fieldtitle">
        <div>
            <p style="font-weight: bold;">.................................</p>
            <p style="font-weight: bold;">C L I E N T E</p>
        </div>
        <div>
            <p style="font-weight: bold;">.................................</p>
            <p style="font-weight: bold;">T E C N I C O</p>
        </div>
    </div>
    <div class="line"></div>
 </div> 
 <div class="footer">
    <p>Para cualquier consulta o reclamo es imprescindible presentar este comprobante.</p>
    <p>Los materiales recambiados quedan en poder de la empresa.</p>
    <p>Este Formulario no es valido para Facturar.</p>
</div>


  </div>
</div>

<p></p>
<div id="btnimprimir" class="btn btn-primary btn-sm editProduct" onclick="window.print()">
    Imprimir
</div>
<p></p>
<a id="linkpdf" href="{{ route('comprobante.pdf', $comprobante->idRepar) }}">Descargar PDF</a>

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown button
    </button>
    <ul class="dropdown-menu dropdown-menu-dark">
      <li><a class="dropdown-item active" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </div>

</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>
