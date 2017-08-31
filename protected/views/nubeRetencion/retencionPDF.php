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
            .campoDetalle{
                width:90px;

            }
            .dataNumber{
                text-align: right;

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
            .titleRazon{
                font-size:10pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleDocumento{
                font-size:10pt;
                letter-spacing: 3px; 
            }
            .titleNum_Ruc{
                font-size:9pt;
            }
            

        </style>
    </head>
    <body>
        <?php
        $contador = count($cabDoc);
        if ($cabDoc !== null) {
            ?>
            <?php echo $this->renderPartial('_barcode', array('ClaveAcceso' => $cabDoc['ClaveAcceso'],'Identificacion' => $cabDoc['IdentificacionSujetoRetenido'])); ?>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:50%;vertical-align: central">
                            <?php //echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logo.png', 'Utimpor', array('width' => '300px', 'height' => '50px')); ?>
                            <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logoPDF.png', 'Utimpor', array('width' => '340px', 'height' => '110px')); ?>
                        </td>
                        <td rowspan="2" style="width:50%">
                            <?php echo $this->renderPartial('_frm_CabDoc', array('cabDoc' => $cabDoc)); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;vertical-align: bottom">
                            <?php echo $this->renderPartial('_frm_DataEmpresa'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td>
                            <?php echo $this->renderPartial('_frm_DataCliente', array('cabDoc' => $cabDoc)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%;">
                <tbody>
                    <tr>

                        <td style="width:50%">
                            <?php echo $this->renderPartial('_frm_DetDoc', array('detDoc' => $detDoc,'cabDoc' => $cabDoc)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;vertical-align: top">
                            <?php echo $this->renderPartial('_frm_DataAuxDoc', array('adiDoc' => $adiDoc)); ?>
                        </td>
                        <td style="width:30%">
                            <div>
                                <?php //echo $this->renderPartial('_frm_TotFact', array('impFact' => $impFact, 'cabFact' => $cabFact)); ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>