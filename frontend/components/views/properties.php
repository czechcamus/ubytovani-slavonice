<?php
/* @var $this yii\web\View */
/* @var $properties common\models\PropertyModel */
?>

<ul class="collapsible" data-collapsible="expandable">
	<?php
	foreach ( $properties as $objectProperty ) {
		if ($objectProperty->property_value == 1) {
			echo "<li>\n";
			echo "<div class=\"collapsible-header\">\n";
			echo "<i class=\"material-icons blue-text\">check_box</i> " . $objectProperty->property->title;
			if ($objectProperty->property_note || $objectProperty->objectPropertyTypes || $objectProperty->fees) {
				echo "<i class=\"material-icons right\">keyboard_arrow_down</i>";
			}
			echo "</div>\n";
			if ($objectProperty->property_note || $objectProperty->objectPropertyTypes || $objectProperty->fees) {
				echo "<div class=\"collapsible-body\">\n";
					if ($objectProperty->property_note)
						echo "<p>" . $objectProperty->property_note . "</p>\n";
					if ($objectProperty->objectPropertyTypes) {
						echo "<p>\n";
						foreach ( $objectProperty->objectPropertyTypes as $propertyType ) {
							echo $propertyType->type->title . "<br />\n";
						}
						echo "</p>\n";
					}
					if ($objectProperty->fees) {
						echo "<p><strong>" . Yii::t('front', 'Fees') . ":</strong><br />\n";
						foreach ( $objectProperty->fees as $fee ) {
							echo trim($fee->title) . ": " .$fee->value . " (" . Yii::t('front', 'incl. VAT') . " " . $fee->tax->tax_value . "%)<br />\n";
						}
						echo "</p>\n";
					}
				echo "</div>\n";
			}
			echo "</li>\n";
		}
	}
	?>
</ul>