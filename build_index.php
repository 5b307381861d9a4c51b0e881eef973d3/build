<?php


function flashproxy($validasi = 0) {
    #return "";
    if ($validasi == 1) {
        return "";
    }
    exe:
    $name = "flashproxy.txt";
    $file_content = file_get_contents($name);
    
    if ($file_content === false || strlen($file_content) == 0){
        print "pastikan kamu sudah ada file ".$name.n;
        tx("enter to continue");
        goto exe;
    }

    if ($validasi == "v2") {
        $name = "flashproxy2.txt";
    }
    $proxy_array = arr_rand(file($name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
    
    foreach ($proxy_array as $item) {

        if (strpos($item, "-99".$validasi."-") !== false || strpos($item, "-99".$validasi."_") !== false) {
          $new_array[] = $item;
        }
    }
    
    if ($new_array) {
        unset($proxy_array);
        $proxy_array = $new_array;
    }

    for ($i = 0; $i < count($proxy_array); $i++) {
      
        if (!$proxy_array[$i]) {
            goto exe;
        }
        if (strpos($proxy_array[$i], "@") !== false) {
            $proxy = trimed($proxy_array[$i]);
        } else {
            $parts = explode(':', $proxy_array[$i]);
            $proxy = trimed($parts[2].':' .$parts[3].'@'.$parts[0].':'. $parts[1]);
        }#die($proxy.n);
        $json = curl("https://ipinfo.io/widget/", 0, 0, 0, 0, 0, $proxy)[2];
        #die(print_r($json));
        if (!$json->country || !$json->ip) {
            print m."proxy mati";
            r();
            continue;
        }
        
        if (validateIP($json->ip)) {
            print p."sedang mendeteksi proxy/VPN or Tor";
            sleep(1);
            r();

            if ($json->privacy->proxy || $json->privacy->tor || $json->privacy->vpn) {
                print m."terdeteksi proxy/VPN or Tor";
                r();
                continue;
            }
           /* $js = curl("https://proxycheck.io/v2/".$json->ip."?vpn=1&asn=1")[2]->{$json->ip};
            
            if ($js->proxy == "yes" || $js->vpn == "yes") {
                print m."terdeteksi proxy/VPN or Tor";
                r();
                continue;
            }*/
            print p."proxy siap digunakan";
            r();
           
            if (!$json->country) {
                print m."proxy mati";
                r();
                continue;
            }
            
            if (defined('bypassed')) {
                print k."country: ".$json->country." | ip: ".$json->ip.n;
            }
            return $proxy;
        }
    }
}


function getUserAgent()
{
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; SM-A205U) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; SM-A102U) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; SM-G960U) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; SM-N960U) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; LM-X420) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; LM-Q720) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 14; LM-Q710(FGN)) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Android 14; Seluler; rv:68.0) Gecko/68.0 Firefox/125.0";
	$userAgentArray[] = "Mozilla/5.0 (Android 14; Seluler; LG-M255; rv:125.0) Gecko/125.0 Firefox/125.0";
	
	$getArrayKey = array_rand($userAgentArray);
	return $userAgentArray[$getArrayKey];

}







function joen($inputArray, $delete = false) {
    $result = "";
    $temp = [];

    foreach ($inputArray as $value) {
        if (!is_array($value)) {
            $value = preg_replace('/;+/', ';', $value);

            if ($delet) { $value = preg_replace('/\b('.$delete.')=[^;]*;/', '', $value);}

            if (!isset($temp[$value])) {
                $temp[$value] = true;
                $result .= $value;
            }
        }
    }

    parse_str(str_replace(';', '&', $result), $array);
    $newString = http_build_query($array, '', ';');
    return $newString;
}
function captcha_bitmoon() {
    $eol = "\n";
    $boundary = "------WebKitFormBoundary";
    $content = 'Content-Disposition: form-data; name="payload"';
    
   #h while (true) {
        $code = az_num(16);
        $data = '';
        $data .= $boundary . $code . $eol;
        $data .= $content . $eol . $eol;
        $data .= base64_encode(json_encode(["i" => 1, "a" => 1, "t" => "dark", "ts" => round(time() * 1000)])) . $eol;
        $data .= $boundary . $code . '--';
        
        $r = base_run(host . "system/libs/captcha/request.php", $data, 1, $code);
        
        if ($r["status"] == 403) {
            print m . "there is an error!!";
            sleep(1);
            r();
            return "";
        }
        
        $r = base_run(host . "system/libs/captcha/request.php?payload=" . base64_encode(json_encode(["i" => 1, "ts" => round(time() * 1000)])));
        
        if ($r["status"] == 403) {
            print p . "no captcha wait!";
            L(60);
            r();
            return "";
        }
        
        for ($i = 0; $i < 5; $i++) {
            $coordinate = coordinate($r["res"], $i);
            if ($coordinate["x"]) {
                break;
            }
        }
        
        if (!$coordinate["x"]) {
            return "";
        }
        
        $microtime = ["ts" => round(time() * 1000)];
        $load = ["i", "x", "y", "w", "a"];
        $pay = [1, $coordinate["x"], $coordinate["y"], 314.661, 2];
        
        $answer = array_combine($load, $pay);
        $answer_enc = json_encode(array_merge($answer, $microtime));

        $code1 = az_num(16);
        $data1 = '';
        $data1 .= $boundary . $code1 . $eol;
        $data1 .= $content . $eol . $eol;
        $data1 .= base64_encode($answer_enc) . $eol;
        $data1 .= $boundary . $code1 . '--';
        
        $r = base_run(host . "system/libs/captcha/request.php", $data1, 1, $code1);
        
        if ($r["status"] == 200) {
            return join(',', [$answer["x"], $answer["y"], $answer["w"]]);
        } else {
          print p . "error captcha not solve";
          sleep(2);
          r();
          return "";
        #}
        
    }
}

function count_key($iconPath, $count) {
  for ($o = 0; $o < count($iconPath); $o++) {
    $image = imagecreatefromstring($iconPath[$o]);
    $width = imagesx($image);
    $height = imagesy($image);
    $pixel_count = 0;

    for ($x = 0; $x < $width; $x++) {
      for ($y = 0; $y < $height; $y++) {
        $color = imagecolorat($image, $x, $y);

        if ($color == 0) {
          $pixel_count++;
        }
      }
    }

    imagedestroy($image);
    $array_pixel_count[] = $pixel_count;
    unset($pixel_count);
  }

  $values_count = array_count_values($array_pixel_count);

  if ($count == count($values_count)) {
    return "";
  }

  for ($i = 0; $i < count($array_pixel_count); $i++) {
    if (!$array_pixel_count[$i] || 10 >= $array_pixel_count[$i]) {
      return "";
    }
  }

  for ($i = 0; $i < count($array_pixel_count); $i++) {
    if (!$array_pixel_count[$i]) {
      break;
    }

    $key[] = $values_count[$array_pixel_count[$i]];
  }

  for ($i = 0; $i < count($array_pixel_count); $i++) {
    if ($key[$i] == 1) {
      $valid[] = $key[$i];
    }
  }

  if ($valid) {
    if (count($valid) >= 2) {
      return "";
    }
  }

  for ($i = 0; $i < count($array_pixel_count); $i++) {
    if ($key[$i] == 1) {
      $key_array = "$i";
      break;
    }
  }

  if (!$key_array) {
    for ($l = 0; $l < count($array_pixel_count); $l++) {
      if ($key[$l] == 2) {
        $key_array = "$l";
        break;
      }
    }
  }

  if (!$key_array) {
    for ($l = 0; $l < count($array_pixel_count); $l++) {
      if ($key[$l] == 3) {
        $key_array = "$l";
        break;
      }
    }
  }

  return $key_array;
}

function coordinate($img, $negate = 0) {
  //$img = file_get_contents("coba1.png");
  if (300 >= strlen($img)) {
    print "image not found!";
    r();
    return "";
  }
  
  $isx = [
    [10, 74, 138, 202, 265],
    [5, 58, 110, 163, 217, 270],
    [3, 48, 93, 138, 183, 228, 273],
    [3, 44, 84, 124, 164, 204, 244, 284]
  ];

  $array_container = [
    [31, 96, 159, 226, 286],
    [25, 80, 135, 185, 240, 290],
    [22, 68, 112, 158, 202, 248, 295],
    [20, 60, 100, 140, 180, 220, 260, 300]
  ];

  for ($o = 0; $o < count($isx); $o++) {
    for ($z = 0; $z < count($isx[$o]); $z++) {
      ob_start();
      $image = imagecreatefromstring($img);
      $width = imagesx($image);
      $height = imagesy($image);
      
      if (count($isx[$o]) == 5) {
        $cut_width = 45;
      } elseif (count($isx[$o]) == 6) {
        $cut_width = 45;
      } elseif (count($isx[$o]) == 7) {
        $cut_width = 39;
      } elseif (count($isx[$o]) == 8) {
        $cut_width = 33;
      }
      
      if ($negate == 1) {
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagefilter($image,IMG_FILTER_NEGATE);
      } elseif ($negate == 2) {
        imagefilter($image, IMG_FILTER_NEGATE);
      } elseif ($negate == 3) {
        imagefilter($image,IMG_FILTER_GRAYSCALE);
      } else {
        for ($x = 0; $x < 2; $x++) {
          imagealphablending($image, false);
          imagesavealpha($image, true);
          $transparan = imagecolorallocatealpha($image, 0, 0, 0, 127);
          imagefill($image, 0, 0, $transparan);
        }
      }
    
      $image = imagecrop($image, ['x' => $isx[$o][$z], 'y' => 0, 'width' => $cut_width, 'height' => $height]);
      imagepng($image);
      imagedestroy($image);
      
      $data = ob_get_contents();
      ob_end_clean();
      $file[] = $data;
      $foo[] = strlen($data);
    }

    $string_array = count_key($file, count($isx[$o]));
    if (!$string_array) {
      unset($file);
      continue;
    }
    
    if ($string_array){
      return [
        "x" => $array_container[$o][$string_array],
        "y" => rand($height/2, 30),
        "ans" => base64_encode("1,701,24,915,8,915,Mozilla,0,19,".$array_container[$o][$string_array].",412,24,1,412,Linux armv8l,0,".time())
      ];
    }
  }
}



function demo($methode,$sitekey,$site){
  while(true){
    $host = "recaptcha-v3-solver-0-1-score.p.rapidapi.com";
    $h = array(
      'X-RapidAPI-Key: bb5ef0f9f7msh7c6f6bbd32b20e5p138ee2jsn7f7e780ec6f8',
      'X-RapidAPI-Host: '.$host);
      $response = curl("https://".$host."/?siteKey=".$sitekey."&action=examples/v3scores&site=".$site,$h);
      if($response[0][0]["x-ratelimit-requests-remaining"] == 0){die($response[1]);
      }
      if(!$response[2]->token){
        continue;
      }
      return $response[2]->token;
  }
}
function demok($methode,$sitekey,$site){
  while(true){
    $host = "recaptcha-v2-solver.p.rapidapi.com";
    $h = array(
      'X-RapidAPI-Key: 5a6415fc95msh3d2bd7a05de9698p123541jsnc5536eda498e',
      'X-RapidAPI-Host: '.$host);
      $response = curl("https://".$host."/?siteKey=".$sitekey."&site=".$site,$h);
      if($response[0][0]["x-ratelimit-requests-remaining"] == 0){die($response[1]);
      }
      if(!$response[2]->token){
        continue;
      }
      return $response[2]->token;
  }
}

function c() {
    $clear = (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') ? 'cls' : 'clear';
    pclose(popen($clear, 'w'));
}

function az_num($amount = false) {
    $array = array_merge(range("A", "Z"), range(0, 9));
    $az = $az_num = '';

    for ($s = 0; $s < count($array); $s++) {
        if (range(0, 25)[$s] >= $s) {
            $az .= $array[$s];
        }
        $az_num .= $array[$s];
    }

    if ($amount >= 1) {
        return substr(str_shuffle(strtolower($az) . $az_num), 0, $amount);
    } else {
        die("masukan jumlah angka\n\ncontoh -> az_num(123);\n");
    }
}

function new_cookie($cookie_old, $cookie_new) {
    $array = array('&' => '%26', '+' => '%2B', ';' => '&');
    parse_str(strtr($cookie_old, $array), $old);
    parse_str(strtr($cookie_new, $array), $new);
    $array_merge = array_merge($old, $new);
    return http_build_query($array_merge, '', ';', PHP_QUERY_RFC3986);
}

function multiexplode($delimiters, $string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    return explode($delimiters[0], $ready);
}

function multi_strpos($haystack, $needles) {
    if (!is_array($needles)) {
        $needles = array($needles);
    }

    foreach ($needles as $needle) {
        if (strpos(strtolower(urldecode($haystack)), strtolower($needle)) !== false) {
            return true;
        }
    }
}

function arr_rand($my_array = array()) {
    $copy = array();
    while (count($my_array)) {
        $element = array_rand($my_array);
        $copy[$element] = $my_array[$element];
        unset($my_array[$element]);
    }
    return array_merge($copy);
}

function set_cookie($result, $array = 0) {
    preg_match_all('/^Set-Cookie:\s*([^;\r\n]*)/mi', $result, $matches);
    $cookies = array();
    
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    
    if ($array) {
        return $cookies;
    }

    return urldecode(http_build_query($cookies, '', ';', PHP_QUERY_RFC3986)) . ";";
}



function scrape_chek(){
    $raw = curl("https://raw.githubusercontent.com/TheSpeedX/PROXY-List/master/http.txt")[1];
    $list = arr_rand(explode("\n",$raw));
    for($i=0;$i<count($list);$i++){
      $proxy=  explode(':', $list[$i]);
      $host = $proxy[0]; 
      $port = $proxy[1]; 
      $TimeoutInSeconds = 1;
      $valid = false;
      if($fp = @fsockopen($host,$port,$errCode,$errStr,$TimeoutInSeconds)){
      $valid = true;
      } 
      if($valid == true){
        return $list[$i];
      }
    }
}

function scrape_list() {
    $file = "proxyscrape_premium_http_proxies.txt";

    if (!file_exists($file)) {
        die("file $file tidak ada\n");
    }

    return trimed(array_values(arr_rand(file($file)))[0]);
}





function proxyscrape($validasi = false) {
    re:// return 0;
    $key_scrape = save("key_scrape");
    $h = ["user-agent: Mozilla/5.0"];
    $url = "https://api.proxyscrape.com/v2/account/datacenter_shared/whitelist?sessionid=$key_scrape&userid=$key_scrape&type=";

    while(true) {
        print p."mengecek ip";
        r();
        $my_ip = validateIP(curl("https://api.proxyscrape.com/ip.php", $h)[1]);
      
        if (!file_get_contents("key_scrape")) {
            unlink("key_scrape");
            goto re;
        } elseif (!$my_ip) {
            sleep(5);
            continue;
        } elseif ($my_ip) {
            break;
        } 
    }
    
    $boost = 0;
    while(true) {
        $boost++;
        if (!file_get_contents("key_scrape")) {
            unlink("key_scrape");
            goto re;
        }
        print p."verifikasi proxy api";
        r();
        $bas = curl($url."get", $h)[2];
        $my_ip_up = $bas->whitelisted[0];
        if ($bas->status == "invalid") {
            
            if (5 > $boost) {
                print k."sedang memastikan key";
                sleep(5);
                r();
                continue;
            }
            print "key tidak berguna lagi silakan ganti".n;
            unlink("key_scrape");
            goto re;
        } elseif ($my_ip == $my_ip_up) {
          
            if ($validasi) {
                print p."proxy safety";
                r();
                return "ok";
            }
            $base = curl("https://api.proxyscrape.com/v2/account/datacenter_shared/proxy-list?sessionid=$key_scrape&userid=$key_scrape&type=displayproxies&format=json&draw=2&columns[0][data]=0&columns[0][name]=&columns[0][searchable]=true&columns[0][orderable]=false&columns[0][search][value]=&columns[0][search][regex]=false&columns[1][data]=1&columns[1][name]=&columns[1][searchable]=true&columns[1][orderable]=false&columns[1][search][value]=&columns[1][search][regex]=false&columns[2][data]=2&columns[2][name]=&columns[2][searchable]=true&columns[2][orderable]=false&columns[2][search][value]=&columns[2][search][regex]=false&columns[3][data]=3&columns[3][name]=&columns[3][searchable]=true&columns[3][orderable]=false&columns[3][search][value]=&columns[3][search][regex]=false&start=0&length=100&search[value]=&search[regex]=false&protocol=http", $h)[2]->data;
            
            
            if ($base[0][1] == "HTTP") {
                unset($count_offline);
                print p."mencari proxy online";
                r();
                $array = arr_rand($base);
                
                for ($i = 0; $i < count($array); $i++) {
                  
                    if ($array[$i][2] == "Offline") {
                        $count_offline[] = $i;
                        
                        if (count(array_filter($count_offline)) + 1 == count($array)) {
                            print m."semua proxy sedang Offline".n;
                            tx("enter to continue");
                            goto re;
                        }
                        continue;
                    }
                    
                    if (!$array[$i][2]) {
                        goto re;
                    }
                    
                    if ($array[$i][2] == "Online") {
                        print p."proxy siap digunakan";
                        r();
                        return $array[$i][0];
                    }
                }
            } else {
                goto re;
            }
        } elseif ($my_ip !== $my_ip_up) {
          
            if (curl($url."remove&ip[]=".$my_ip_up, $h)[2]->status == "ok") {
                sleep(2);
                
                if (curl($url."add&ip[]=$my_ip", $h)[2]->status == "ok") {
                    continue;
                }
            }
        }
    }
}


function validateIP($ip) {
    $validIPv4 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    $validIPv6 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    
    if ($validIPv4 !== false || $validIPv6 !== false) {
        return $ip;
    }
    
    if (preg_match("/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/", $ip)) {
        $parts = explode(".", $ip);
        foreach ($parts as $part) {
            if ($part < 0 || $part > 255) {
                return "";
            }
        }
        return $ip;
    }
    return "";
}




function movePage(){
    return [
         0 => "ERROR CONNECTION",
         100 => "Response 100 Continue",
         101 => "Response 101 Switching Protocols",
         200 => "Response 200 OK",
         201 => "Response 201 Created",
         202 => "Response 202 Accepted",
         203 => "Response 203 Non-Authoritative Information",
         204 => "Response 204 No Content",
         205 => "Response 205 Reset Content",
         206 => "Response 206 Partial Content",
         300 => "Response 300 Multiple Choices",
         301 => "Response 301 Moved Permanently",
         302 => "Response 302 Found",
         303 => "Response 303 See Other",
         304 => "Response 304 Not Modified",
         305 => "Response 305 Use Proxy",
         307 => "Response 307 Temporary Redirect",
         400 => "Response 400 Bad Request",
         401 => "Response 401 Unauthorized",
         402 => "Response 402 Payment Required",
         403 => "Response 403 Forbidden",
         404 => "Response 404 Not Found",
         405 => "Response 405 Method Not Allowed",
         406 => "Response 406 Not Acceptable",
         407 => "Response 407 Proxy Authentication Required",
         408 => "Response 408 Request Time-out",
         409 => "Response 409 Conflict",
         410 => "Response 410 Gone",
         411 => "Response 411 Length Required",
         412 => "Response 412 Precondition Failed",
         413 => "Response 413 Request Entity Too Large",
         414 => "Response 414 Request-URI Too Large",
         415 => "Response 415 Unsupported Media Type",
         416 => "Response 416 Requested range not satisfiable",
         417 => "Response 417 Expectation Failed",
         500 => "Response 500 Internal Server Error",
         501 => "Response 501 Not Implemented",
         502 => "Response 502 Bad Gateway",
         503 => "Response 503 Service Unavailable",
         504 => "Response 504 Gateway Time-out"
     ];
}

function remove_emoji($string) {
    return preg_replace('/[[:^print:]]/', '', $string);
}

function trimed($txt) {
    return preg_replace('/\s+/', '', $txt);
}

function lah($x = 0, $inp = 0) {
    if ($x == 1) {
        ket(k.explode("/", host)[2], m."no ".$inp." can be bypassed").line();
    } elseif ($x == 2) {
        ket(k.explode("/", host)[2], m."sorry there is no method for ".$inp).line();
    } else {
        ket(k.explode("/", host)[2], m."sorry no energy").line();
    }
}

function rt() {
    c();
    $t = $_SERVER["TMPDIR"];
    
    if (file_exists($t)) {
        system("rm -rf $t/* 2>&1");
        return true;
    }
}

function tx($a, $b = 0) {
    while (true) {
        print(h . "Input " . $a . c . " > " . p);
        $tx = trim(fgets(STDIN));

        if ($b) {
            $num = trimed(preg_replace("/[^0-9]/", "", $tx));
            
            if ($num >= 0) {
                return $num;
            } else {
                continue;
            }
        }

        return $tx;
    }
}


function ex($a, $b, $c, $d) {
    return explode($b, explode($a, $d)[$c])[0];
}

function new_save($name, $delete = false){
    $file = "data.json";
    $host = explode("/", $name)[2] ? explode("/", $name)[2] : ($name ? $name : "");
    
    if (!file_get_contents($file)) {
        file_put_contents($file,"[]");
    }    
    $decode = json_decode(file_get_contents($file), true);
    
    if ($delete) {
      
        if (strpos(http_build_query($decode), $host) === false) {
            return $decode;
        }
    }
    
    if ($decode[$host] == null) {
        $data[$host] = tx($host);
        $create = 1;
    } else {
        $data[$host] = $decode[$host];
    }
    $array = array_merge($decode, $data);
    
    if (strpos(http_build_query($array), $host) !== false) {
      
        if ($delete) {
            unset($array[$host]);
            $del = 1;
        }
    }
    
    if (preg_match_all('/"([^"]+)"\s*:\s*/', file_get_contents($file), $matches, PREG_SET_ORDER)) {
        $count = count($matches);
        
        for ($i = 2; $i < $count; $i++) {
          
            if ($matches[$i][1] == "email") {
              
                if (preg_match("#(email)#is", http_build_query($array))) {
                    $array_up["email"] = $data["email"];
                    $array = array_merge($array_up, $array);
                    $up = 1;
                    break;
                }
            }
        }
        
        for ($i = 2; $i < $count; $i++) {
          
            if ($matches[$i][1] == "user-agent") {
              
                if (preg_match("#(Mozilla)#is", http_build_query($array))) {
                    $array_up["user-agent"] = $data["user-agent"];
                    $array = array_merge($array_up, $array);
                    $up = 1;
                    break;
                }
            }
        }
    }
    
    if ($create || $up || $del) {
        file_put_contents($file, json_encode($array, JSON_PRETTY_PRINT));
        return json_decode(file_get_contents($file), true);
    } else {
        return $decode;
    }
}


function Save($a) {
    if (file_exists($a)) {
        $b = file_get_contents($a);
    } else {
        $b = tx($a);
        n;
        file_put_contents($a, $b);
    }
    return $b;
}

function an($input) {
    $a = str_split($input); 
    foreach ($a as $b) {
        print $b;
        usleep(1500);
    }
}

function text_line($input) {
    $n = "\n";
    $a = str_split(" ".$input.n); 
    foreach ($a as $b => $c) {
        if (strlen($input) >= 55) {
            if ($b >= strlen($input) / 2) {
                if ($c == " ") {
                    print $n;
                    unset($n);
                }
            }
        }
        print $c;
        usleep(1500);
    }
    line();
}


function tmr($a, $tmr) {
    date_default_timezone_set('UTC').r();
    $timr = time() + $tmr;
    $col = [b, c, h, k, m, p, u];
    
    while (true):
        $res = $timr - time();
        
        if ($res < 1) {
            break;
        }
        
        if ($a == 1) {
            print $col[array_rand($col)].'CLAIM NEXT TIME:'.date(' H', $res).'H'.date(' i', $res).'M'.date(' s', $res).'S'.d;r();
        } elseif ($a == 2) {
            print $col[array_rand($col)].'please wait'.date(' H:i:s ', $res).d;r();
        }
    endwhile;
}

function countdown($countdown) {
    for ($i = 0; $i < count($countdown); $i++) {
        $timer = bcdiv($countdown[$i], 1000) - time();
        
        if ($timer >= -2) {
            if ($timer >= 5500) {
                continue;
            } else {
                tmr(1, $timer);
                break;
            }
        }
    }
}

function diff_time($fr, $time) {
    date_default_timezone_set('asia/jakarta');
    $start = strtotime($time);
    $stop = strtotime(date("H:i"));
    $diff = $stop - $start;
    
    if (explode("-", $diff)[1]) {
        $dif = explode("-", $diff)[1];
    } else {
        $dif = $diff;
    }
    
    if ($fr * 60 >= $dif) {
        return 1;
    }
}

/*function L($t) {
    r();
    $col = [b, c, h, k, m, p, u];
    
    for ($i = 1; $i <= $t; $i++) {
        print $col[array_rand($col)]."\rLoading... [".intval($i/$t*100)."%]";
        flush();
        sleep(1);
    }
    
    r();
}*/

function L($seconds) {
    if (!function_exists('display_loading')) {
        function display_loading($percent) {
            $bar_length = 25;
            $progress = round($percent * $bar_length / 100);

            print p." Loading [";
            for ($i = 0; $i < $bar_length; $i++) {
                if ($i < $progress) {
                    print "-";
                } else {
                    print " ";
                }
            }
            print "]> " . $percent . "%\r";
        }
    }

    $percent = 0;
    for ($percent = 0; $percent <= 100; $percent++) {
        display_loading($percent);
        usleep(intval($seconds) * 10000);
    }
    r();
}



function r() {
    sleep(1);
    print "\r".str_repeat(' ', 62)."\r";
}

function line() {
    print str_repeat(p.'─', 50).n;
}

function ket($a, $aa, $b = 0, $bb = 0, $c = 0, $cc = 0, $d = 0, $dd = 0) {
    if ($a or $aa) {
        print h.$a.c." > ".p.$aa.n;
    } 
    if ($b or $bb) {
        print h.$b.c." > ".p.$bb.n;
    } 
    if ($c or $cc) {
        print h.$c.c." > ".p.$cc.n;
    } 
    if ($d or $dd) {
        print h.$d.c." > ".p.$dd.n;
    }
}

function ket_line($a, $aa, $b = 0, $bb = 0, $c = 0, $cc = 0) {
    if ($a or $aa) {
        print h.$a.c." > ".p.$aa;
    } 
    if ($b or $bb) {
        print " | ".h.$b.c." > ".p.$bb;
    } 
    if ($c or $cc) {
        print " | ".h.$c.c." > ".p.$cc;
    }
    print n;
}

function curl($url, $header = false, $post = false, $followlocation = false, $cookiejar = false, $alternativ_cookie = false, $proxy = false) {
    $x = 0;
    while (true) {
        $x++;
        if (!parse_url($url)["scheme"]) {
            print m."url tidak valid";
            sleep(2);
            r();
        }
        $default[CURLOPT_URL] = trimed($url);
        if ($followlocation) {
            $default[CURLOPT_FOLLOWLOCATION] = $followlocation;
        }
        $default[CURLOPT_RETURNTRANSFER] = 1;
        $default[CURLOPT_ENCODING] = 'gzip,deflate';
        $default[CURLOPT_HEADER] = 1;
        $default[CURLOPT_SSL_VERIFYPEER] = 0;
        $default[CURLOPT_SSL_VERIFYHOST] = 0;
        $default[CURLOPT_CONNECTTIMEOUT] = 15;
        $default[CURLOPT_TIMEOUT] = 30;
        if ($header) {
            $default[CURLOPT_HTTPHEADER] = $header;
        }
        if ($post) {
            if ($post == 1) {
                $default[CURLOPT_POST] = 1;
            } else {
                $default[CURLOPT_POST] = 1;
                $default[CURLOPT_POSTFIELDS] = $post;
            }
        }
        if ($cookiejar) {
            $default[CURLOPT_COOKIEFILE] = $cookiejar;
            $default[CURLOPT_COOKIEJAR] = $cookiejar;
        }
        if ($alternativ_cookie) {
            $mergedCookies = call_user_func_array('array_merge', $alternativ_cookie);
            $default[CURLOPT_COOKIE] = http_build_query($mergedCookies, '', ';', PHP_QUERY_RFC3986).";";
        }
        
        
        if ($proxy) {
            $default[CURLOPT_PROXY] = $proxy;
        }
        $options = $default;
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $output = curl_exec($ch);
        $response = substr($output, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $info = curl_getinfo($ch);
        curl_close($ch);
        
        if (!$info["primary_ip"]) {
          
            print m.movePage()[$info["http_code"]];
            r();
            print explode("port", curl_error($ch))[0];
            r();
            continue;
        } else {
            foreach (explode("\r\n", substr($output, 0, strpos($output, "\r\n\r\n"))) as $i => $line) {
                if ($i == 0) {
                    $headers['http_code'] = $line;
                } else {
                    list($key, $value) = explode(': ', $line);
                    $header_array[$key] = $value;
                }
            }
        }
        if ($info["http_code"] == 0) {
          
            if (10 >= $x) {
                print k.movePage()[$info["http_code"]];
                r();
                continue;
            }
            
            if (strpos($proxy, 'flashproxy') !== false) {
                return [[$header_array, $info, $output], $response, json_decode(str_replace([n, "﻿"], "", strip_tags($response)))];
            }
        }
        print p.movePage()[$info["http_code"]];
        r();
        return [[$header_array, $info, $output], $response, json_decode(str_replace([n, "﻿"], "", strip_tags($response)))];
    }
}


function asci($string){
    $res = ip();
    date_default_timezone_set($res["t"]);
    $acssi = [
        "a" => ["┌─┐","├─┤","┴ ┴"],
        "b" => ["┌┐ ","├┴┐","└─┘"],
        "c" => ["┌─┐","│  ","└─┘"],
        "d" => ["┌┬┐"," ││","─┴┘"],
        "e" => ["┌─┐","├┤ ","└─┘"],
        "f" => ["┌─┐","├┤ ","└  "],
        "g" => ["┌─┐","│ ┬","└─┘"],
        "h" => ["┬ ┬","├─┤","┴ ┴"],
        "i" => ["┬","│","┴"],
        "j" => [" ┬"," │","└┘"],
        "k" => ["┬┌─","├┴┐","┴ ┴"],
        "l" => ["┬  ","│  ","┴─┘"],
        "m" => ["┌┬┐","│││","┴ ┴"],
        "n" => ["┌┐┌","│││","┘└┘"],
        "o" => ["┌─┐","│ │","└─┘"],
        "p" => ["┌─┐","├─┘","┴  "],
        "q" => ["┌─┐ ","│─┼┐","└─┘└"],
        "r" => ["┬─┐","├┬┘","┴└─"],
        "s" => ["┌─┐","└─┐","└─┘"],
        "t" => ["┌┬┐"," │ "," ┴ "],
        "u" => ["┬ ┬","│ │","└─┘"],
        "v" => ["┬  ┬","└┐┌┘"," └┘ "],
        "w" => ["┬ ┬","│││","└┴┘"],
        "x" => ["─┐ ┬","┌┴┬┘","┴ └─"],
        "y" => ["┬ ┬","└┬┘"," ┴ "],
        "z" => ["┌─┐","┌─┘","└─┘"],
        " "=>[" "," "," "],
        "1" => ["┬","│","┴"],  
        "2" => ["┌─┐","┌─┘","└─┘"],  
        "3" => ["┌─┐"," ├┤","└─┘"],
        "4" => ["┬ ┬","└─┤","  ┘"],
        "5" => ["┌─┐","└─┐","└─┘"],
        "6" => ["┌─┐","├─┐","└─┘"],
        "7" => ["┌─┐","  │","  ┘"],
        "8" => ["┌─┐","├─┤","└─┘"],
        "9" => ["┌─┐","└─┤","└─┘"],
        "0" => ["┌─┐","│ │","└─┘"]
    ];
    $x = str_split($string);
    print p."time:".date("H:i").str_repeat(p.' ',7).mp." ▶ ".d.p." Xianjing7".str_repeat(p.' ',7)."date:".date("m/d/Y").n;
    line();
    print " ";
    foreach($x as $data){
    print h.$acssi[$data][0];
    }
    print h." country ".c." > ".p.$res["c"].n." ";
    foreach($x as $data){
    print c.$acssi[$data][1];
    }
    print h." region".c." > ".p.$res["r"].n." ";
    foreach($x as $data){
    print p.$acssi[$data][2];
    }
    print h." ip".c." > ".p.$res["i"].n;
    foreach($x as $data){
    print c.$acssi[$data][3];
    }
    line();
}

function ip() {
    $if = json_decode(file_get_contents("https://ipinfo.io/?utm_source=ipecho.net&utm_medium=referral&utm_campaign=upsell_sister_sites"));
    return [
        "i" => $if->ip,
        "r" => $if->region,
        "c" => $if->country,
        "t" => $if->timezone
    ];
}

function user_agent() {
    if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
        $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z Safari/537.36';
    } else {
        $user_agent = 'Mozilla/5.0 (Linux; Android 11; M2012K11AG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z Mobile Safari/537.36';
    }
    return $user_agent;
}

function head($xml = 0, $boundary = 0) {
    global $u_a, $u_c;
    $header = [];
    $header[] = "Host: " . explode("/", host)[2];
    if ($boundary) {
        $header[] = "content-type: multipart/form-data; boundary=----WebKitFormBoundary" . $boundary;
    }
    if ($xml == 1) {
        $header[] = "x-requested-with: XMLHttpRequest";
    }
    if ($xml == 2) {
        $header[] = "content-type: application/x-www-form-urlencoded";
       // $header[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
        //$header[] = "referer: ".host;
    }
    $header[] = "referer: ".host;
    
    if (!$u_a) {
        $u_a = user_agent();
    }
    $header[] = "user-agent: " . $u_a;
    if ($u_c) {
        $header[] = "cookie: " . $u_c;
    }
    return $header;
}



function multi_atb($r) {
    $apikey = save("apikey_multibot");
    preg_match_all('# <img src="(.*?)"#is', $r, $main_img);
    preg_match_all('#rel=\\\"(.*?)\\\"><img src=\\\"(.*?)\\\"#is', $r, $rell_img);
    if ($rell_img[1]) {
        for ($k = 0; $k < count($main_img[1]); $k++) {
            if (preg_match("#data:image#is", $main_img[1][$k])) {
                $main = $main_img[1][$k];
                break;
            }
        }
        if (!$main) {
            return "";
        }
        $code = az_num(16);
        $boundary = "------WebKitFormBoundary" . $code;
        $content = "Content-Disposition: form-data; name=";
        $data = '';
        for ($i = 0; $i < count($rell_img[1]); $i++) {
            $data .= $boundary . n;
            $data .= $content . '"' . $rell_img[1][$i] . '"' . n . n;
            $data .= $rell_img[2][$i] . n;
        }
        $data .= $boundary . n;
        $data .= $content . '"main"' . n . n;
        $data .= $main . n;
        $data .= $boundary . n;
        $data .= $content . '"method"' . n . n;
        $data .= "antibot" . n;
        $data .= $boundary . n;
        $data .= $content . '"key"' . n . n;
        $data .= $apikey . n;
        $data .= $boundary . n;
        $data .= $content . '"json"' . n . n;
        $data .= "1" . n;
        $data .= $boundary . "--";
    }
    $h = [
        "Content-Type: multipart/form-data; boundary=----WebKitFormBoundary" . $code
    ];
    $o = 0;
    while ($o <= 20) {
        $o++;
        if ($o == 15) {
            return "";
        }
        $js = curl("https://multibot.in/in.php", $h, $data)[2];
        if ($js->status == 1) {
            $id = $js->request;
            break;
        }
    }
    $x = 0;
    while ($x <= 20) {
        $x++;
        if ($x == 15) {
            return "";
        }
        sleep(5);
        $js = curl("https://multibot.in/res.php?action=get&id=" . $id . "&key=" . $apikey . "&json=1", ["Accept: */*"])[2];
        if ($js->request == "WRONG_RESULT") {
            return "";
        }
        if ($js->status == 1) {
            return " " . str_replace(",", " ", $js->request);
        }
        print $js->request;
        r();
    }
}

function multibot($method, $sitekey, $pageurl, $rr = 0) {
    if ($method == 'invisible_recaptchav2') {
        $method = 'recaptchav2';
    }
    if (!$sitekey) {
        print m . "sitekey not found";
        sleep(2);
        r();
        return "";
    }
    refresh:
    print p;
    $host = "api.multibot.in";
    $name_api = "apikey_multibot";
    $apikey = save($name_api);
    $recaptchav2 = http_build_query([
        "key" => $apikey,
        "method" => "userrecaptcha",
        "googlekey" => rtrim(ltrim($sitekey)),
        "pageurl" => $pageurl
    ]);
    $hcaptcha = http_build_query([
        "key" => $apikey,
        "method" => "hcaptcha",
        "sitekey" => rtrim(ltrim($sitekey)),
        "pageurl" => $pageurl
    ]);
    $turnstile = http_build_query([
        "key" => $apikey,
        "method" => "turnstile",
        "sitekey" => rtrim(ltrim($sitekey)),
        "pageurl" => $pageurl
    ]);
    $type = [
        "recaptchav2" => $recaptchav2,
        "hcaptcha" => $hcaptcha,
        "cf-turnstile" => rtrim(ltrim($turnstile)),
        "turnstile" => $turnstile
    ];
    $ua = [
        "host: " . $host,
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s = 0;
    while (true) {
        $s++;
        $r = curl("http://" . $host . "/in.php?" . $type[$method], $ua)[1];
        if ($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif ($r == "ERROR_WRONG_USER_KEY") {
            if ($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id = explode('|', $r)[1];
        if (!$id) {
            if ($s == 3) {
                return "";
            }
            print "Get ID Captcha";
            r();
            continue;
        }
        sleep(5);
        $x = 0;
        while (true) {
            $x++;
            if ($x == 40) {
                return "";
            }
            $r1 = curl("http://" . $host . "/res.php?" . http_build_query([
                    "key" => $apikey,
                    "action" => "get",
                    "id" => $id
                ]), $ua)[1];
            if ($r1 == "CAPCHA_NOT_READY") {
                print str_replace("_", " ", $r1);
                sleep(5);
                r();
                continue;
            } elseif (strlen($r1) >= 50) {
                return explode('|', $r1)[1];
            } else {
                print str_replace("_", " ", $r1);
                r();
                goto refresh;
            }
        }
    }
}
function xevil($method, $sitekey, $pageurl, $rr = 0) {
    if ($method == 'invisible_recaptchav2') {
        $method = 'recaptchav2';
    }
    if (!$sitekey) {
        print m . "sitekey not found";
        sleep(2);
        r();
        return "";
    }
    refresh:
    print p;
    $host = "sctg.xyz";
    $name_api = "apikey_xevil";
    $apikey = save($name_api);
    $recaptchav2 = http_build_query([
        "key" => $apikey,
        "method" => "userrecaptcha",
        "googlekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $hcaptcha = http_build_query([
        "key" => $apikey,
        "method" => "hcaptcha",
        "sitekey" => $sitekey,
        "pageurl" => $pageurl
    ]);
    $type = [
        "recaptchav2" => $recaptchav2,
        "hcaptcha" => $hcaptcha
    ];
    $ua = [
        "host: " . $host,
        "content-type: application/json/x-www-form-urlencoded"
    ];
    $s = 0;
    while (true) {
        $s++;
        $r = curl("http://" . $host . "/in.php?" . $type[$method], $ua)[1];
        if ($r == "ERROR_USER_BALANCE_ZERO") {
            unlink($name_api);
            goto refresh;
        } elseif ($r == "ERROR_WRONG_USER_KEY") {
            if ($s == 3) {
                unlink($name_api);
                goto refresh;
            }
        }
        $id = explode('|', $r)[1];
        if (!$id) {
            if ($s == 3) {
                return "";
            }
            print "Get ID Captcha";
            r();
            continue;
        }
        sleep(5);
        $x = 0;
        while (true) {
            $x++;
            if ($x == 40) {
                return "";
            }
            $r1 = curl("http://" . $host . "/res.php?" . http_build_query([
                    "key" => $apikey,
                    "action" => "get",
                    "id" => $id
                ]), $ua)[1];
            if ($r1 == "CAPCHA_NOT_READY") {
                print str_replace("_", " ", $r1);
                sleep(5);
                r();
                continue;
            } elseif (strlen($r1) >= 50) {
                return explode('|', $r1)[1];
            } else {
                print str_replace("_", " ", $r1);
                r();
                goto refresh;
            }
        }
    }
}

function solvemedia($sitekey, $pageurl) {
    $r = get_e("https://api-secure.solvemedia.com/papi/challenge.ajax");
    preg_match_all("#(magic|chalapi|chalstamp|lang|size|theme|type)(:'|:)(.*?)(,|',)#is", trimed($r), $array);
    $c = array_combine($array[1], $array[3]);
    $url = str_replace("&", ";", urldecode(http_build_query(["https://api-secure.solvemedia.com/papi/_challenge.js?k" => $sitekey, ";f" => "_ACPuzzleUtil.callbacks[0]", "l" => $c["lang"], "t" => $c["type"], "s" => $c["size"], "c" => "js,h5c,h5ct,svg,h5v,v/h264,v/webm,h5a,a/mp3,a/ogg,ua/chrome,ua/chromeW,os/android,os/android11,fwv/" . az_num(6) . "." . az_num(6) . ",jslib/jquery,htmlplus", "am" => $c["magic"], "ca" => $c["chalapi"], "ts" => $c["chalstamp"], "ct" => time() + rand(80, 100), "th" => $c["theme"], "r" => "0." . rand(1111111111111111, rand(100, 200) . "9999999999999")])));
    $header[] = 'Host: api-secure.solvemedia.com';
    $header[] = 'sec-ch-ua: "Chromium";v="W", " Not;A Brand";v="99"';
    $header[] = 'sec-ch-ua-mobile: ?1';
    $header[] = 'user-agent: ' . user_agent();
    $header[] = 'sec-ch-ua-platform: "Android"';
    $header[] = 'referer: ' . $pageurl;
    $header[] = 'accept-encoding: gzip, deflate';
    $header[] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    $header[] = 'sec-fetch-site: cross-site';
    $header[] = 'sec-fetch-mode: no-cors';
    $header1[] = 'accept: */*';
    $header1[] = 'sec-fetch-dest: script';
    $header2[] = 'accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8';
    $header2[] = 'sec-fetch-dest: image';
    $r = curl($url, array_merge($header, $header1));
    $challenge = explode('"', $r[1])[5];
    $url = "https://api-secure.solvemedia.com/papi/media?c=" . $challenge . ";w=300;h=150;fg=000000;bg=f8f8f8";
    $r = curl($url, array_merge($header, $header2));
    $img[] = base64_encode($r[1]);
    $text = explode(":", googleapis($img, "normal"))[1];
    if ($text) {
        return [$text, $challenge];
    }
}

function recaptchav3($sitekey, $pageurl) {
    $h = [
        "Host: www.recaptcha.net",
        "User-Agent: Googlebot/2.1 (+https://www.google.com/bot.html)",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
        "Referer: " . $pageurl,
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7"
    ];
    $anchor_url = "https://www.recaptcha.net/recaptcha/api2/anchor?ar=1&k=" . $sitekey . "&co=" . str_replace("=", ".", base64_encode("https://" . parse_url($pageurl)["host"] . ":443")) . "&hl=id&v=" . az_num(24) . "&size=invisible&cb=" . strtolower(az_num(12));
    $query = parse_url($anchor_url);
    foreach (explode("&", $query["query"]) as $i => $line) {
        list($key, $value) = explode('=', $line);
        $results[$key] = $value;
    }
    $r = curl($anchor_url, $h);
    preg_match('/"recaptcha-token" value="(.*?)"/', $r[1], $token);
    sleep(3);
    $data = http_build_query([
        "v" => $results["v"],
        "reason" => "q",
        "c" => $token[1],
        "k" => $results["k"],
        "co" => $results["co"]
    ]);
    $h1 = [
        "Host: www.recaptcha.net",
        "Content-Length: " . strlen($data),
        "User-Agent: Googlebot/2.1 (+https://www.google.com/bot.html)",
        "Accept: */*",
        "Origin: https://www.recaptcha.net",
        "Referer: " . $anchor_url,
        "Accept-Encoding: gzip, deflate, br",
        "Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7"
    ];
    $r1 = curl("https://www.recaptcha.net/recaptcha/api2/reload?k=" . $results["k"], $h1, $data);
    preg_match("/\d+/", explode('"', $r1[1])[4], $s);
    if ($s[0] >= 110) {
        preg_match('/"rresp","(.*?)"/', $r1[1], $rresp);
        return $rresp[1];
    }
}

function icon_bits() {
    $data = http_build_query([
        "cID" => false,
        "rT" => true,
        "tM" => "light"
    ]);

    $r = base_run(host . "system/libs/captcha/request.php", $data, 1);

    if ($r["status"] >= 201) {
        return "";
    }

    $hash = $r["json"];

    if (!$hash[1]) {
        return "";
    }

    $file_size = [];

    for ($x = 0; $x < count($hash); $x++) {
        $r1 = base_run(host . "system/libs/captcha/request.php?cid=0&hash=" . $hash[$x]);

        if ($r1["status"] >= 201) {
            return "";
        }

        $file_size[] = strlen(str_replace([n, " "], "", trimed($r1["res"])));
    }

    $array = array_count_values($file_size);

    for ($i = 0; $i < count($file_size); $i++) {
        if (!$file_size[$i]) {
            break;
        }

        $code[] = $array[$file_size[$i]];
    }

    for ($i = 0; $i < count($file_size); $i++) {
        if ($code[$i] == 1) {
            $proses = "$i";
            break;
        }
    }

    $answer = $hash[$proses];

    $data1 = http_build_query([
        "cID" => false,
        "pC" => $answer,
        "rT" => 2
    ]);

    $r = base_run(host . "system/libs/captcha/request.php", $data1, 1);

    if ($r["status"] == 200) {
        return $answer;
    }
}


function antibot($html){
  preg_match_all('#rel=\\\"(.*?)\\\">#is',$html,$rell);
  preg_match_all('#png;base64,(.*?)(\\\"|")#is',$html,$img);
  $text_rel = $rell[1];
  $captcha = googleapis($img[1]);
  $text_main = $captcha;
  $text_res = $captcha[1];
  $txt[] = array('1'=>'one', '2'=>'two', '3'=>'three', '4'=>'four', '5'=>'five', '6'=>'six', '7'=>'seven', '8'=>'eight', '9'=>'nine', '10'=>'ten', 'notextreturn' => '');
  $txt[] = array('one'=>'1', 'two'=>'2', 'three'=>'3', 'four'=>'4', 'five'=>'5', 'six'=>'6', 'seven'=>'7', 'eight'=>'8', 'nine'=>'9', 'ten'=>'10');
  $txt[] = array('i'=>'1', 'ii'=>'2', 'iii'=>'3', 'iv'=>'4', 'v'=>'5', 'vi'=>'6', 'vii'=>'7', 'viii'=>'8', 'ix'=>'9', 'x'=>'10');
  $txt[] = array('c@t'=>'cat', 'd0g'=>'dog', '1!0n'=>'lion', 't!g3r'=>'tiger', 'm0nk3y'=>'monkey', '31eph@nt'=>'elephant', 'c0w'=>'cow', 'f0x'=>'fox', 'm0us3'=>'mouse', '@nt'=>'ant');
  $txt[] = array('1'=>'2-1', '2'=>'1+1', '3'=>'1+2', '4'=>'2+2', '5'=>'3+2', '6'=>'2+4', '7'=>'3+4', '8'=>'4+4', '9'=>'1+8', '11'=>'5+6');
  $txt[] = array('3-2'=>'1', '8-6'=>'2', '1+2'=>'3', '3+1'=>'4', '9-4'=>'5', '3+3'=>'6', '6+1'=>'7', '2*4'=>'8', '3+6'=>'9', '2+8'=>'10');
  $txt[] = array('200'=>'zoo', '020'=>'ozo', '002'=>'ooz', '500'=>'soo', '050'=>'oso', '005'=>'oos', '101'=>'lol', '505'=>'sos', '202'=>'zoz', '111'=>'lll');
  $txt[] = array('2*a'=>'aa', '3*a'=>'aaa', '2*b'=>'bb', '3*b'=>'bbb', '1*a+1*b'=>'ab', '1*a+2*b'=>'abb', '2*a+2*b'=>'aabb', '2*c'=>'cc', '3*c'=>'ccc', '1*c+1*a'=>'ca', '1*c+1*b'=>'cb', '1*c+2*a'=>'caa', '1*c+2*b'=>'cbb', '2*c+1*a'=>'cca');
  $txt[] = array('aa'=>'2*a', 'aaa'=>'3*a', 'bb'=>'2*b', 'bbb'=>'3*b', 'ab'=>'1*a+1*b', 'abb'=>'1*a+2*b', 'aabb'=>'2*a+2*b', 'cc'=>'2*c', 'ccc'=>'3*c', 'ca'=>'1*c+1*a', 'cb'=>'1*c+1*b', 'caa'=>'1*c+2*a', 'cbb'=>'1*c+2*b', 'cca'=>'2*c+1*a');
  $txt[] = array('--+'=>'oox', '-+-'=>'oxo', '+--'=>'xoo', '++-'=>'xxo', '-++'=>'oxx', '+-+'=>'xox', '---'=>'ooo', '+++'=>'xxx', '+-+-'=>'xoxo', '+-+'=>'-oxox');
  $txt[] = array('oox'=>'--x', 'oxo'=>'-x-', 'xoo'=>'x--', 'xxo'=>'xx-', 'xxo'=>'-xx', 'xox'=>'x-x', 'ooo'=>'---', 'xxx'=>'xxx', 'xoxo'=>'x-x-', 'oxox'=>'-x-x');
  $txt[] = array('--+'=>'--x', '-+-'=>'-x-', '+--'=>'x--', '++-'=>'xx-', '-++'=>'-xx', '+-+'=>'x-x', '---'=>'xxx', '+++'=>'---', '+-+-'=>'x-x-', '-+-+'=>'-x-x');
  $txt[] = array('oo+'=>'--x', 'o+o'=>'-x-', '+oo'=>'x--', '++o'=>'xx-', 'o++'=>'-xx', '+o+'=>'x-x', 'ooo'=>'---', '+++'=>'xxx', '+o+o'=>'x-x-', 'o+o+'=>'-x-x');
  #tambahan
  $txt[] = array('1'=>'-one', '2'=>'-two', '3'=>'-three', '4'=>'-four', '5'=>'-five', '6'=>'-six', '7'=>'-seven', '8'=>'-eight', '9'=>'-nine', '10'=>'-ten');
  $txt[] = array('one'=>'-1', 'two'=>'-2', 'three'=>'-3', 'four'=>'-4', 'five'=>'-5', 'six'=>'-6', 'seven'=>'-7', 'eight'=>'-8', 'nine'=>'-9', 'ten'=>'-10');
  $txt[] = array('cat'=>'cat', 'dog'=>'dog', 'lion'=>'lion', 'tiger'=>'tiger', 'monkey'=>'monkey', 'elephant'=>'elephant', 'cow'=>'cow', 'fox'=>'fox', 'mouse'=>'mouse', 'ant'=>'ant');
  $txt[] = array('c@t'=>'-cat', 'd0g'=>'-dog', '1!0n'=>'-lion', 't!g3r'=>'-tiger', 'm0nk3y'=>'-monkey', '31eph@nt'=>'-elephant', 'c0w'=>'-cow', 'f0x'=>'-fox', 'm0us3'=>'-mouse', '@nt'=>'-ant');
  $txt[] = array('zoo'=>'zoo', 'ozo'=>'ozo', 'ooz'=>'ooz', 'soo'=>'soo', 'oso'=>'oso', 'oos'=>'oos', 'lol'=>'lol', 'sos'=>'sos', 'zoz'=>'zoz', 'lll'=>'lll');
  $txt[] = array('200'=>'200', '020'=>'020', '002'=>'002', '500'=>'500', '050'=>'050', '005'=>'005', '101'=>'101', '505'=>'505', '202'=>'202', '111'=>'111');
  $txt[] = array('zoo'=>'200', 'ozo'=>'020', 'ooz'=>'002', 'soo'=>'500', 'oso'=>'050', 'oos'=>'005', 'lol'=>'101', 'sos'=>'505', 'zoz'=>'202', 'lll'=>'111');
  $txt[] = array('one'=>'one', 'two'=>'two', 'three'=>'three', 'four'=>'four', 'five'=>'five', 'six'=>'six', 'seven'=>'seven', 'eight'=>'eight', 'nine'=>'nine', 'ten'=>'ten');
  $txt[] = array('z00'=>'200', '0z0'=>'020', '00z'=>'002', 's00'=>'500', '0s0'=>'050', '00s'=>'005', 'i0i'=>'i0i', 's0s'=>'505', 'z0z'=>'202', 'iii'=>'111');
  $txt[] = array('200'=>'z00', '020'=>'0z0', '002'=>'00z', '500'=>'s00', '050'=>'0s0', '005'=>'00s', '101'=>'i0i', '505'=>'s0s', '202'=>'z0z', '111'=>'iii');
  #noise
  $txt[] = array('lol'=>'lot','mouss'=>'mouse','com'=>'cow','tig3r'=>'tiger','snow'=>'mouse','cet'=>'cat','mous3'=>'mouse','cot'=>'cat','bor'=>'dog','bor'=>'dog');
  $txt[] = array('monk'=>'monkey','mous3e'=>'mouse','bleph@nt'=>'elephant','seved'=>'seven','ent'=>'ant','10'=>'fen','ten'=>'fen','tion'=>'lion','monk3y'=>'monkey','m0nkey'=>'monkey');
  $txt[] = array('3lephenta'=>'elephant','esnow'=>'mouse','nt'=>'ant','c@t'=>'caf','c0t'=>'cat','111'=>'|||','|||'=>'111','tlg3r'=>'tiger','jet'=>'cat','tigar'=>'tiger');
  $txt[] = array('tig@r'=>'tiger','tlg@r'=>'tiger','mqus3'=>'mouse','don'=>'lion','moo'=>'cow','tan'=>'ten','t@n'=>'ten','ton'=>'ten','tg3r'=>'tiger','tgar'=>'tiger');
  $txt[] = array('fig³r'=>'tiger','tig³r'=>'tiger','tg³r'=>'tiger','tlg³r'=>'tiger','t!g³r'=>'tiger','ssnom'=>'mouse','l¹on'=>'lion','t¹on'=>'lion','mous³'=>'mouse','m0us³','m⁰use'=>'mouse');
  $txt[] = array('3fephent'=>'elephant','3feph@nt'=>'elephant','3faphent'=>'elephant','3fephant'=>'elephant','3f@ph@nt'=>'elephant','3!ephent'=>'elephant','e!eph@nt'=>'elephant','3lephenf'=>'elephant','eleph@nt'=>'elephant','sieph@nt'=>'elephant');
  $txt[] = array('101'=>'lot','3lephant'=>'elephant','110n'=>'lion','3lephent'=>'elephant','cou'=>'cow','cov'=>'cow','tg³r4'=>'tiger','ent14'=>'ant','jxc'=>'fox','monksy'=>'monkey');
  $txt[] = array('110n'=>'tion','cet4'=>'cat','3teph@nt'=>'elephant','eteph@nt'=>'elephant','etephant'=>'elephant','3tephant'=>'elephant','1g3r'=>'tiger','monk3'=>'monkey','monk3'=>'-monkey','hon'=>'lion');
  $txt[] = array('700'=>'200','007'=>'002','070'=>'020','900'=>'500','009'=>'005','090'=>'050','005'=>'០០s','505'=>'sus','blephant'=>'elephant');
  $txt[] = array('one'=>'-one', 'two'=>'-two', 'three'=>'-three', 'four'=>'-four', 'five'=>'-five', 'six'=>'-six', 'seven'=>'-seven', 'eight'=>'-eight', 'nine'=>'-nine', 'ten'=>'-ten');
  $txt[] = array('3leph@nt'=>'elephant','31ephant'=>'elephant','coww'=>'cow','cⓐt'=>'cat','bat'=>'cat','cor'=>'cow','voil'=>'lion','008'=>'005','800'=>'500','080'=>'050');
  for($u = 0;$u<count($txt);$u++){
    for($b = 0;$b<count($text_res);$b++){
      if(explode(",",$text_main[0])[$b] == $txt[$u][$text_res[0]]){
        $text_re[0] = $txt[$u][$text_res[0]];
            break;
      }
    }
  }
  if(!$text_re[0]){
    $text_re[0] = $text_res[0];
  }
  for($u = 0;$u<count($txt);$u++){
    for($b = 0;$b<count($text_res);$b++){
      if(explode(",",$text_main[0])[$b] == $txt[$u][$text_res[1]]){
        $text_re[1] = $txt[$u][$text_res[1]];
        break;
      }
    }
  }
  if(!$text_re[1]){
    $text_re[1] = $text_res[1];
  }
  for($u = 0;$u<count($txt);$u++){
    for($b = 0;$b<count($text_res);$b++){
      if(explode(",",$text_main[0])[$b] == $txt[$u][$text_res[2]]){
        $text_re[2] = $txt[$u][$text_res[2]];
        break;
      }
    }
  }
  if(!$text_re[2]){
    $text_re[2] = $text_res[2];
  }
  $alt = explode(",",$text_main[0]);
  $main = str_replace(",","",$text_main[0]);
  $res = [$text_re[0],$text_re[1],$text_re[2]];
  $rel = [$text_rel[0],$text_rel[1],$text_rel[2]];
  $input = [
  $res[0].$res[1].$res[2],
  $res[0].$res[2].$res[1],
  $res[1].$res[2].$res[0],
  $res[1].$res[0].$res[2],
  $res[2].$res[0].$res[1],
  $res[2].$res[1].$res[0]
  ];
  $input1 = [
    $res[0].$res[1],
    $res[0].$res[2],
    $res[1].$res[2],
    $res[1].$res[0],
    $res[2].$res[0],
    $res[2].$res[1]
    ];
    $input2 = [
      $res[1].$res[2],
      $res[2].$res[1],
      $res[2].$res[0],
      $res[0].$res[2],
      $res[0].$res[1],
      $res[1].$res[0]
      ];
      $input3 = [
        $res[0].$res[2],
        $res[0].$res[1],
        $res[1].$res[0],
        $res[1].$res[2],
        $res[2].$res[1],
        $res[2].$res[0]
        ];
        $output = [
          " ".$rel[0]." ".$rel[1]." ".$rel[2],
          " ".$rel[0]." ".$rel[2]." ".$rel[1],
          " ".$rel[1]." ".$rel[2]." ".$rel[0],
          " ".$rel[1]." ".$rel[0]." ".$rel[2],
          " ".$rel[2]." ".$rel[0]." ".$rel[1],
          " ".$rel[2]." ".$rel[1]." ".$rel[0]
          ];
          for($i = 0;$i<count($input);$i++){
            if(!$input1[$i] || !$input2[$i] || !$input3[$i]){
              print k."refresh antibot captcha!";
              r();
              break;
            }
            if($input[$i] == $main){
              return $output[$i];
            }
            if($input1[$i] == $alt[0].$alt[1]){
              return $output[$i];
            }
            if($input2[$i] == $alt[1].$alt[2]){
              return $output[$i];
            }
            if($input3[$i] == $alt[0].$alt[2]){
              return $output[$i];
            }
          }
}

function arr_api(){
$package = [
//"",
"",
"",
"kr.infozone.documentrecognition_en",
"com.inverseai.image_to_text_OCR_scanner",
"aculix.smart.text.recognizer",
"image.to.text.ocr"
];
$cert = [
//"",
"",
"",
"00a56ee22492473e1b57670fa9c44185817e5586",
"FDC669CB376A69B6D6065B8CCE8C188ADDDC4F3E",
"70E6AB2300C9406792452EA39A40690B91519C85",
"FDC669CB376A69B6D6065B8CCE8C188ADDDC4F3E"
];

$api = [
//"AIzaSyAfci4iiOtZc_ORMF2gXlQcG-0Uu2k2mgE",
"AIzaSyDSfHPltpIGd0etqy9CnVdIQGReCIrE35k",
"AIzaSyAwmW3dg4fP99_hGS6QzXb7jKwwnOcBtsE",
"AIzaSyDm5IoUGFaQLpFXqoMvB9i20xc62J0taVA",
"AIzaSyDqfshA40_b5IpjtZEuGJ8oUlRMnY4Ynk4",
"AIzaSyCt2nW_3i-RBp4kLM-9T0CzcbYQlHbJGek",
"AIzaSyA5MInkpSbdSbmozCQSuBY3pylSTgmLlaM"
];

for($i=0;$i<count($cert);$i++) {
$h[] = ["Accept-Encoding: gzip",
      "User-Agent: Dalvik/2.1.0 (Linux; U; Android 13; M2012K11AG Build/TQ3A.230901.001)",
      "x-android-package: ".$package[$i],
      "x-android-cert: ".$cert[$i],
      "Content-Type: application/json; charset=UTF-8",
      "Host: vision.googleapis.com",
      "Connection: Keep-Alive"];
}

$array = [
["api" => $api[0],"header" => $h[0]],
["api" => $api[1],"header" => $h[1]],
["api" => $api[2],"header" => $h[2]],
["api" => $api[3],"header" => $h[3]],
["api" => $api[4],"header" => $h[4]],
//["api" => $api[5],"header" => $h[5]]
];
return arr_rand($array);
}

function googleapis($img, $type=0){
  $arr_api = arr_api();
  for($i = 0;$i<count($img);$i++){
    ob_start();
    $base64_string = base64_decode($img[$i]);
    $image = imagecreatefromstring($base64_string);
    imagefilter($image, IMG_FILTER_SMOOTH, 1);
    imagefilter($image,IMG_FILTER_NEGATE);
    imagefilter($image, IMG_FILTER_GRAYSCALE);
    imagecropauto($image , IMG_CROP_DEFAULT);
    imagepng($image);
    imagedestroy($image);
    $data = ob_get_contents();
    ob_end_clean();
    $imgg[] = $data;
    $data = json_encode(["requests"=>[["features"=>[["maxResults"=> 1,"type" => "DOCUMENT_TEXT_DETECTION"]],"image" => ["content" => base64_encode($imgg[$i])]]]]);
    ulang:
      $r = curl("https://vision.googleapis.com/v1/images:annotate?key=".$arr_api[$i]["api"],$arr_api[$i]["header"],$data)[1];
      if(preg_match("#(error|quota_limit_value|RESOURCE_EXHAUSTED)#is",$r)){print_r($r);die($arr_api[$i]["api"]);
        print p."Please wait, there is a limit!";
        r();
        goto ulang;
      }
      if($type == "normal"){
        return strip_tags(transliterator_transliterate('Any-Latin;Latin-ASCII;',str_replace([n,"﻿"],"",json_decode($r)->responses[0]->textAnnotations[0]->description)));
      }
      $convert = strtolower(str_replace([",,,,,,",",,,,,",",,,,",",,,",",,"],",",str_replace([" ",":","&",":","$","★","{","}","(",")","·",";","°","¯","`",".","ʾ","✔","#","_","܀","ʿ","܆","'"],",",rtrim(ltrim(strip_tags(transliterator_transliterate('Any-Latin;Latin-ASCII;',str_replace([n,"﻿"],"",json_decode($r)->responses[0]->textAnnotations[0]->description))))))));
      if($i == 0){
        $text1 = $convert;
      } else {
        $text[] = str_replace(",","",$convert);
      }
  }
  return [$text1,$text];
}




function mtk($a,$b,$c){
  if($b=="+"){
    return $a+$c;
  } elseif($b=="-"){
    return $a-$c;
  } elseif($b=="*"){
    return $a*$c;
  } elseif($b=="/"){
    return $a/$c;
  } else {
    return "error";
  }
}


        
function antb($ab){
    $a = $ab[1][0];
    $b = $ab[1][1];
    $c = $ab[1][2];
    return [
        [" ".$b,$c,$a],
        [" ".$a,$b,$c],
        [" ".$a,$c,$b],
        [" ".$b,$a,$c],
        [" ".$c,$b,$a],
        [" ".$c,$a,$b]
    ];
}

rt();
c();
const b = "\033[1;34m",
      c = "\033[1;36m",
      h = "\033[1;32m",
      k = "\033[1;33m",
      m = "\033[1;31m",
      mp = "\033[101m\033[1;37m",
      p = "\033[1;37m",
      u = "\033[1;35m",
      d = "\033[0m",
      n = "\n";
