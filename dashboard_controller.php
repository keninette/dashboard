<!-- require db connection and dashboard model-->
<?php 
require_once 'queries_dashboard.php';    
require_once 'dashboard_model.php';  
require_once '../assets/classes/File.php';

// Create an array in which json data will be stored
$jsonData = array();

// Delete old file if necessary and create new JsonFile
$jsonFile = new File('dashboard_data.json','json/');
$jsonFile->removeFile();

// Get JsonData : jobs
$jsonData['jobs_pending']   = 420; 
$jsonData['jobs_max']       = 14478; 
/*$data = $connexionPS->query($query_get_pending_jobs_text)->fetch();
$jsonData['jobs_pending'] = $data['result'];
$data->closeCursor();
unset($data);

$data = $connexionPS->query($query_get_all_jobs_text)->fetch();
$jsonData['jobs_max'] = $data['result'];
$data->closeCursor();
unset($data);*/

// Get nb of remaining articles not indexed by elastic search yet
$elasticSearchCommonFilesDir = '../logs/json/';
// Set default values
$jsonData['index_articles_indexed'] = 0;
$jsonData['index_articles_max']     = 0;
// if dir actually exists count all product_*.json and product_*.json.done
if (is_dir($elasticSearchCommonFilesDir)){
    $remainingFiles = glob($elasticSearchCommonFilesDir .'product_*.json');
    $totalFiles = glob($elasticSearchCommonFilesDir .'product_*.json.done');
    $jsonData['index_articles_max']     = (count($totalFiles) + count($remainingFiles)) >= 0 ? (count($totalFiles) + count($remainingFiles)) : 0;
    // nb of pending article will be total - what has already been done
    $jsonData['index_articles_indexed'] = count($totalFiles) >= 0 ? count($totalFiles) :0;
}

// Get nb of remaining articles with their corresponding products not indexed by elastic search yet
$elasticSearchPAFilesDir = '../logs/json/';
// Set default values
$jsonData['index_articles_products_indexed'] = 0;
$jsonData['index_articles_products_max']     = 0;
// if dir actually exists count all product_*.json and product_*.json.done
if (is_dir($elasticSearchPAFilesDir)){
    $remainingFiles = glob($elasticSearchPAFilesDir .'products_article_*.json');
    $totalFiles = glob($elasticSearchPAFilesDir .'products_article_*.json.done');
    $jsonData['index_articles_products_max']     = (count($totalFiles) + count($remainingFiles)) >= 0 ? (count($totalFiles) + count($remainingFiles)) : 0;
    // nb of pending article will be total - what has already been done
    $jsonData['index_articles_products_indexed'] = count($totalFiles) >= 0 ? count($totalFiles) :0;
}

// Write data into actual json file
$jsonFile->writeFile(json_encode($jsonData));