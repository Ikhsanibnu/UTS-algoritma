<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<?php 
require_once('./assets/requires/config.php'); 
require_once('./assets/requires/header1.php'); 
?> 
 
<body> 
    <div class="container"> 
        <div id="jdlaccr" style="font-size: 36px; color: brown; "> 
            Harber Web 
        </div> 
        <div class="card shadow-sm mb-5 bg-black rounded"> 
            <div class="card-body"> 
                <h5 class="card-title">Input Name</h5> 
                <p class="card-title"><input type="text" class="input input-lg" style="width: 100%;" id="sichInv"></p> 
            </div> 
            <div class="card-footer"> 
                <button class="btn btn-primary" id="btnsearch"> 
                    Submit 
                </button> 
            </div> 
            <div id="infoinvarccr"> 
            <?php

    $search_query = isset($_GET['search']) ? $_GET['search'] : '';


    $api_url = 'https://farmasi.mimoapps.xyz/mimoqss2auyqD1EAlkgZCOhiffSsFl6QqAEIGtM';


    if (!empty($search_query)) {
        $api_url .= '?search=' . urlencode($search_query);
    }


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response_array = json_decode($response, true);

    
    $table_html = '<table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga Jual</th>
                                <th>Quantity</th>
                                <th>Total Asset</th>
                            </tr>
                        </thead>
                        <tbody>';
    foreach ($response_array as $item) {
        $table_html .= '<tr>
                            <td>' . $item['i_code'] . '</td>
                            <td>' . $item['i_name'] . '</td>
                            <td>' . $item['i_sell'] . '</td>
                            <td>' . $item['i_qty'] . '</td>
                            <td>' . $item['i_cogs'] . '</td>
                        </tr>';
    }
    $table_html .= '</tbody></table>';
    echo $table_html;
    ?>
            </div> 
        </div> 
    </div> 
</body> 
 
</html>