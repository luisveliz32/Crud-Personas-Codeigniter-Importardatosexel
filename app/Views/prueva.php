
<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @font-face {
                font-family: Algerian-Regular;
                src: url('<?=base_url()?>/uploads/Algerian-Regular.ttf');
            }
            @page {
                margin: 0cm 0cm;
                
            }
            

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }
            .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
                margin-top: 0;
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }
            table {
                caption-side: bottom;
                border-collapse: collapse;
            }
            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
                width: 100%;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
                width: 100%;
                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
            .tabl {
                
                width: 100%;
                
            }
            .tabla {
            width: 100%;
            color: #212529;
            vertical-align: top;
            font-size: 11px;
                
            }
            .thtd {
            text-align: left;
            vertical-align: top;
            border: 2px solid #1C2833;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
            }
            .boleta{
                font-family:Algerian-Regular;
                text-align:center;
                font-size: 16px;
                
            }
            .proyecto{
                text-align:center;
                font-size:11px
            }
            img.izquierda {
                float: left;
                width: 80px;
                height: 80px;
            }

            img.derecha {
                float: right;
                width: 80px;
                height: 80px;
            }
            .wrapper {
                display: grid;
                grid-template-columns: 1fr 3fr;
            }
            h6{
                font-size:11px;
            }
            .tamafecha{
                width:120px;
            }
            .puntos{
                border-bottom: dotted 1px;
            }
            .margincero{
                margin-bottom: 0;
                height: 15px;
            }
            .imp{
                page-break-after: always;
            }
            
            
        </style>
    </head>
    <body>
        <main>
                <div>
                    <img class="izquierda" src="<?=base_url()?>/uploads/icon_web.png">   
                    <img class="derecha" src="<?=base_url()?>/uploads/logoviviendda.png" >       
                </div>
                <br>
                
                <h6 class="proyecto">ESTADO PLURINACINAL DE BOLIVIA</h6>
                <h5 class="boleta" >AGENCIA ESTATAL DE VIVIENDA</h5>
                <h5 class="boleta" style="text-align: right;color:red;">N 2515</h5>
                <h6 class="proyecto">PROYECTO DE VIVIENDA CUALITATIVA EN EL MUNICIPIO DE CERCADO – FASE (LXVII)2021 – TARIJA</h6>
                <h5 class="boleta">BOLETA DE RECEPCIÓN DE MATERIALES DE CONSTRUCCIÓN</h5>
                <table class="tabla">
                    <tr>
                        <td class="tamafecha"><h6 class="margincero">Fecha:</h6></td>
                        <td class="puntos"><h6 class="margincero"></h6></td>
                    </tr>
                    <tr>
                        <td class="tamafecha"><h6 class="margincero">Barrio:</h6></td>
                        <td class="puntos"><h6 class="margincero"></h6></td>
                    </tr>
                    <tr>
                        <td class="tamafecha"><h6 class="margincero">Datos del Proveedor:</h6></td>
                        <td class="puntos"><h6 class="margincero"></h6></td>
                    </tr>
                    <tr>
                        <td class="tamafecha"><h6 class="margincero">placa</h6></td>
                        <td class="puntos"><h6 class="margincero"></h6></td>
                    </tr>
                </table>

                    <table id="table_id" class="tabla">
                        <thead>
                            <tr>
                                <th class="thtd">MATERIAL</th>
                                <th class="thtd">UNIDAD</th>
                                <th class="thtd">CANTIDAD ENVIADA</th>
                                <th class="thtd">TOTAL MATERIAL OBSERVADO</th>
                                <th class="thtd">TOTAL MATERIAL SANO</th>
                                <th class="thtd">TOTAL MATERIAL INGRESADO</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="thtd" >ALAMBRE DE AMARRE </td>
                                    <td class="thtd" >KL</td>
                                    <td class="thtd">23</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">23</td>
                                    <td class="thtd">23</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >ALQUITRAN</td>
                                    <td class="thtd" >Kg</td>
                                    <td class="thtd">3.25</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">3.25</td>
                                    <td class="thtd">3.25</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >CHICOTILLO</td>
                                    <td class="thtd" >pza</td>
                                    <td class="thtd">42</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">42</td>
                                    <td class="thtd">42</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>
                                <tr>
                                    <td class="thtd" >PUERTA TABLERO DE MADERA SEMIDURA INC/MARCO 3.5"X2" C/BARNIZ Y PINTURA + QUINCALLERIA</td>
                                    <td class="thtd" >m2</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">0</td>
                                    <td class="thtd">1.5</td>
                                    <td class="thtd">1.5</td>
                                </tr>

                        </tbody>
                        
                    </table>
                    
                    <table class="tabla">
                        <tr>
                            <td class="puntos"><h6 class="margincero">Observaciones:</h6></td>
                        </tr>
                        <tr>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                        </tr>
                        <tr>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                        </tr>
                        <tr>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                        </tr>
                    </table>
                    <br><br>
                    <table class="tabla" style="text-align:center;border-collapse: separate;border-spacing: 15px 0px">
                        <tr>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                            <td class="puntos"><h6 class="margincero"></h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="margincero">Trasnportista</h6></td>
                            <td><h6 class="margincero">Tecinico Almacenero E.E.</h6></td>
                            <td><h6 class="margincero">Almacenero Comunal</h6></td>
                        </tr>
                        <tr>
                            <td><h6 class="margincero">Entregado por:</h6></td>
                            <td><h6 class="margincero">Recibido por:</h6></td>
                            <td><h6 class="margincero">Recibido por:</h6></td>
                        </tr>
                    </table>
                <div  class="imp" ></div>
        </main>
    </body>
</html>
