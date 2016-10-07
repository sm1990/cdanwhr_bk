<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Code Review</title>
  </head>
  <body>
Add file<br/>
<form action="index.php" method="post">
<textarea id="path" name="path"></textarea>
<br/>
<button id="click" name="click">Click</button> 
</form>
		<?php
if(isset($_POST['click'])){
$string = $_POST['path'];
$xml = new SimpleXMLElement($string);
//-------------------------------Get RESET states ---------------------------------
$resetarray = array();
foreach ($xml->texts_formatted[0]->txt as $rest) {
$rid=$rest['StateStart'];
array_push($resetarray,$rid );
}
//-------------------------------Get SIZE N POS ---------------------------------
echo '<u>Size & Positon</u><br/>';
foreach ($xml->states[0]->state as $state) {
foreach ($state->comps[0]->comp as $comp) {
if($comp['mode']=="edit"){
$sid=$state['id'];
if (!in_array("$sid", $resetarray)) {
foreach ($comp->sizeandpos as $snp) {
echo 'State: ',$state['id'], ' <br/>';
echo 'Comp: ',$comp['id'], ' <br/>';
}
}
}
}
}
echo '<br/><br/>';
//-------------------------------CHECK IN PRELOAD ---------------------------------
$patharray = array();
foreach ($xml->preload[0]->resources as $reso) {
foreach ($reso->res as $resop) {
$respath=$resop['path'];
array_push($patharray,$respath);
}
}
//----------CHECK VALUES INSIDE STATES---------------
$taskparray = array();
$attr_name=array('INIT_DOC_JSON','UPDATE_MERGE_CELLS_DATA','APP_TOOLTIP_IMAGE','CHART_IMAGE','PRINT_PREVIEW_IMAGE_JSON','NEW_TEMPLATE_IMAGE_PATH','NEW_TEMPLATE_ITEM_INFO_PATH','NEW_TEMPLATE_PERSONAL_IMAGE_PATH','NEW_TEMPLATE_PERSONAL_ITEM_INFO_PATH','QAT_MACRO_IMAGE','HEADER_IMAGE','BODY_IMAGE','ALLCHARTS_COLUMN_IMAGE_PATH','RECOMMENDEDLIST_IMAGE_PATH','ALLCHARTS_PIE_IMAGE_PATH','ALLCHARTS_LINE_IMAGE_PATH','ALLCHARTS_BAR_IMAGE_PATH','ALLCHARTS_AREA_IMAGE_PATH','ALLCHARTS_XYSCATTER_IMAGE_PATH','ALLCHARTS_COMBO_IMAGE_PATH','CHART_TAB_IMAGE','HEAD_FOOT_FOOTER_PREVIEW_IMG','WORDART_BACKGROUND_IMAGE','IMAGE_PATH','IMAGE_FOR_CHANGES','USER_LIST_IMAGE_SRC','POWERVIEW_IMAGE','IMPORTING_IMAGE_PATH','CHART_IMAGE','COMP_IMAGE');
foreach ($xml->states[0]->state as $state) {
foreach ($state->comps[0]->comp as $comp) {
foreach ($comp->initialattrs as $inatrs) {
foreach ($inatrs->attr as $atval) {
$intatname=$atval['name'];
if (in_array("$intatname", $attr_name)) {
$inatvalue=$atval['value'];
array_push($taskparray,$inatvalue);
}
}
}
}
}
$result = array_diff($taskparray, $patharray);
print_r($result);
$y=count($result);
for($x = 0; $x <= $y; $x++) {
echo $result[$x];
echo "<br>";
}
}
?> 
		<a href="ami.php">click</a>
  </body>
</html>