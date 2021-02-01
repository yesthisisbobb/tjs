<?php
// Untuk Handle API
function ventura($endpoint, $data = [], $method = 'GET')
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => 'http://203.161.31.109/ventura/' . $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_HTTPHEADER     => [
            'Authorization: f59c6dfc05dc8f3614e73bab8ba9e7fd8482d3aa05f7d8ebdc66b9fc0bbf40f5a155f1a4f80d20507a27481d58c418671432e712e764e787af9acc1faebf2f05'
        ],
    ]);

    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);

    return json_decode($response, true);
}

// $request = [
//     'kode'   => '6100d',
//     'merk'   => null,
//     'gudang' => null
// ];
// $result = ventura('item/stock?page=' . $page, $request, 'POST'); Contoh request

