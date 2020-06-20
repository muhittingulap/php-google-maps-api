<?php


class maps
{

    private $url = "https://maps.googleapis.com/maps/api/";
    private $key = "YOUR_GOOGLE_API_KEY";
    private $return_method = "json";
    private $return_type = "array";
    private $api_method = "";
    private $data = array();
    private $prms = array();

    public function __construct()
    {

    }

    public function setKey($data = array())
    {
        $this->key = $data;
        return $this;
    }


    public function setData($data = array())
    {
        $this->data = $data;
        return $this;
    }

    public function getDistance()
    {
        /* setData parrametreleri
       * origins => ex: place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8 veya lat long olarak da gönderilebilir ex: 40.902693, 29.175879
       * destinations => ex: place_id:ChIJz7GHArHHyhQR_pn4LBC6SA8 veya lat long olarak da gönderilebilir ex: 40.902693, 29.175879
       * departure_time => anlık ise  'now' değilse 'unixtimestamp' olarak tarih saat bilgisi int olarak
       * */
        $this->api_method = "distancematrix";
        $this->call();
        return $this;
    }

    public function getDirections()
    {
        /* setData parrametreleri
       * origin => place_id id gönderilmeli ex : ChIJz7GHArHHyhQR_pn4LBC6SA8 veya lat long olarakda gönderilebilir
       * destination => place_id id gönderilmeli  veya lat long olarakda gönderilebilir
       * departure_time => anlık ise  'now' değilse unixtimestamp olarak tarih saat bilgisi int olarak
       * */
        $this->api_method = "directions";
        $this->call();
        return $this;
    }


    public function setApiResponseType($method = "json", $return = "array")
    {
        /*
         * return_method: json / xml
         * return_type: json / array
         * */
        $this->return_method = $method;
        $this->return_type = $return;
        return $this;
    }

    public function getResponse()
    {
        if($this->return_type=='array') $this->response = json_decode($this->response, true);

        return $this->response;
    }

    private function call()
    {
        if (count($this->data) > 0) {
            foreach ($this->data as $k => $v) {
                $this->prms[] = $k . "=" . $v;
            }
        }
        $this->prms[] = "key=" . $this->key;
        $curl_url = $this->url . $this->api_method . '/' . $this->return_method . '?' . implode('&', $this->prms);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $curl_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $this->response = curl_exec($curl);

        curl_close($curl);
        return $this;
    }

}
