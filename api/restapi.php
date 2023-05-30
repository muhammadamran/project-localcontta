<?php
$host='localhost';
$user='root';
$password='';
$dbname='contta';
$connect=mysqli_connect($host,$user,$password,$dbname) or die(mysql_error());

if (!$connect) {
   die("Connection Failed!: " . mysqli_connect_error());
}

if(function_exists($_GET['function'])) {
   $_GET['function']();
}   
function get_consignee()
{
   global $connect;      
   $query = $connect->query("SELECT * FROM tb_cnee");
   while($row=mysqli_fetch_object($query))
   {
      $data[] =$row;
   }
   $response=array(
      'status' => 1,
      'message' =>'Success',
      'data' => $data
   );
   header('Content-Type: application/json');
   echo json_encode($response);
}   

function get_consignee_id()
{
   global $connect;
   if (!empty($_GET["id"])) {
      $id = $_GET["id"];      
   }            
   $query ="SELECT * FROM tb_cnee WHERE user_id= $id";      
   $result = $connect->query($query);
   while($row = mysqli_fetch_object($result))
   {
      $data[] = $row;
   }            
   if($data)
   {
      $response = array(
         'status' => 1,
         'message' =>'Success',
         'data' => $data
      );               
   }else {
      $response=array(
         'status' => 0,
         'message' =>'No Data Found'
      );
   }

   header('Content-Type: application/json');
   echo json_encode($response);

}
function insert_consignee()
{
   global $connect;   
   $check = array('id' => '', 'nama' => '', 'jenis_kelamin' => '', 'alamat' => '');
   $check_match = count(array_intersect_key($_POST, $check));
   if($check_match == count($check)){

      $result = mysqli_query($connect, "INSERT INTO tb_cnee SET
         id = '$_POST[id]',
         nama = '$_POST[nama]',
         jenis_kelamin = '$_POST[jenis_kelamin]',
         alamat = '$_POST[alamat]'");

      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'Insert Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Insert Failed.'
         );
      }
   }else{
      $response=array(
         'status' => 0,
         'message' =>'Wrong Parameter'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}
function update_consignee()
{
   global $connect;
   if (!empty($_GET["id"])) {
      $id = $_GET["id"];      
   }   
   $check = array('nama' => '', 'jenis_kelamin' => '', 'alamat' => '');
   $check_match = count(array_intersect_key($_POST, $check));         
   if($check_match == count($check)){

      $result = mysqli_query($connect, "UPDATE tb_cnee SET               
         nama = '$_POST[nama]',
         jenis_kelamin = '$_POST[jenis_kelamin]',
         alamat = '$_POST[alamat]' WHERE id = $id");

      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'Update Success'                  
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Update Failed'                  
         );
      }
   }else{
      $response=array(
         'status' => 0,
         'message' =>'Wrong Parameter',
         'data'=> $id
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}
function delete_consignee()
{
   global $connect;
   $id = $_GET['id'];
   $query = "DELETE FROM tb_cnee WHERE user_id=".$id;
   if(mysqli_query($connect, $query))
   {
      $response=array(
         'status' => 1,
         'message' =>'Delete Success'
      );
   }
   else
   {
      $response=array(
         'status' => 0,
         'message' =>'Delete Fail.'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}
?>