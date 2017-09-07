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
                letter-spacing: 5px; 
            }
            .titleNum_Ruc{
                font-size:9pt;
            }

        </style>
    </head>
    <body>
        <?php
        $contador = count($cabFact);
        if ($cabFact !== null) {
            ?>
            <?php echo $this->renderPartial('_barcode', array('cabFact' => $cabFact)); ?>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <!--<td style="width:50%;vertical-align: central">-->
                        <td style="width:50%;vertical-align: central" align="center">
                            <?php //echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logo.png', 'Utimpor', array('width' => '300px', 'height' => '50px')); ?>
                            <?php //echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logoPDF.png', 'Utimpor', array('width' => '340px', 'height' => '110px')); ?>
                            <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logoPDF.png', 'Utimpor', array('width' => '250px', 'height' => '110px')); ?>
                        </td>
                        <td rowspan="2" style="width:50%">
                            <?php echo $this->renderPartial('_frm_CabFact', array('cabFact' => $cabFact)); ?>
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
                            <?php echo $this->renderPartial('_frm_DataCliente', array('cabFact' => $cabFact)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%;">
                <tbody>
                    <tr>

                        <td style="width:50%">
                            <?php echo $this->renderPartial('_frm_DetFact', array('detFact' => $detFact)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:70%;vertical-align: top">
                            <?php echo $this->renderPartial('_frm_DataAuxFact', array('adiFact' => $adiFact,'pagFact' => $pagFact)); ?>
                        </td>
                        <td style="width:30%">
                            <div>
                                <?php echo $this->renderPartial('_frm_TotFact', array('impFact' => $impFact, 'cabFact' => $cabFact)); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <p>
                                    "<b style="color:red">NOTA:</b> UTIMPOR S.A. Solicita a usted enviar el comprobante de retención a <b>retenciones@utimpor.com</b>  en un máximo en los (5) días hábiles posteriores a la emisión de la facturas de acuerdo con el Art. 95 del RALRTI.
                                    Agradecemos confirmar la recepción de éste documento en: <b style="color:green"><?php echo $venFact['CorreoUser'] ?></b>"
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>