<?php

require_once 'include/koneksi.php';


global $connection;
$upload_path = 'uploads/';
$server_ip = gethostbyname(gethostname());
$upload_url = 'http://' . $server_ip.'/AplikasiMagang/'. $upload_path;

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['caption']))
    {

        $caption = $_POST['caption'];
        $fileinfo = pathinfo($_FILES['image']['name']);
        $extension = $fileinfo['extension'];
        $file_url = $upload_path. getFileName() . '.'. $extension;
        $file_path = $upload_path. getFileName(). '.' . $extension;
        $img_name = getFileName(). '.' . $extension;

        try{
            move_uploaded_file($_FILES['image']['tmp_name'], $file_path);

            $sql = "INSERT INTO photos (photo_name, photo_url, caption) ";
            $sql  =" VALUES ('{$img_name}', '{$file_url}', '{$caption}'); " ;

            if (mysqli_query($connection, $sql)){
                $response ['error'] = false;
                $response ['photo_name'] = $img_name;
                $response ['photo_url'] = $file_url;
                $response ['caption'] = $caption;
            }
        } catch(Exception $e){
            $response['error']=true;
            $response['message']=$e->getMessage();
        }
        echo json_encode($response);

        mysqli_close($connection);
    }else{
        $response['error'] = true;
        $response['message'] = 'please choose a file';


    }
}

function getFileName(){
    global $connection;

    $sql = "SELECT max(id) as  id FROM photos";
    $result = mysqli_fetch_array(mysqli_query($connection, $sql));

    if ($result['id'] == null )
    return 1;
    else
    return ++$result['id'];

    mysqli_close($connection);


    
}

?>