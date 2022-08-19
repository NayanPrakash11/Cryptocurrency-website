<?php include 'crypto/_dbconnect.php';?>
<?php
$key="dae6b3c3fd677ee7e9bf58dea08b9a58";
$link="http://api.coinlayer.com/api/live?access_key=dae6b3c3fd677ee7e9bf58dea08b9a58";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$link);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
if(isset($result['success'])){
	if($result['success']==true){
		$strtime=date('Y-m-d h:i:s',$result['timestamp']);
		echo "<b>".$strtime."</b>";
		echo "<br/><br/>";
        echo "<table  id='data' colspan='2' border='1'><tr><th>CURRENCY</th><th>VALUE</th></table>";
        
		foreach($result['rates'] as $key=>$val){
            echo "<table  id='data' border='1'><tr><td>".$key."</td><td>".$val."</td></table>";
            $sql = "insert into 'price_val' ('script_id', 'value') values ($key, $val)";
            $result = mysqli_query($conn, $sql);
            //while($row = mysqli_fetch_assoc($result)){
           // $key= $POST['script_id'];
           // $val= $POST['value']; }
            
		}
	}
}
	
else{
	echo "Something went wrong";
}
?>
<style>
#data {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#data td,
#data th {
    border: 1px solid #ddd;
    padding: 8px;
}

#data tr:nth-child(even) {
    background-color: #f2f2f2;
}

#data tr:hover {
    background-color: #ddd;
}

#data th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>