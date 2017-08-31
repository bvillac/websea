<!DOCTYPE html>
<html>
    <head>
        <style>
            body
            {
                width:100%;
                font-family:Arial;
                font-size:7pt;
                margin:0;
                padding:0;
            }
            .marcoDiv{
                border: 1px solid #165480;
                padding: 2mm;
            }
            .marcoCel{
                border: 1px solid #165480;
                padding: 1mm;

            }
            .marcoCelSup{
                border-top: 1px solid #165480;
                padding: 1mm;

            }
            .dataNumber{
                text-align: right;
                padding-right: 5px;
            }
            .titleDetalle{
                text-align: center;

            }
            .tabDetalle{
                border-spacing:0;
                border-collapse: collapse;
            }
            .titleLabel{
                font-size:7pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleRepor{
                font-size:10pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleRazon{
                font-size:10pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleDocumento{
                font-size:10pt;
                letter-spacing: 5px; 
            }
            .titleNum_Ruc{
                font-size:9pt;
            }


        </style>
    </head>
    <body>
        <?php
        $contador = count($data);
        if ($data !== null) {
            //VSValidador::putMessageLogFile($data);
            ?>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td>
                            <?php $this->renderPartial('_frm_CabReporte', array('titulo' => $titulo,'f_ini' => $f_ini,'f_fin' => $f_fin)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:50%">
                            <?php //echo $this->renderPartial('_frm_DetFact', array('detFact' => $detFact, 'ValorNeto' => $cabFact['ValorNeto'])); ?>
                            <table style="width:200mm" class="tabDetalle">
                                <tbody>
                                    <tr>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Estado') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Documento') ?></span>
                                        </td>
                                        
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Fecha') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'RazónSocial') ?></span>
                                        </td>                                        
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Total') ?></span>
                                        </td>
                                                
                                    </tr>
                                    <?php 
                                    for ($i = 0; $i < sizeof($data); $i++) {
                                        echo $data[$i]['RazonSocialComprador'];
                                        //$ValorNeto+=  (float)$data[$i]['ImporteTotal'];
                                        //VSValidador::putMessageLogFile($data[$i]['RazonSocialComprador']);
                                        ?>
                                        <tr>
                                            <td ><?php echo $data[$i]['Estado'] ?></td>
                                            <td ><?php echo $data[$i]['NumDocumento'] ?></td>
                                            <td ><?php echo $data[$i]['FechaAutorizacion'] ?></td>                                          
                                            <td ><?php echo $data[$i]['RazonSocialComprador'] ?></td>                                            
                                            <td class="dataNumber"><?php //echo $data[$i]['ImporteTotal'] ?></td>                                            
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="marcoCelSup dataNumber" colspan="8">
                                            <?php //echo $ValorNeto ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>
    </body>
</html>