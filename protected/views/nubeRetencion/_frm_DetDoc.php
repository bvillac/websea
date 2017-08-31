
<table style="width:200mm" class="tabDetalle">
    <tbody>
        <tr>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Coucher') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Numero') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Date of issue') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Fiscal year') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Taxable') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Tax') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Percentage retention') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('DOCUMENTOS', 'Tieback') ?></span>
            </td>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($detDoc); $i++) {
            ?>
            <tr>
                <td class="marcoCel campoDetalle titleDetalle"><?php echo ($detDoc[$i]['CodDocRetener']=='01')?'FACTURA':''; ?></td>
                <td class="marcoCel titleDetalle"><?php echo $detDoc[$i]['NumDocRetener'] ?></td>
                <td class="marcoCel titleDetalle"><?php echo date(Yii::app()->params["datebydefault"],strtotime($detDoc[$i]['FechaEmisionDocRetener'])) ?></td>
                <td class="marcoCel titleDetalle"><?php echo $cabDoc['PeriodoFiscal'] ?></td>    
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detDoc[$i]['BaseImponible']) ?></td>
                <td class="marcoCel campoDetalle"><?php echo ($detDoc[$i]['Codigo']=='1')?'RENTA':(($detDoc[$i]['Codigo']=='2')?'IVA':'ISD'); ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detDoc[$i]['PorcentajeRetener'])  ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detDoc[$i]['ValorRetenido'])  ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>