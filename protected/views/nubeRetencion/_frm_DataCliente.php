<div>
    <table style="width:200mm;" class="marcoDiv">
        <tbody>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('DOCUMENTOS', 'Social reason and last name') ?></span>
                    <span><?php echo $cabDoc['RazonSocialSujetoRetenido'] ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('DOCUMENTOS', 'Identification') ?></span>
                    <span><?php echo $cabDoc['IdentificacionSujetoRetenido'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('DOCUMENTOS', 'Date of issue') ?></span>
                    <span><?php echo date(Yii::app()->params["datebydefault"],strtotime($cabDoc['FechaEmision'])) ?></span>
                </td>
                <td>
<!--                    <span class="titleLabel"><?php //echo Yii::t('DOCUMENTOS', 'Remission guide') ?></span>
                    <span><?php //echo $cabDoc['GuiaRemision'] ?></span>-->
                </td>
            </tr>
        </tbody>
    </table>
</div>