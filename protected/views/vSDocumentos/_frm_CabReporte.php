<div>
    <table style="width:200mm;" class="">
        <tbody>
            <tr>
                <td>
                    <span class="titleRepor"><?php echo $titulo ?></span>
                </td>
<!--                <td>
                    <span class="titleLabel"><?php //echo Yii::t('TIENDA', 'Issue date')  ?></span>
                    <span><?php //echo date(Yii::app()->params["datebydefault"],strtotime($cabFact['FechaPedido']))  ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php //echo Yii::t('TIENDA', 'User order')  ?></span>
                    <span><?php //echo $cabFact['NombreUser']  ?></span>
                </td>-->

            </tr>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Date')  ?> :</span>
                    <span><?php echo Yii::t('TIENDA', 'From').' '.date(Yii::app()->params["datebydefault"], strtotime($f_ini)) ?></span>
                    <span><?php echo Yii::t('TIENDA', 'To').' '.date(Yii::app()->params["datebydefault"], strtotime($f_fin)) ?></span>
                </td>
            </tr>


        </tbody>
    </table>
</div>