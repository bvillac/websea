<div>
    <table style="width:100mm;" class="marcoDiv">
        <tbody>
            <tr>
                <td class="titleDetalle">
                    <span class="titleLabel"><?php echo Yii::t('DOCUMENTOS', 'Additional Information') ?></span>
                </td>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($adiFact); $i++) {
                if($adiFact[$i]['Descripcion']<>''){
                ?>
                <tr>
                    <td>
                        <span class="titleLabel"><?php echo $adiFact[$i]['Nombre'] ?></span>
                        <span><?php echo $adiFact[$i]['Descripcion'] ?></span>
                    </td>
                </tr>
            <?php 
                }
            } ?>


        </tbody>
    </table>
    <br>
    <table style="width:100mm;" class="tabDetalle">
        <tbody>
            <tr>
                <td class="marcoCel titleDetalle">
                    <span class="titleLabel"><?php echo Yii::t('DOCUMENTOS', 'Payment form') ?></span>
                </td>
                <td class="marcoCel titleDetalle">
                    <span><?php echo Yii::t('DOCUMENTOS', 'Total') ?></span>
                </td>
                <td class="marcoCel titleDetalle">
                    <span><?php echo Yii::t('DOCUMENTOS', 'Term') ?></span>
                </td>
                <td class="marcoCel titleDetalle">
                    <span><?php echo Yii::t('DOCUMENTOS', 'Time') ?></span>
                </td>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($pagFact); $i++) {
                if($pagFact[$i]['FormaPago']<>''){
                ?>
                <tr>
                    <td class="marcoCel">
                       <?php echo $pagFact[$i]['FormaPago'] ?>
                    </td>
                    <td class="marcoCel dataNumber">
                        <?php echo Yii::app()->format->formatNumber($pagFact[$i]['Total'])  ?>
                    </td>
                    <td class="marcoCel dataNumber">
                        <?php echo $pagFact[$i]['Plazo'] ?>
                    </td>
                    <td class="marcoCel">                        
                        <?php echo $pagFact[$i]['UnidadTiempo'] ?>
                    </td>
                </tr>
            <?php 
                }
            } ?>
        </tbody>
    </table>
</div>