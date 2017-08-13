<?php
/* @var $this yii\web\View */
?>
<h1>PROJECT DASHBOARD</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
<div>
	<?php
		echo '<hr/>ROLE : ';
    		foreach ($project_meta_model as $key => $value) {
  				if ($value->key == 'role') {
  					echo $value->value . ', ';
  				}
    		}

	?>

	<?php
		echo '<hr/>PAGES : <br/>';
    		foreach ($project_meta_model as $key => $value) {
  				if ($value->key == 'role') {

					$im1=Yii::getAlias('@vendor').'/gamantha/pao/project/views/project/_'.$value->value.'.php';

					if (file_exists($im1)) {
					  					echo $this->render('_'.$value->value, [
					        				//'model' => $model,
					    				]);
					} else {
					    echo '_ ' . $value->value. ' doesnt exists';
					}


  				}
    		}

	?>


</div>