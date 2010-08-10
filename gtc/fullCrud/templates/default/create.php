<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array(Yii::t('app', 'index')),
	Yii::t('app', 'Create'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' <?php echo $this->modelClass; ?>', 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<?php printf('<h1> %s %s </h1>', Yii::t('app', 'Create'), $this->modelClass); ?>

<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
			'model' => $model,
			'returnUrl' => $returnUrl,
			'buttons' => 'create'));

?>

