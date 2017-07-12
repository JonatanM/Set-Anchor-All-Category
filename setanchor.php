<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
 
// Load Up Magento Core
define('MAGENTO', realpath(''));

require_once(MAGENTO . '/app/Mage.php');
 
$app = Mage::app();
 
$categories = Mage::getModel('catalog/category')
			->getCollection()
			->addAttributeToSelect('*')
			->addAttributeToFilter('is_active', 1)
			->addAttributeToFilter('entity_id', array("gt" => 1))
			->setOrder('entity_id');
//->addAttributeToFilter('is_anchor', 0);

 

//$count = 7; 

echo "<ul>";

foreach($categories as $category) {
	echo "<li>" . $category->getId() . "\t" . $category->getName() . "\t" . $category->getIsAnchor() . "\n</li>";
	$category->setIsAnchor(1);

	echo "<li>" . $category->getId() . "\t" . $category->getName() . "\t" . $category->getIsAnchor() . "\n</li>";
	$category->save();

	// if($count <= 0)
	// break;

	// $count--;

	//echo $count;
}

echo "</ul>";
?>
