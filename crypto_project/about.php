<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Welcome to Cryptocurrency analysis platform</title>
</head>

<body>
    <?php include 'crypto/_dbconnect.php';?>
    <?php include 'crypto/header.php';?>
    <?php
       $key="O302AKSFBC5VUMDX";
       $url="https://www.alphavantage.co/query?function=CRYPTO_INTRADAY&symbol=BTC&market=INR&interval=60min&apikey=".$key;
       $ch=curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
       $result=curl_exec($ch);
       curl_close($ch);
       $result=json_decode($result,true);
       if(isset($result['Time Series Crypto (60min)'])){
        echo "<table id = 'value' width=100%><Th>BTC</Th></table><table  id='customers' border='1'><tr><th>Date</th><th>Open</th><th>High</th><th>Low</th><th>close</th><th>volume</th></tr>";
        foreach($result['Time Series Crypto (60min)'] as $key=>$val){
          echo "<tr><td>$key</td><td>".$val['1. open']."</td><td>".$val['2. high']."</td><td>".$val['3. low']."</td><td>".$val['4. close']."</td><td>".$val['5. volume']."</td></tr>";
        }
        echo "</table>";
      }else{
        echo "Something went wrong";
      }
    
      ?>
    <style>
    #value{
        text-align: center;
        padding: 50px;
        margin-top: 2rem;
        margin-bottom: 2rem;
        font-size: 2rem;

    }    
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>


    <?php include 'crypto/footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>