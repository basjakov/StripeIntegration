<?php
        require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
            .container{margin-top:100px;}
            .card {width:300px;}
            .card:hover{
                -webkit-transform:scale(1.05);
            }
            .list-group-item{
                border:0px;
                padding:5px;
            }
            .price{
                font-size:72px;
            }
            .curency{
                position:relative;
                font-size:25px;
                top:-31px;
            }
    </style>
</head>
<body>
    <div class="container">
        <?php
         
         $colNum = 1;
        foreach ($products as $productID => $attributes) {
                    if($colNum == 1)
                        echo '<div class="row">';

                    echo '
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                    <h2 class="price">
                                       <span class="curency">$</span>
                                       '.($attributes["price"]/100).'
                                    </h2>
                            </div>
                            <div class="card-body text-center">
                                <div class="card-title">
                                        <h1>'.($attributes["Title"]).'</h2>
                                </div>
                                <ul class="list-group">';
                                    foreach($attributes['features'] as $feature){
                                        echo '<li class="list-group-item">'.$feature.'</li>';
                                    }
                            echo '
                                </ul>
                                <br><br>
                                <form action="stripeIPN.php?id='.$productID.'" method="POST">
                                    <script 
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="'.$stripeDetails['publishableKey'].'"
                                        data-amount="'.$attributes["price"].'"
                                        data-name="'.$attributes["Title"].'"
                                        data-description="Widget"
                                        data-image="https://www.clipartmax.com/png/middle/348-3486176_center-wait-pay-icon-payment.png"></script>

                                </form>
                            </div>   
                        </div>
                    </div>';
                    if($colNum === 3){
                        echo '<div>';
                        $colNum =0;
                    }else{
                        $colNum++;
                    }    
 
        }      
        ?>                      
    </div>
</body>
</html>