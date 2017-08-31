<?php
/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

$this->breadcrumbs=array(
	'Nube Facturas'=>array('index'),
	$model->IdFactura,
);

$this->menu=array(
	array('label'=>'List NubeFactura', 'url'=>array('index')),
	array('label'=>'Create NubeFactura', 'url'=>array('create')),
	array('label'=>'Update NubeFactura', 'url'=>array('update', 'id'=>$model->IdFactura)),
	array('label'=>'Delete NubeFactura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdFactura),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
);
?>

<h1>View NubeFactura #<?php echo $model->IdFactura; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdFactura',
		'AutorizacionSRI',
		'FechaAutorizacion',
		'Ambiente',
		'TipoEmision',
		'RazonSocial',
		'NombreComercial',
		'Ruc',
		'ClaveAcceso',
		'CodigoDocumento',
		'Establecimiento',
		'PuntoEmision',
		'Secuencial',
		'DireccionMatriz',
		'FechaEmision',
		'DireccionEstablecimiento',
		'ContribuyenteEspecial',
		'ObligadoContabilidad',
		'TipoIdentificacionComprador',
		'GuiaRemision',
		'RazonSocialComprador',
		'IdentificacionComprador',
		'TotalSinImpuesto',
		'TotalDescuento',
		'Propina',
		'ImporteTotal',
		'Moneda',
		'UsuarioCreador',
		'EmailResponsable',
		'EstadoDocumento',
		'DescripcionError',
		'CodigoError',
		'DirectorioDocumento',
		'NombreDocumento',
		'GeneradoXls',
		'SecuencialERP',
		'CodigoTransaccionERP',
		'Estado',
		'FechaCarga',
		'IdLote',
	),
)); ?>
