<?php
define('BASE_URL', 'http://localhost/PHP2/mvc/');
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    die;
}
function getPagination()
{
    return [
        'default' => 20,
        'list' => [20, 50, 80, 120]
    ];
}
function getClientUrl($urlPath, $params = [])
{
    $url = BASE_URL . $urlPath;
    if (count($params) > 0) {
        $url .= "?";
        foreach ($params as $key => $value) {
            $url .= "$key=$value&";
        }
        $url = rtrim($url, "&");
    }
    return $url;
}
function getAssetUrl($assetUrl)
{
    return BASE_URL . 'public/' . $assetUrl;
}
function getAdminAsset($assetUrl){
    return BASE_URL . 'public/admin/'.$assetUrl;
}
function uploadImage($file, $filelocation)
{
    if ($file['size'] > 0) {
        $filename = $filelocation . '/' . uniqid() . '-' . $file['name'];   
        if (move_uploaded_file($file['tmp_name'], './' . $filename)){
            return $filename;
        }
    }
    return null;
}
