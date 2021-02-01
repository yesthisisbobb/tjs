<?php 

class RajaOngkir {

   private function request($endpoint, $method, $data = null) 
   {
      $curl = curl_init();

      curl_setopt_array($curl, [
         CURLOPT_URL            => 'https://pro.rajaongkir.com/api/' . $endpoint,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING       => '',
         CURLOPT_MAXREDIRS      => 10,
         CURLOPT_TIMEOUT        => 0,
         CURLOPT_CUSTOMREQUEST  => $method,
         CURLOPT_POSTFIELDS     => $data,
         CURLOPT_HTTPHEADER     => [
            'key: 697aec56c7cbf87b80c1296def7aa008'
         ],
      ]);

      $response = curl_exec($curl);
      $err      = curl_error($curl);
      $data     = json_decode($response, true);
      curl_close($curl);

      return $data['rajaongkir'];
   }

   public function province($data = []) 
   {
      $request = http_build_query([
         'id' => array_key_exists('id', $data) ? $data['id'] : ''
      ]);

      $query = RajaOngkir::request('province?' . $request, 'GET');
      return $query;
   }

   public function city($data = []) 
   {
      $request = http_build_query([
         'id'       => array_key_exists('id', $data) ? $data['id'] : '',
         'province' => array_key_exists('province', $data) ? $data['province'] : ''
      ]);

      $query = RajaOngkir::request('city?' . $request, 'GET');
      return $query;
   }

   public function subdistrict($data = []) 
   {
      $request = http_build_query([
         'id'   => array_key_exists('id', $data) ? $data['id'] : '',
         'city' => array_key_exists('city', $data) ? $data['city'] : ''
      ]);

      $query = RajaOngkir::request('subdistrict?' . $request, 'GET');
      return $query;
   }

   public function cost($data = []) 
   {
      $request = http_build_query([
         'origin'          => $data['origin'],
         'originType'      => $data['originType'],
         'destination'     => $data['destination'],
         'destinationType' => $data['destinationType'],
         'weight'          => $data['weight'],
         'courier'         => $data['courier'],
         'length'          => array_key_exists('length', $data) ? $data['length'] : '',
         'width'           => array_key_exists('width', $data) ? $data['width'] : '',
         'height'          => array_key_exists('height', $data) ? $data['height'] : '',
         'diameter'        => array_key_exists('diameter', $data) ? $data['diameter'] : ''
      ]);

      $query = RajaOngkir::request('cost', 'POST', $request);
      return $query;
   }

   public function internationalOrigin($data = []) 
   {
      $request = http_build_query([
         'id'       => array_key_exists('id', $data) ? $data['id'] : '',
         'province' => array_key_exists('province', $data) ? $data['province'] : ''
      ]);

      $query = RajaOngkir::request('internationalOrigin?' . $request, 'GET');
      return $query;
   }

   public function internationalDestination($data = []) 
   {
      $request = http_build_query([
         'id' => array_key_exists('id', $data) ? $data['id'] : ''
      ]);

      $query = RajaOngkir::request('internationalDestination?' . $request, 'GET');
      return $query;
   }

   public function internationalCost($data = []) 
   {
      $request = http_build_query([
         'origin'      => $data['origin'],
         'destination' => $data['destination'],
         'weight'      => $data['weight'],
         'courier'     => $data['courier'],
         'length'      => array_key_exists('length', $data) ? $data['length'] : '',
         'width'       => array_key_exists('width', $data) ? $data['width'] : '',
         'height'      => array_key_exists('height', $data) ? $data['height'] : '',
         'diameter'    => array_key_exists('diameter', $data) ? $data['diameter'] : ''
      ]);

      $query = RajaOngkir::request('internationalCost', 'POST', $request);
      return $query;
   }

   public function currency($data = []) 
   {
      $query = RajaOngkir::request('currency', 'GET');
      return $query;
   }

   public function waybill($data = []) 
   {
      $request = http_build_query([
         'waybill' => $data['waybill'],
         'courier' => $data['courier']
      ]);

      $query = RajaOngkir::request('waybill', 'POST', $request);
      return $query;
   }

}
