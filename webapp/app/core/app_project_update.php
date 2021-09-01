<?php
include_once('config_init.php');


$currentTable 		= $APP_CONFIG['TABLES']['PROJECT'];

$PAGE['Title'] 		= $BXAF_CONFIG['MESSAGE'][$currentTable]['General']['New_Record'];
$PAGE['Header']		= $BXAF_CONFIG['MESSAGE'][$currentTable]['General']['New_Record'];
$PAGE['Category']	= "Page";

$PAGE['URL']		= 'app_project_update.php';
$PAGE['Body'] 		= 'app_project_update_content.php';
$PAGE['Barcode']	= 'Create New Record';
$PAGE['EXE']		= 'app_project_update_exe.php';

$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['BootstrapSelect'] 		= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['BootstrapDatePicker']	= true;
$BXAF_CONFIG['BXAF_PAGE_HEADER_LIBRARIES']['Select2'] 				= true;


if ($ID > 0){
	$dataArray = getProjectByID($ID);
	$dataArray = processProjectRecord($ID, $dataArray, 3);
	
	
	if ($dataArray['ID'] > 0){	
		$PAGE['Title'] = $PAGE['Header'] = $BXAF_CONFIG['MESSAGE'][$currentTable]['General']['Update_Record'];
		
		
	} else {
		unset($dataArray);
	}
}


if ($dataArray['ID'] <= 0){
	header("Location: app_project_create.php");
	exit();
		
}


if (!isGuestUser()){
	include('template/php/components/page_generator.php');
} else {
	echo "<p>This tool is available for admin users only. Please log in as admin user and try again.</p>";	
}



?>