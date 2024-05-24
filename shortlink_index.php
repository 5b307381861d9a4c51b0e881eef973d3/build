<?php
#ndie(print_r(curl("https://api.whatismybrowser.com/api/v2/software_version_numbers/all")));

#https://nx.chainfo.xyz/u9Mke
#https://urlcorner.com/CBqzuo1tu69
#https://cutp.in/TnqH
#eval(str_replace('<?php',"",file_get_contents(("build_index.php"))));

#die(print_r(build("https://claim.cryptolink.click/kHweca")));
//die(print_r(curl("https://ipinfo.io/widget/")));
#die(print_r(curl("https://proxycheck.io/v2/103.49.202.252?proxy=1&asn=1")));

/*
$proxy = flashproxy();
$ua = ["user-agent: ".getUserAgent()];
$r = curl("https://www.highcpmgate.com/e8azyvy6km?key=a8d63089811fe782a3b9fca9a41b17f7", $ua, 0, "https://www.highcpmgate.com/", 0, 0, $proxy);
$cookie[] = $r["cookie"];

$r = curl("https://www.highcpmgate.com/api/users?token=".explode('"', explode('name="token" value="', $r[1])[1])[0]."&uuid=&pii=&in=false", $ua, 0, "https://www.highcpmgate.com/", $cookie, 0, $proxy);
$cookie[] = $r["cookie"];
#die(print_r($r));
$url1 = $r[0][1]["redirect_url"] ? $r[0][1]["redirect_url"] : ( $r[0][1]["url"] ? $r[0][1]["url"] : "");

$r = curl($url1, $ua, 0, "https://www.highcpmgate.com/", $cookie, 0, $proxy);
$cookie[] = $r["cookie"];

$url2 = $r[0][1]["redirect_url"] ? $r[0][1]["redirect_url"] : ( $r[0][1]["url"] ? $r[0][1]["url"] : "");

$r = curl($url2, $ua, 0, $url1, $cookie, 0, $proxy);
$cookie[] = $r["cookie"];


$url3 = $r[0][1]["redirect_url"] ? $r[0][1]["redirect_url"] : ( $r[0][1]["url"] ? $r[0][1]["url"] : "");

$r = curl($url3, $ua, 0, $url2, $cookie, 0, $proxy);
$cookie[] = $r["cookie"];
$url4 = $r[0][1]["redirect_url"] ? $r[0][1]["redirect_url"] : ( $r[0][1]["url"] ? $r[0][1]["url"] : "");

$r = curl($url4, $ua, 0, $url3, $cookie, 0, $proxy);
$cookie[] = $r["cookie"];



die(print_r($r));
*/

$userAgentArray = getUserAgent();
function build($url = 0) {
    if (preg_match("#(clk.st|clks.pro)#is", $url)) {
        $inc = "/clkclk.";
    } else {
        $inc = "/flyinc.";
    }
    $r = parse_url($url);
    
    return [
        "client_id" => az_num(8) . "-" . az_num(4) . "-" . az_num(4) . "-" . az_num(4) . "-" . az_num(16),
        "links" => "https://" . $r["host"] . $r["path"],
        "inc" => "https://" . $r["host"] . $inc . $r["path"],
        "go" => [
            "https://" . $r["host"] . "/links/go",
            "https://" . $r["host"] . "/go" . $r["path"],
            "https://" . $r["host"] . "/" . explode("/", $r["path"])[1] . "/links/go",
            "https://go/" . $r["host"] . $r["path"],
            "https://" . $r["host"] . "/xreallcygo" . $r["path"]
        ]
    ];
}



function visit_short($r, $site_url = 0, $data_token = 0) {
    $time = time() + 100;
    $file_name = "control";
    $control = file($file_name);

    if (!$control[0]) {
        $control = ["tolol"];
    }

    $config = arr_rand(config());
    $name = $r["name"];
    $lefts = $r["left"];
    $visit = $r["visit"];
    
    if (!$name[0] || !$lefts[0]) {
        print p . "terjadi kesalahan tidak terdeteksi nama shortlinks";
        sleep(2);
        r();
        return "refresh";
    }

    $count = count($config) + count($name);

    for ($i = 0; $i < $count; $i++) {
        for ($s = 0; $s < $count; $s++) {
            $open = multiexplode(["?", "_", "{", "[", "(", "-desktop", "-easy", "-mid", "-hard", "vip"], str_replace("-[", "[", trimed(strtolower($name[$s]))))[0];
            #die(print_r($open));
            #print $open.n;
            if (strtolower($config[$i]) == $open) {
                for ($p = 0; $p < $count; $p++) {
                    
                    if (strtolower(str_replace(n, "", $control[$p])) == host.$open or strtolower(str_replace(n, "", $control[$p])) == $open or explode("/", $lefts[$s])[0] == "0" or $lefts[$s] == "0" or strpos($lefts[$s], "-") !== false) {
                        goto up;
                    }

                    if (preg_match("#(•)#is", $lefts[$s])) {
                        if (explode("•", $r["left"][$s])[0] == explode("•", $r["left"][$s])[1]) {
                            goto up;
                        }
                    }
                }
                
                if (preg_replace("/[^0-9]/", "", $r["visit"][$s])) {
                    if (mode == "af") {
                        $r1 = base_run(host.$r["visit"][$s], http_build_query([$r["token"][1][$s] => $r["token"][2][$s]]));
                    } elseif (mode == "icon") {
                        $cap = icon_bits();

                        if (!$cap) {
                            return "refresh";
                        }

                        $data2 = http_build_query([
                            "a" => "getShortlink",
                            "data" => preg_replace("/[^0-9]/", "", $r["visit"][$s]),
                            "token" => $r["token"],
                            "captcha-idhf" => 0,
                            "captcha-hf" => $cap
                        ]);

                        $r1 = base_run(host."system/ajax.php", $data2);

                        if ($r1["json"]->shortlink) {
                            $r1["url"] = $r1["json"]->shortlink;
                        }
                    } elseif (mode == "earnbitmoon") {
                        $cap = captcha_bitmoon();

                        if (!$cap) {
                            return "refresh";
                        }

                        $data2 = http_build_query([
                            "a" => "getShortlink",
                            "data" => preg_replace("/[^0-9]/", "", $r["visit"][$s]),
                            "token" => $r["token"],
                            "ic-hf-id" => 1,
                            "ic-hf-se" => $cap,
                            "ic-hf-hp" => ""
                        ]);

                        $r1 = base_run(host."system/ajax.php", $data2);

                        if ($r1["json"]->shortlink) {
                            $r1["url"] = $r1["json"]->shortlink;
                        }
                    } elseif (mode == "no_icon") {
                        $data = http_build_query([
                            "a" => "getShortlink",
                            "data" => preg_replace("/[^0-9]/", "", $r["visit"][$s]),
                            "token" => $r["token"]
                        ]);

                        $res = base_run(host."system/ajax.php", $data)["json"];

                        if ($res->shortlink) {
                            $r1["url"] = $res->shortlink;
                            goto run;
                        }
                    } elseif (mode == "vie_free") {
                        if (preg_match("#pre_verify#is", $r["visit"][$s])) {
                            $left = $r["left"][$s];
                            $vv = str_replace("pre_verify", "go", $r["visit"][$s]);
                            $r = base_run($r["visit"][$s]);
                            #die(print_r($r));
                            $cap = multi_atb($r["res"]);

                            if (!$cap) {
                                return "refresh";
                            }

                            $rsp = ["antibotlinks" => $cap];
                            $r["visit"][$s] = $vv;
                            $r["left"][$s] = $left;
                        }

                        if ($r["token_csrf"][1][0]) {
                            $data = data_post($r["token_csrf"], "one", $rsp);
                        }

                        if ($site_url == 1 || preg_match("#(free-ltc-info)#is", $r["visit"][$s])) {
                            $r1 = base_run(str_replace("go", "cancel", $r["visit"][$s]), $data);
                            
                            if (preg_match("#(free-ltc-info)#is", $r["visit"][$s])) {
                                preg_match_all('#location: (.*)#i', $r1["r"], $res);
                                if ($res[1][1]) {
                                    $r1["url1"] = trimed($res[1][1]);
                                }
                            }
#die(print_r($r1));
#preg_match_all('#location: (.*)#i', $r1["r"], $res);die(print_r($res));
                            if (preg_match("#".host."#is", $r1["url1"])) {
                                preg_match_all('#location: (.*)#i', $r1["r"], $res);
#die(print_r($res));
                                if ($res[1][1]) {
                                    $r1["url1"] = trimed($res[1][1]);
                                }
                            }
                        } else {
                            $r1 = base_run($r["visit"][$s], $data);
                        }
#die(print_r($r1));
                        if ($r1["url1"]) {
                            $r1["url"] = $r1["url1"];
                        }
                        if (preg_match("#".$r1["url1"]."#is", host)) {
                          $r1["url1"] = "";
                        }
                    } elseif (mode == "only_site") {
                        $r1 = base_run($site_url.$r["visit"][$s]);

                        if ($r1["url1"]) {
                            $r1["url"] = $r1["url1"];
                        }
                    } elseif (mode == "site_url") {
                        if ($data_token) {
                            $data_token = $data_token.$r["visit"][$s];
                        }

                        $r1 = base_run($site_url, $data_token);
                    } elseif (mode == "path") {
                        $r1 = base_run(host.$r["visit"][$s]);
                    } elseif (mode == "firefaucet") {
                        $data = $r[$name[$s]];
                        for ($rq = 0; $rq < count($data[1]); $rq++) {
                            if ($data[0][$rq]) {
                                $rrq = "$rq";
                            }
                        }
                        $raw = explode("&&", "&".$data[2][$rrq])[1];
                        parse_str($raw, $out);

                        for ($tq = 0; $tq < count($r["code"]); $tq++) {
                            if ($out[$r["code"][$tq]]) {
                                $data_post =  str_replace($out[$r["code"][$tq]], $r[$r["code"][$tq]], $raw);
                            }
                        }

                        $r1 = base_run(host.$data[1][$rrq]."/", $data_post);
                    } elseif (mode == "ofer") {
                        $data = http_build_query(array_merge([
                            "action" => "getShortlink",
                            "data" => $r["visit"][$s],
                        ], $data_token));

                        $r1 = base_offer($site_url, $data, 1);
                        $data = http_build_query(["action" => "redirect"]);

                        if (!$r1["json"]->link) {
                            return "refresh";
                        }

                     #  print_r($r1);
                        $r1 = base_offer($r1["json"]->link, $data, 1);
                        if ($r1["json"]->link) {
                            $r1["url"] = $r1["json"]->link;
                        }
                    
                    } elseif (mode == "dutchy") {
                        #file_put_contents("instan.html",$r["res"]);
                        $data = dutchy($r["res"], $r["visit"][$s]);
                        
                        $r1 = base_run(host.$data);#, "icon=".$data[1][$s]);
                        /*print_r($r1);
                        print_r($data[0]);
                        print $r["name"][$s].n;
                        die(print("icon=".$data[1][$s]));
                        die();*/
                        #print_r($r1);
                    } else {
                        die(m."mode bypass not found".n);
                    }

                    if ($r1["failed"]) {
                        if (!file_get_contents($file_name)) {
                            file_put_contents($file_name, host.$open);
                        } else {
                            file_put_contents($file_name, get_e($file_name).n.host.$open);
                        }

                        print m.$r1["failed"]." ".p.$name[$s];
                        r();
                        return "refresh";
                    }

                    run:
                    if (!parse_url($r1["url"])["scheme"]) {
                        print m."Failed to generate this link ".p.$name[$s];
                        r();
                        return "refresh";
                    }

                    ket_line("", ltrim(rtrim($name[$s])), "left", trimed($r["left"][$s]));
                    ket("", k.$r1["url"]).line();
                    
                    if (preg_match("#earnow.online#is", $r1["url"])) {
                        $xxnx = 1;
                    } elseif (preg_match("#rsshort.com#is", $r1["url"])) {
                        $xxnx = 7;
                    } else {
                        $xxnx = 5;
                    }
                    $seconds = 90;

                    for ($h = 0; $h < $xxnx; $h++) {
                        $r2 = bypass_shortlinks($r1["url"]);

                        if (preg_match("#(http)#is", $r2)) {
                            $timer = $time - time();
                            
                            if ($timer >= 1) {
                                L($timer);
                            }
                            return $r2;
                        }
                    
                        print m . "shortlinks gagal di bypass sedang mengulangi!";
                        sleep(3);
                        r();
                    }
                    
                    if (preg_match("#(refresh|skip)#is", $r2)) {
                        print p.$r2;
                        r();
                        return $r2;
                    }
                    return "refresh";
                }
            }
        }

        up:
    }
}







function h_short($xml = 0, $referer = 0, $agent =0, $boundary = 0){
    global $userAgentArray;
    if ($xml){
      $headers[] = 'Accept: */*';
    } else {
      $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v = b3;q=0.7';
    }
    if ($boundary){
      $headers[] = "content-type: multipart/form-data; boundary=----WebKitFormBoundary".$boundary;
    }
    if ($xml){
      $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
    }
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    //$headers[] = 'Proxy-Connection: close';
    ///$headers[] = 'CF-Connecting-IP: 127.0.0.1, 68.180.194.242';
    if ($agent){
    #$agent = ' (compatible; Google-Youtube-Links)';
    $agent = ' (compatible; Googlebot/2.1; +https://www.google.com/bot.html)';
    } else {
    //$user_agent = user_agent();
    //$user_agent = "Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/124.0.6367.82 Mobile Safari/537.36";
    $user_agent = $userAgentArray;
    }
    $headers[] = 'User-agent: '.$user_agent.$agent;
    if ($xml){
        $headers[] = 'X-Requested-With: XMLHttpRequest';
    }
    if ($referer){
        $headers[] = 'referer: '.$referer;
    }
    return $headers;
}





function base_short($url, $xml=0, $data=0, $referer=0, $agent=0, $alternativ_cookie=0, $boundary=0, $proxy=0) {
    $userAgentArray = getUserAgent();
    start:
    $r = curl($url,h_short($xml, $referer, $agent, $boundary), $data,false,false, $alternativ_cookie, $proxy);

    preg_match('#(reCAPTCHA_site_key":"|data-sitekey=")(.*?)(")#is', $r[1], $recaptchav2);
    preg_match('#(invisible_reCAPTCHA_site_key":")(.*?)(")#is', $r[1], $invisible_recaptchav2);
    preg_match('#(h-captcha is-hidden" data-callback="onCaptchaPass" data-sitekey="|hcaptcha_checkbox_site_key":"|h-captcha" data-sitekey="|get_cap_data" data-site_key=")(.*?)(")#is', $r[1], $hcaptcha);
    preg_match('#(render=|g-recaptcha btn btn-warning" data-sitekey=")(.*?)(")#is', $r[1], $recaptchav3);
    preg_match('#window.location.replace[(]"(.*?)"#is', $r[1], $url0);
    preg_match_all('#(window.location.replace[(]"|submit_data" action="|<a href="|action="|href = ")(.*?)(")#is', $r[1], $url1);
    preg_match_all("#(url='|location.href ='|<a href='|var api =".n."  ')(.*?)(')#is", $r[1], $url2);
    preg_match_all("#window.open(.*?)'(.*?)'#is", $r[1], $url3);
    preg_match('#share(.*?)url=(.*?)"#is', $r[1], $url4);
    preg_match('#pingback" href="(.*?)"#is', $r[1], $url9);
    preg_match('#</noscript><title>(.*?)<#is', $r[1], $url5);
    preg_match('#url=(.*?)"#is', $r[1], $url6);
    preg_match('#var url="(.*?)"#is', $r[1], $url7);
    preg_match('#noreferrer"href="(.*?)"#is', $r[1], $url8);
    preg_match_all('#hidden" name="(.*?)" value="(.*?)"#is', $r[1], $token_csrf);
    preg_match_all('#(t|") name="(.*?)" type="hidden" value="(.*?)"#is', $r[1], $token_csrf2);
    preg_match_all('#hidden" id="(.*?)" value="(.*?)"#is', $r[1], $token_csrf3);
    preg_match_all('#<input type="text" name="(.*?)" placeholder="(.*?)"#is', $r[1], $token_csrf4);
    preg_match_all('#el.name = "(.*?)"#is', $r[1], $token_csrf5);
    preg_match('#(id="second">|varcountdownValue=|PleaseWait|class="timer"value="|class="timer">)([0-9]{1}|[0-9]{2})(;|"|<|s)#is', str_replace([n," "],"", $r[1]), $timer);
    preg_match_all('#(dirrectSiteCode = |ai_data_id=|ai_ajax_url=)"(.*?)(")#is', $r[1], $code_data_ajax);
    preg_match('#(sessionId: ")(.*?)(")#is', $r[1], $sessionId);
    preg_match('#class="custom-heading">(.*?)<#is', $r[1], $only);//die(print_r($r[0]));
    preg_match('#var pdata = "(.*?)"#is', $r[1], $ads);//die(print_r($r[0]));
    preg_match("#zunsoach.com',(.*?),#is", $r[1], $ads2);
   // print_r(set_cookie($r[0][2], 1));
    return [
        "status" => $r[0][1]["http_code"],
        "cookie" => set_cookie($r[0][2], 1),
        "data" => set_cookie($r[0][2], 1),
        "res" => $r[1],
        "hcaptcha" => $hcaptcha[2],
        "recaptchav2" => $recaptchav2[2],
        "recaptchav3" => $recaptchav3[2],
        "invisible_recaptchav2" => $invisible_recaptchav2[2],
        "token_csrf" => $token_csrf,
        "token_csrf2" => $token_csrf2,
        "token_csrf3" => $token_csrf3,
        "token_csrf4" => $token_csrf4,
        "token_csrf5" => $token_csrf5,
        "timer" => $timer[2],
        "json" => json_decode($r[1]),
        "url" => $r[0][1]["redirect_url"],
        "url0" => $url0[1],
        "url1" => $url1[2],
        "url2" => $url2[2],
        "url3" => $url3[2],
        "url4" => $url4[2],
        "url5" => $url5[1],
        "url6" => $url6[1],
        "url7" => $url7[1],
        "url8" => $url8[1],
        "url9" => $url9[1],
        "code_data_ajax" => $code_data_ajax[2],
        "sessionId" => $sessionId[2],
        "only" => $only[1],
        "ads" => $ads[1],
        "ads2" => $ads2[1]
    ];
}

function executeNode($r, $stripslashes = 0) {
    if (preg_match_all('#<script>(.*?)</script>#is', $r, $out)) {
        #die(print_r($out[1]));
        for ($i = 0; $i < count($out[1]); $i++) {
            if (preg_match('#0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#is', $out[1][$i], $script)) {
                $input = str_replace("eval", "console.log", rtrim(ltrim($out[1][$i])));
                $output = exec("node -e '$input' 2>&1");
                if ($output) {
                    $res[] = $output;
                    continue;
                    #break;
                    #exit;
                }
            }
        }
        if ($res[0]) {
            $html = html_entity_decode(str_replace($out[0], $res, $r));
            if ($stripslashes) {
                $x = stripslashes($html);
            } else {
                $x = $html;
            }
            preg_match_all('#hidden" name="(.*?)" value="(.*?)"#is', $x, $token);
            #preg_match_all('#<input type="hidden" id="(.*?)" name="(.*?)"#is', $x, $id);
            preg_match_all('#document.getElementById[(]"in(.*?)"[)].value = "(.*?)";#is', $x, $id);
            preg_match_all('#<div wire:snapshot="(.*?)" wire:#is', $x, $snapshot);
            preg_match('#userToken":"(.*?)"#is', $x, $user_token);
            preg_match('#data-csrf="(.*?)"#is', $x, $csrf);
            preg_match("#location.replace[(]'(.*?)'#is", $x, $url);
            preg_match('#p (\d+/\d+)#is', $x, $step);
            preg_match("#countDown = (\d+)#is", $x, $tmr);
            if ($step[1]) {
                if (explode("/", $step[1])[0] == explode("/", $step[1])[1]) {
                    $final = 1;
                }
            }
            if ($token[1][1]) {
                $fix = [
                    array_values(array_unique($token[0])),
                    array_values(array_unique($token[1])), 
                    array_values(array_unique($token[2]))
                    
                ];
                if ($id) {
                  $fix = [
                      array_merge(array_values(array_unique($token[0])), $id[0]),
                      array_merge(array_values(array_unique($token[1])), $id[1]),
                      array_merge(array_values(array_unique($token[2])), $id[2])
                  ];
                }
                
            }
            return [
                "res" => $x,
                "token_csrf" => $fix,
                "url" => $url[1],
                "step" => $step[1],
                "final_step" => $final,
                "snapshot" => $snapshot[1],
                "user_token" => $user_token[1],
                "csrf" => $csrf[1],
                "timer" => $tmr[1]
            ];
        }
    }
}

function bypass_shortlinks($url, $separator = 0) {
    global $only_sl, $request_proxy, $method_proxy, $redirect_url;
    $url = str_replace("http:", "https:", $url);
    $coundown = 15;
    $seconds = 90;
    $host = parse_url($url)["host"];
    $query = parse_url($url);
    
    if (explode("=", $query["query"])[0] == "api") {
        $query = explode("=", $query["query"])[2];
        
        if (strpos($query, "http") === false) {
            $url = "https://".$query;
        }
        $host = parse_url($url)["host"];
    }
    #die(print($url));
    if (explode("p=", $url)[1]) {
        $url = "https://ser7.crazyblog.in".explode("p=", $url)[1];
        $host = parse_url($url)["host"];
    }
    if (preg_match("#(489651.xyz|546512.xyz|go.shtfly.com|121989.xyz|131989.xyz|141989.xyz|link.eazyurl.xyz|go.cutlink.xyz|151989.xyz|120898.xyz|bitcosite.com|161989.xyz|845265.xyz|viefaucet.link|link.adlink.click|linksfly.link|chainfo.xyz|ctr.sh|easycut.io|revcut.net|crypto-radio.eu|todaynewsview.store|shrinkme.link|faho.us|urlcut.pro|ez4short.com|bitad.org|cutlink.xyz|bitss.sbs|inlinks.online|shortino.link|sharecut.io|droplink.co|adbitfly.com|earnify.pro|btcut.io|slfly.net|info.linkzfly.xyz|_linkzfly.xyz|cfshort.xyz|flukesnips.com|freebonk.paycut.io|nx.chainfo.xyz|coinfays.com|paycut.io|linkmay.me|shrinkmy.site|www.linkswift.click|shortano.link|shortify.online|owllink.net|birdurls.com|illink.net|cutsme.xyz|kotenkoshort.xyz|kyshort.xyz|zshort.io|exashorts.fun|clk.asia|insfly.pw|clik.pw|swiftlnx.com|adcorto.com|short2money.com|bestlink.pro|shorti.io|shortplus.xyz|usalink.io|linksly.co|ex-foary.com|short2url.in|f.technicalatg.in|atglinks.com|ziplinker.net|tii.la|lnbz.la|exalink.fun|hatelink.me|wdu.info|addurl.biz|tinygo.co|viewfr.com|wez.info|24payu.top|freeltc.top|linkpays.in|link.urlfly.xyz|shrinkme.cc".$request_proxy.")#is", $host)) {
      
        if (preg_match("#(489651.xyz|546512.xyz|go.shtfly.com|121989.xyz|131989.xyz|141989.xyz|link.eazyurl.xyz|go.cutlink.xyz|151989.xyz|120898.xyz|bitcosite.com|161989.xyz|845265.xyz|viefaucet.link|linksfly.link|chainfo.xyz|revcut.net|crypto-radio.eu|todaynewsview.store|shrinkme.link|faho.us|urlcut.pro|ez4short.com|bitad.org|cutlink.xyz|bitss.sbs|inlinks.online|shortino.link|droplink.co|adbitfly.com|earnify.pro|slfly.net|info.linkzfly.xyz|_linkzfly.xyz|cfshort.xyz|flukesnips.com|freebonk.paycut.io|nx.chainfo.xyz|coinfays.com|linkmay.me|shrinkmy.site|www.linkswift.click|shortano.link|shortify.online|owllink.net|birdurls.com|illink.net|cutsme.xyz|kotenkoshort.xyz|kyshort.xyz|zshort.io|exashorts.fun|bestlink.pro|shortplus.xyz|short2url.in|exalink.fun|hatelink.me|wdu.info|addurl.biz|tinygo.co|viewfr.com|wez.info|24payu.top|freeltc.top|linkpays.in|link.urlfly.xyz|za.gl)#is", $host)) {
            $id = "id";
        }
        if ($method_proxy == "proxyscrape" || $method_proxy == "flashproxy") {
            $proxy = mode_proxy($id);
            #die($proxy);
            
            /*if ("chainfo.xyz" == $host) {
                $proxyv = $proxy;
                $proxy = 0;
            }*/
        }
    }
    
    $expired = 0;
    ulang:
    $exp = 0;
    $expired++;
    if (preg_match("#(luckydice.net|kalimbanote.com|cryptoflare.cc|myhealths.icu|clk.st|urlsfly.me|wefly.me|shortsfly.me|linksfly.me|clicksfly.me|3link.co)#is", $host)) {
        $run = build($url);
        $time = time() + $seconds;
        
        if (preg_match("#(3link.co)#is", $host)) {
            $r = base_short("https://3link.co/links/gosl/?".str_replace("/", "alias=", parse_url($url)["path"]))["json"];
            
            if (strpos($r->url, "http") !== false) {
                $run = build($r->url);
            }
            
        }
        $r = base_short($url); #print_r($r);
        $link = $r["url"];
        
        if (preg_match("#(clk.st)#is", $host)) {
            $referer = $link;
        } elseif (preg_match("#(luckydice.net|kalimbanote.com|cryptoflare.cc|myhealths.icu)#is", $host)) {
            $url = str_replace("luckydice.net", "urlhives.com", str_replace("kalimbanote.com", "linkhives.com", str_replace("cryptoflare.cc", "linkhives.com", str_replace("myhealths.icu", "urlhives.com", $url))));
            $run = str_replace(["clkclk./", "flyinc./"],"",build($url));
            $referer = "https://mcrypto.club/";
          
        } else {
            $referer = "wss://advertisingexcel.com";
        }
        $r1 = base_short($run["inc"], 0, 0, $referer, 1)["url"];
        
        if (preg_match("#(".$host.")#is", $r1)) {
            return "refresh";
        }
        
        if ($r1) {
            print h."success";
            r();
            $timer = $time - time();
            if ($timer >= 1) {
                L($timer);
            }
            return $r1;
        }
    } elseif (preg_match("#(link1s.com|link1s.net|insfly.pw|links.earnify.pro|shrinke.us|adrev.link|linksly.co|_owllink.net|go.birdurls.com|link.birdurls.com|go.owllink.net|link.owllink.net|mitly.us|go.illink.ne|link.illink.net|coinpayz.link|oko.sh|go.mtraffics.com|go.megaurl.in|go.megafly.in|clik.pw|usalink.io|link.usalink.io|go.hatelink.me|link.shrinkme.link|go.shorti.io|shorti.io|sheralinks.com|linksfly.link|link.adlink.click|url.beycoin.xyz|cryptosh.pro|aii.sh|link.vielink.top|bestlink.pro|ccurl.net|1shorten.com|adbull.me|ser7.crazyblog.in|ex-foary.com|short.dash-free.com|shrinkme.info|shrinkme.site|shortplus.xyz|atglinks.com|link.short2url.in|link.revly.click|go.tinygo.co|m.tinygo.co|hbz.us|s3.addurl.biz|go.wez.info|m.wez.info|s2.addurl.biz|go.viewfr.com|m.viewfr.com|s1.addurl.biz|cashlinko.com|linkjust.com|dz4link.com|panylink.com|panyshort.link|oscut.space|oscut.fun|_kyshort.xyz|121989.xyz|go.urlcut.pro|131989.xyz|go.faho.us|141989.xyz|go.eazyurl.xyz|link.eazyurl.xyz|clockads.in|go.shtfly.com|go.bitss.sbs|489651.xyz|546512.xyz|dailytime.store|go.foxylinks.site|m.pkr.pw|linkjust.com|adshort.co|lollty.com|10short.com|short2money.com|shrinkme.cc|shrinkme.org|shrinkme.us|teralinks.in|urlpay.in|linksly.pw|short.paylinks.cloud|ez4short.xyz|go.shortsme.in|_exashorts.fun|go.paylinks.cloud|go.cutlink.xyz|151989.xyz|go.urlcash.site|link.24payu.top|icutlink.com|120898.xyz|freeltc.top|linksfly.top|bitcosite.com|161989.xyz|adcorto.com|go.favelink.top|m.onelinks.nl|shrinkme.pro|845265.xyz|viefaucet.link|swiftlnx.com|short.earnfeyonline.online|link.urlfly.xyz|_inlinks.online|panyflay.me|ser2.crazyblog.in|m.wdu.info|m.addurl.biz|chainfo.xyz|cutsme.xyz|f.technicalatg.in|ziplinker.net|exalink.fun|hatelink.me|linkpays.in|za.gl)#is", $host)) {
        if (preg_match("#(link1s.com)#is", $host)) {
              $referer = "https://google.com/";
        } elseif (preg_match("#(insfly.pw|oscut.space|oscut.fun|kyshort.xyz|clockads.in|linksly.pw|exashorts.fun)#is", $host)) {
            $referer = "https://clk.wiki/";
        } elseif (preg_match("#(shrinke.us|shrinkme.info|shrinkme.org|shrinkme.us|shrinkme.site|shrinkme.cc)#is", $host)) {
            $referer = "https://themezon.net/";
        } elseif (preg_match("#(linksfly.top)#is", $host)) {
            $referer = "https://go.bitcosite.com/";
        } elseif (preg_match("#(linksly.co)#is", $host)) {
            $referer = "https://en.themezon.net/";
        } elseif (preg_match("#(link.usalink.io|usalink.io)#is", $host)) {
            $referer = "https://link.theconomy.me";
        } elseif (preg_match("#(ez4short.com)#is", $host)) {
            $referer = "https://ez4mods.com/";
        } elseif (preg_match("#(link.shrinkme.link)#is", $host)) {
            $referer = "https://blog.anywho-com.com/";
        } elseif (preg_match("#(shrinkme.pro|shrinkme.site", $host)) {
            $referer = "https://themezon.net/";
        } elseif (preg_match("#(sheralinks.com)#is", $host)) {
            $referer = "https://blogyindia.com/";
        } elseif (preg_match("#(linksfly.link)#is", $host)) {
            $referer = "wss://insurance.uprwssp.org/";
        } elseif (preg_match("#(link.adlink.click)#is", $host)) {
            $referer = "https://www.diudemy.com/";
        } elseif (preg_match("#(url.beycoin.xyz)#is", $host)) {
            $referer = "https://adsluffa.online/";
        } elseif (preg_match("#(link.vielink.top)#is", $host)) {
            $referer = "https://phongcachsao.vn/";
        } elseif (preg_match("#(bestlink.pro)#is", $host)) {
            $referer = "https://ez4short.com/";
        } elseif (preg_match("#(adbull.me)#is", $host)) {
            $referer = "https://deportealdia.live/";
        } elseif (preg_match("#(shortplus.xyz)#is", $host)) {
            $referer = "https://1.newworldnew.com/";
        } elseif (preg_match("#(link.short2url.in)#is", $host)) {
            $referer = "https://blog.mphealth.online/";
        } elseif (preg_match("#(earnify.pro|links.earnify.pro)#is", $host)) {
            $referer = "https://go.linksfly.link/";
        } elseif (preg_match("#(go.shorti.io)#is", $host)) {
            $referer = "https://healthmedic.xyz/";
        } elseif (preg_match("#(link.revly.click)#is", $host)) {
            $referer = "https://coinsrev.com/";
        } elseif (preg_match("#(go.tinygo.co|m.tinygo.co|s3.addurl.biz|hbz.us)#is", $host)) {
            $referer = "https://wpcheap.net/";
        } elseif (preg_match("#(go.wez.info|m.wez.info|s2.addurl.biz)#is", $host)) {
            $referer = "https://izseo.net/";
        } elseif (preg_match("#(go.viewfr.com|m.viewfr.com|s1.addurl.biz)#is", $host)) {
            $referer = "https://cryptfaucet.com/";
        } elseif (preg_match("#(cashlinko.com)#is", $host)) {
            $referer = "https://techyuth.xyz/";
        } elseif (preg_match("#(linkjust.com)#is", $host)) {
            $referer = "https://forexrw7.com/";
        } elseif (preg_match("#(dz4link.com)#is", $host)) {
            $referer = "https://dz4link.com/";
        } elseif (preg_match("#(panylink.com)#is", $host)) {
            $referer = "https://statepany.online/";
        } elseif (preg_match("#(panyflay.me)#is", $host)) {
            $referer = "https://statepany.online/";
        } elseif (preg_match("#(panyshort.link)#is", $host)) {
            $referer = "https://panytourism.online/";
        } elseif (preg_match("#(droplink.co)#is", $host)) {
            $referer = "https://yoshare.net/";
        } elseif (preg_match("#(go.bitss.sbs|489651.xyz|546512.xyz|go.shtfly.com|revcut.net|l2.revcut.net|121989.xyz|go.urlcut.pro|131989.xyz|go.faho.us|141989.xyz|go.eazyurl.xyz|link.eazyurl.xyz|go.cutlink.xyz|151989.xyz|120898.xyz|bitcosite.com|161989.xyz|845265.xyz|m.wdu.info|m.addurl.biz)#is", $host)) {
            $referer = ["https", "wss"][rand(0, 1)]."://away.vk.com/";
        } elseif (preg_match("#(linkjust.com)#is", $host)) {
            $referer = "https://forexrw7.com/";
        } elseif (preg_match("#(adbitfly.com)#is", $host)) {
            $referer = "https://blogsward.com/";
        } elseif (preg_match("#(adshort.co)#is", $host)) {
            $referer = "https://techgeek.digital/";
        } elseif (preg_match("#(short2money.com|lollty.com)#is", $host)) {
            $referer = "https://mamahawa.com/";
        } elseif (preg_match("#(_short2money.com)#is", $host)) {
            $referer = "https://lollty.pro/";
        } elseif (preg_match("#(10short.com)#is", $host)) {
            $referer = "https://10.10short.vip";
        } elseif (preg_match("#(sox.link)#is", $host)) {
            $referer = "https://coincroco.com/";
        } elseif (preg_match("#(teralinks.in)#is", $host)) {
            $referer = "https://daddy.webseriesreel.in/";
        } elseif (preg_match("#(urlpay.in)#is", $host)) {
            $referer = "https://daddy.webseriesreel.in/";
        } elseif (preg_match("#(ez4short.xyz)#is", $host)) {
            $referer = "https://healthynepal.in/";
        } elseif (preg_match("#(link.24payu.top)#is", $host)) {
            $referer = "https://go2.24payu.top/";
        } elseif (preg_match("#(icutlink.com)#is", $host)) {
            $referer = "https://zegtrends.com/";
        } elseif (preg_match("#(freeltc.top)#is", $host)) {
            $referer = "https://droplink.co/";
        } elseif (preg_match("#(chainfo.xyz|cutsme.xyz)#is", $host)) {
            $referer = "https://bitzite.com/";
        } elseif (preg_match("#(m.onelinks.nl)#is", $host)) {
            $referer = "https://oncoin.info/";
        } elseif (preg_match("#(viefaucet.link)#is", $host)) {
            $referer = "https://helpowi.com/";
        } elseif (preg_match("#(swiftlnx.com)#is", $host)) {
            $referer = "https://forx.mazen-ve3.com/";
        } elseif (preg_match("#(link.urlfly.xyz)#is", $host)) {
            $referer = "https://publicearn.com/";
        } elseif (preg_match("#(ser2.crazyblog.in)#is", $host)) {
            $referer = "https://publicearn.com/";
        } elseif (preg_match("#(go.shortsme.in)#is", $host)) {
            $referer = "https://gameblog.in/";
        } elseif (preg_match("#(ziplinker.net)#is", $host)) {
            $referer = "https://fintech.techweeky.com/";
        } elseif (preg_match("#(exalink.fun)#is", $host)) {
            $referer = "https://ez4short.com/";
        } elseif (preg_match("#(linkpays.in)#is", $host)) {
            $referer = "https://techyinfo.in/";
        } else {
            $referer = 0;
        }
        if (preg_match("#(dz4link.com|Nx.chainfo.xyz|go.illink.net|go.birdurls.com|link.birdurls.com|go.owllink.net|link.owllink.net|go.illink.net|link.illink.net|go.megaurl.in|link.adlink.click)#is", $host)) {
            $cloud = 1;
        } else {
            $cloud = 0;
        }
        
        $url = str_replace("f.technicalatg.in", "atglinks.com", str_replace("cutsme.xyz/next", "go.cutsme.xyz", str_replace("m.addurl.biz", "finish.addurl.biz", str_replace("m.wdu.info", "finish.wdu.info", str_replace("ser2.crazyblog.in", "ser3.crazyblog.in", str_replace("link.urlfly.xyz", "urlfly.xyz",str_replace("845265.xyz", "inlinks.online", str_replace("m.onelinks.nl", "finish.onelinks.nl", str_replace("go.favelink.top", "favelink.top", str_replace("adcorto.com", "link.adcorto.com", str_replace("120898.xyz", "c2g.at", str_replace("link.24payu.top", "go2.24payu.top", str_replace("go.urlcash.site", "urlcash.site", str_replace(["go.cutlink.xyz", "151989.xyz"], "cutlink.xyz", str_replace("go.paylinks.cloud", "paylinks.cloud", str_replace("go.shortsme.in", "shortsme.in", str_replace("short.paylinks.cloud", "paylinks.cloud", str_replace("clik.pw", "pwrpa.cc/go", str_replace("teralinks.in", "go.teralinks.in", str_replace("_short2money.com", "forextrader.site/NewLink", str_replace("lollty.com", "forextrader.site/SkipLink", str_replace("adbitfly.com/short", "adbitfly.com", str_replace("m.pkr.pw", "jameeltips.us/blog", str_replace("go.foxylinks.site", "link.foxylinks.site", str_replace(["go.bitss.sbs", "546512.xyz", "489651.xyz"], "bitss.sbs", str_replace("go.shtfly.com", "shtfly.com", str_replace(["go.eazyurl.xyz", "link.eazyurl.xyz"],"eazyurl.xyz", str_replace(["go.faho.us", "141989.xyz"], "faho.us", str_replace(["go.urlcut.pro", "131989.xyz"], "urlcut.pro", str_replace(["go.revcut.net", "l2.revcut.net", "go.revcut.net", "121989.xyz"], "revcut.net", str_replace("kyshort.xyz/go", "kyshort.xyz", str_replace(["go.viewfr.com", "m.viewfr.com", "s1.addurl.biz"], "thanks.viewfr.com", str_replace(["go.wez.info", "m.wez.info", "s2.addurl.biz"] ,"thanks.wez.info", str_replace(["go.tinygo.co", "m.tinygo.co", "s3.addurl.biz", "hbz.us"],"thanks.tinygo.co", str_replace("links.earnify.pro", "earnify.pro", str_replace("link.revly.click", "en.revly.click", str_replace("link.short2url.in", "techyuth.xyz/blog", str_replace("short.dash-free.com", "dash-free.com", str_replace("link.vielink.top", "short.vielink.top", str_replace("usalink.io", "link.theconomy.me", str_replace("url.beycoin.xyz/short", "url.beycoin.xyz", str_replace("link.adlink.click", "blog.adlink.click", str_replace("linksfly.link", "linksfly.link", str_replace(["go.shorti.io", "shorti.io"],"blog.financeandinsurance.xyz", str_replace(["shrinkme.cc", "shrinkme.pro"], "en.shrinke.me", str_replace(["link.shrinkme.link"], "blog.shrinkme.link", str_replace("go.hatelink.me", "q.hatelink.me", str_replace("linksly.co", "go.linksly.co", str_replace("link.usalink.io", "link.theconomy.me", str_replace("go.megafly.in", "get.megafly.in", str_replace("go.megaurl.in", "get.megaurl.in", str_replace("go.mtraffics.com", "get.mtraffics.com", str_replace(["go.illink.net", "link.illink.net"], "illink.net", str_replace(["go.owllink.net", "link.owllink.net"] ,"owllink.net", str_replace(["go.birdurls.com", "link.birdurls.com"], "birdurls.com", str_replace(["bitcosite.com/1", "chainfo.xyz/next", "chainfo.xyz", "go.bitcosite.com"], "go.bitcosite.com", str_replace(["shrinkme.site", "shrinkme.org", "shrinkme.info", "shrinkme.us"],"en.shrinke.me", str_replace("shrinke.us", "en.shrinke.me", $url))))))))))))))))))))))))))))))))))))))))))))))))))))))))));
        $run = build($url);#die(print_r($r));
        $r = base_short($run["links"], 0, 0, $referer, $cloud, $cookie, 0, $proxy);
        $cookie[] = $r["cookie"];
        $cookie[] = ["ab" => 2];
        $t = $r["token_csrf"];;
        #die(print_r($r));
        #print_r($r);
        if (preg_match("#(verify/[?]/)#is", $r["url"])) {
            $verify = str_replace("http:", "https:", $r["url"]);
            $r = base_short($verify, 0, 0, $verify);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "2") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "3") {

            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "4") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
           $cookie[] = $r["cookie"];
           $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "5") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "6") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "7") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "8") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][3])[0] == "9") {
            $data = query_data($t);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if ($t[1][1] == "mysite") {
            $method = "recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = query_data($t, 0, $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }#die(print_r($r));
        
        if ($t[1][2] == "f_n") {
            $method = "recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = query_data($t, 0, $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if ($t[1][2] == "ref") {
            $method = "recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = query_data($t, 0, $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[1][2])[4] == "f_n") {
            $method = "recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = query_data($t, 2, $rsp);
            
            #die(print_r($r));
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if (explode('"', $t[2][2])[0] == "captcha") {
            $method = "recaptchav2";
            
            if (!$r[$method]) {
                $method = "invisible_recaptchav2";
            }
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = query_data($t, 0, $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie, 0, $proxy);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        #die(print_r($r));
        if (explode('"', $t[1][3])[0] == "ad_form_data") {
            $t = array(
                array_merge(array_diff($t[0],[$t[1][0], $t[2][0]])),
                array_merge(array_diff($t[1], [$t[1][0], $t[2][0]])),
                array_merge(array_diff($t[2], [$t[1][0], $t[2][0]]))
            );
        }
        
        
        if (explode('"', $t[1][2])[0] == "ad_form_data" || explode('"', $t[1][1])[0] == "ad_form_data") {
            $data = query_data($t);
            L($coundown);
           
            if (preg_match("#(lollty.com)#is", $host)) {
                $run["go"][0] = str_replace("forextrader.site", "forextrader.site/SkipLink", $run["go"][0]);
            } elseif (preg_match("#(short2money.com)#is", $host)) {
                $run["go"][0] = str_replace("forextrader.site", "forextrader.site/NewLink", $run["go"][0]);
            }
            $r1 = base_short(str_replace("pwrpa.cc", "pwrpa.cc/go", str_replace("jameeltips.us", "jameeltips.us/blog", str_replace("techyuth.xyz", "techyuth.xyz/blog", $run["go"][0]))), 1, $data, 0, $cloud, $cookie, 0, $proxy)["json"];
            #die(print_r($r1));
            if (strpos($r1->url, "limit") !== false){
                print m."kena limit kontol!".n;
                return "refresh";
            } elseif(strpos($r1->url, "proxy") !== false){
                print m."terdeteksi proxy!".n;
                return "refresh";
            } elseif (strpos($r1->url, "http") !== false){
                if ($only_sl) {
                    return $r1;
                }
                print h."success";
                r();
                return $r1->url;
            } else {
                return "refresh";
            }
        }
        if (explode('"', $t[1][7])[0] == "country") {
            $data = query_data($t);
            L($coundown);
           
            
            $r1 = base_short($run["go"][0], 1, $data, 0, $cloud, $cookie, 0, $proxy)["json"];
           
            if (strpos($r1->url, "limit") !== false){
                return "refresh";
            } elseif (preg_match("#(http)#is", $r1->url)) {
                print h."success";
                r();
                return $r1->url;
            } else {
                return "refresh";
            }
        }
    } elseif (preg_match("#(tii.la|tei.ai|lnbz.la)#is", $host)) {
        $url = str_replace("tei.ai", "tii.la", $url);
        $run = build($url);
        $r = base_short($run["links"], 0, 0, $redirect_url, 0, 0, 0, $proxy);
        $t = $r["token_csrf"];
        $cookie[] = $r["cookie"];
        $cookie[] = ["ab" => 2];
        $data = query_data($t);
        $r1 = base_short($run["links"], 0, $data, 0, 0, $cookie, 0, $proxy);

        if ($r1["timer"] or $r1["timer"] == 0) {
            L($coundown);
            $t = $r1["token_csrf"];
            $cookie[] = $r1["cookie"];
            $data = query_data($t);
            $r2 = base_short($run["go"][0], 1, $data, 0, 0, $cookie, 0, $proxy)["json"];

            if (preg_match("#(http)#is", $r2->url)) {
                print h.$r2->status;
                r();
                if ($only_sl) {
                    return $r2;
                }
                return $r2->url;
            }
        }
    } elseif (preg_match("#(try2link.com)#is", $host)) {
        $run = build($url);
        $r = base_short($url);
        $cookie[] = $r["cookie"];
        $referer[] = "https://trip.businessnews-nigeria.com/";
        $referer[] = "https://forexit.online/";
        $referer[] = "https://mobi2c.com/";
        $referer[] = "https://te-it.com/";
        $referer[] = "https://world2our.com/";
        $referer[] = "https://hightrip.net/";
        $referer[] = "https://healthy4pepole.com/";
        $referer[] = "https://to-travel.net/";
        
        for ($x = 0; $x < count($referer); $x++) {
            $r = base_short($url, 0, 0, $referer[$x], 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
            
            if (explode('"', $t[1][2])[0] == "ad_form_data") {
                L($coundown);
                $data = query_data($t);
                $r1 = base_short($run["go"][0], 1, $data, $url, 0, $cookie)["json"];
                
                if (preg_match("#(http)#is", $r1->url)) {
                    h.$r1->status;
                    r();
                    return $r1->url;
                }
            }
            sleep(2);
        }
    } elseif (preg_match("#(linkdam.me|terafly.me|forexly.cc|insurancly.cc|goldly.cc|playstore.pw|botfly.me)#is", $host)) {
      $r = base_short($url);
      if (preg_match("#(playstore.pw)#is", $host)) {
        $r["url"] = $url;
      } elseif (preg_match("#(botfly.me)#is", $host)) {
        $url = "https://adsy.pw/how-to-locate-good-risk-reward-opportunities-in-forex-trading-botfly".parse_url($url)["path"];
      } elseif (explode("?", $r["url"])[1]) {
        $url = explode("?", $r["url"])[1];
      } else {
        goto ulang;
      }
      $r1 = base_short($url, 0, 0, $r["url"]);
      $cookie[] = $r1["cookie"];
      $t = $r1["token_csrf"];
      if ($t[2][2] == "continue") {
        $data = data_post($t, "five");
        $r1 = base_short($url,0, $data, $url, 0, $cookie);
        $cookie[] = $r1["cookie"];
        $t = $r1["token_csrf"];
        if ($t[2][2] == "continue") {
          $data = data_post($t, "five");
          $r1 = base_short($url,0, $data, $url, 0, $cookie);
          $cookie[] = $r1["cookie"];
          $t = $r1["token_csrf"];
          if ($t[2][2] == "continue") {
            $data = data_post($t, "five");
            $r1 = base_short($url,0, $data, $url, 0, $cookie);
            $cookie[] = $r1["cookie"];
            $t = $r1["token_csrf"];
            if ($t[2][2] == "continue") {
              $data = data_post($t, "five");
              $r1 = base_short($url,0, $data, $url, 0, $cookie);
              $cookie[] = $r1["cookie"];
              $t = $r1["token_csrf"];
              if ($t[2][2] == "continue") {
                $data = data_post($t, "five");
                $r1 = base_short($url,0, $data, $url, 0, $cookie);
                $cookie[] = $r1["cookie"];
                $t = $r1["token_csrf"];
                if ($t[2][2] == "continue") {
                  $data = data_post($t, "five");
                  $r1 = base_short($url,0, $data, $url, 0, $cookie);
                  $cookie[] = $r1["cookie"];
                  $t = $r1["token_csrf"];
                  if ($t[2][2] == "continue") {
                    $data = data_post($t, "five");
                    $r1 = base_short($url,0, $data, $url, 0, $cookie);
                    $cookie[] = $r1["cookie"];
                    $t = $r1["token_csrf"];
                  }
                }
              }
            }
          }
        }
        if (!$t[0][0]) {
          return "refresh";
          }
          if ($t[2][2] == "captcha") {
            $method = "recaptchav2";
            $cap = request_captcha($method, $r1[$method], $url);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = data_post($t, "five", $rsp);
            $r1 = base_short($url,0, $data, $url, 0, $cookie);
            $cookie[] = $r1["cookie"];
            $t = $r1["token_csrf"];
          }
          if ($t[1][2] == "ad_form_data") {
            L($coundown);
            $data = data_post($t, "four");
            $r2 = base_short(build($url)["go"][2], 1, $data, $url, 0, $cookie)["json"];
          }
          if (preg_match("#(http)#is", $r2->url)) {
           print h.$r2->status;
           r();
           unset($cookie);
           return $r2->url;
          }
      }
    } elseif (preg_match("#(destyy.com|festyy.com|gestyy.com|hestyy.com|ceesty.com|corneey.com)#is", $host)) {
        while(true) {
            $r = base_short($url,0, $url);
            $cookie[] = $r["cookie"];
            $link = $r["url"];
            
            if (preg_match("#(freeze)#is", $link)) {
                $r = base_short($link, 0, 0, 0, 0, $cookie);
                $cookie[] = $r["cookie"];
                L($coundown);
                $r = base_short($url, 0, 0, $link, 0, $cookie);
                $cookie[] = $r["cookie"]; 
            }
          
            if (preg_match("#(sessio)#is", $link)) {
                $r = base_short($link, 0, 0, 0, 0, $cookie);
                $cookie[] = $r["cookie"];
            }
            $sessionId = $r["sessionId"];
            
            if (!$sessionId) {
                unset($cookie);
                continue;
            }
            L($coundown);
            $r1 = base_short("https://clkmein.com/shortest-url/end-adsession?adSessionId=".$sessionId."&adbd=0&callback=reqwest_".time(), 0, 0, $url, 0, $cookie)["res"];
            
            if (ex('":"', '"', 2, $r1) == "ok") {
                print h."succses";
                r();
                return str_replace("\/", "/", ex('":"', '"', 1, $r1));
            }
        }
    } elseif (preg_match("#(exe.io|exeo.app)#is", $host)) {
        while(true) {
            $exp++;
            if ($exp > 5) {
                return "refresh";
            }
            
            $link[] = $url;
            $cookie[] = ["ab" => 2];
            $url = end(array_filter($link));
            $r = base_short($url, 0, 0, $url, 0, $cookie);
            $cookie[] = $r["cookie"];
            $link[] = $r["url"] ? $r["url"] : "";
            $t = $r["token_csrf"];
            $url = end(array_filter($link));
 
            if ($t[1][0]) {
                break;
            }
                continue;
        }
        
        $data = str_replace("=&", "=&f_n=sle&",query_data($t, 2));
        $r = base_short($url,0, $data, $url, 0, $cookie);
        #die(print_r($data));
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
        $method = "invisible_recaptchav2";
        $cap = request_captcha($method, $r[$method], $url);
        $rsp = array("g-recaptcha-response" => $cap);
        $data = data_post($t, "five", $rsp);
        $r = base_short($url,0, $data, $url, 0, $cookie);
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];#die(print_r($r));
        
        if (explode('"', $t[1][2])[0] == "ad_form_data") {
            L($coundown);
            $data = data_post($t, "four");
            $r1 = base_short(build($url)["go"][0], 1, $data, 0, 0, $cookie)["json"];
            
            if (preg_match("#(http)#is", $r1->url)) {
                h.$r1->status;
                r();
                return $r1->url;
            }
        }
    } elseif (preg_match("#(cuty.io)#is", $host)) {
        $r = base_short($url); #die(print_r($r));
        $cookie[] = $r["cookie"];
        $url = $r["url"];
       # die(print_r($r));
       $cookie[] = ["ab" => 2];
        if ($r["url"]) {
            $r = base_short($url, 0, 0, 0, 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
            $data = data_post($t, "null");
            $r = base_short($url,0, $data, 0, 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
            $method = "recaptchav2";
            $cap = request_captcha($method, $r[$method], $url);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = data_post($t, "null", $rsp);
            $r = base_short($url,0, $data, 0, 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
            
            if (explode('"', $t[1][1])[0] == "data") {
                L($coundown);
                $data = data_post($t, "two");
                $r1 = base_short(build($url)["go"][1], 1, $data, 0, 0, $cookie);
                
                if ($r1["url"]) {
                    print h."success";
                    r();
                    return $r1["url"];
                }
            }
        }
    } elseif (preg_match("#(oii.io|fc-lc.xyz)#is", $host)) {
        $run = build($url);
        $r = base_short($run["links"]);
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
        #die(print_r($r));
        if ($t[1][2] == "f_n") {
            $method = "invisible_recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = data_post($t, "four", $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], $cloud, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
        }
        
        if ($t[1][2] == "ref") {
            $method = "invisible_recaptchav2";
            $cap = request_captcha($method, $r[$method], $run["links"]);
            $rsp = array("g-recaptcha-response" => $cap);
            $data = data_post($t, "five", $rsp);
            $r = base_short($run["links"], 0, $data, $run["links"], 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
      }
      $link = $r["url1"][0];
      #die(print_r($r));
      if (strpos($link, "http") !== false) {
        #die(print_r($r));
          if (explode('"', $t[1][4])[0] == "user_faucet") {
              $data = data_post($t, "five");
              $r = base_short($link, 1, $data, 0, 0, $cookie);
              $cookie[] = $r["cookie"];
              $t = $r["token_csrf"];
            
          } elseif (trimed($t[1][1]) == "random_token") {#die(print_r($r));
              $data = data_post($t, "five");
              $r = base_short($link, 1, $data, 0, 0, $cookie);
              $cookie[] = $r["cookie"];
              $t = $r["token_csrf"];
              
              if ($t[1][8]) {
                  $data = data_post($t, "eight");
                  $r = base_short($link, 1, $data, 0, 0, $cookie);
                  $cookie[] = $r["cookie"];
                  $t = $r["token_csrf"];
              }
          } else {
              $data = data_post($t, "three");
              $r = base_short($link, 1, $data, 0, 0, $cookie);
              $cookie[] = $r["cookie"];
              $t = $r["token_csrf"];
          }
          
          if ($t[1][1] == "ad_form_data") {
              L($coundown+10);
              $data = data_post($t, "six");
              $r1 = base_short(str_replace("fc-lc.xyz", "fc.lc", str_replace("oii.io/links/go", "oii.io/links/go1",build($url)["go"][0])), 1, $data, $link, 0, $cookie)["json"];
              
              if (preg_match("#(http)#is", $r1->url)) {
                  h."success";
                  r();
                  return $r1->url;
              }
          }
      }
    } elseif (preg_match("#(doshrink.com)#is", $host)) {
        $run = build($url);
        $r = base_short($run["links"]);
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
        $url = $r["url1"][0];
        
        if (!parse_url($url)["scheme"]) {
            return "refresh";
        }
        $data = data_post($t, "null");
        $r = base_short($url, 1, $data, $run["links"], 0, $cookie);
        $cookie[] = $r["cookie"];
        $sitekey = $r["data"]["rcap"];
        $cookie[] = $r["cookie"];
        $r = base_short("https://kiktu.com/wp-admin/admin-ajax.php", 1, "action=generate2", "https://kiktu.com/", 0, $cookie);
        $cookie[] = $r["cookie"];
        
        if (!parse_url($r["url7"])["scheme"]) {
            return "refresh";
        }
        $r = base_short($r["url7"]);
        $cap = request_captcha("recaptchav2", $sitekey,"https://kiktu.com/");
        $data = http_build_query([
            "wgurl" => $t[2][0],
            "wgr" => $sitekey,
            "wgp" => 1,
            "wgcsrf" => $r["res"],
            "wgcaptcharesponse" => $cap
        ]);
        $r = base_short("https://kiktu.com/recaptcha", 0, $data, "https://kiktu.com/", 1, $cookie);
        $cookie[] = $r["cookie"];
        $newcsrf = $r["data"]["newcsrf"];
        $slug = $r["data"]["slug"];
        $r = base_short("https://api.bigdatacloud.net/data/client-ip");
        $ip_n = "websgrid=".$r["json"]->ipNumeric.";";
        $data = json_encode(["ver" => $r["json"]->ipNumeric]);
        $verify = base_short("https://kiktu.com/verify", 1, $data, 0, 0, $cookie);
        $cookie[] = $verify["cookie"];
        $r = base_short($run["links"]."?".http_build_query(["data" => $slug,"secret" => $verify["json"]->response,"wgcsrf" => $newcsrf]), 0 ,0 ,"https://kiktu.com/", 0, $ip_n.$cookie); 
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
        
        if (explode('"', $t[1][2])[0] == "ad_form_data") {
            L($coundown);
            $data = data_post($t, "four");
            $r1 = base_short($run["go"][0], 1, $data, 0, 0, $cookie)["json"];
            if (preg_match("#(http)#is", $r1->url)) {
                h.$r1->status;
                r();
                return $r1->url;
            }
        }
    } elseif (preg_match("#(clk.asia)#is", $host)) {
        $url = str_replace("clk.asia", "clk.wiki", $url);
        $r = base_short($url, 0, 0, 0, $redirect_url, 0, 0, $proxy);
        $cookie[] = $r["cookie"];
        $cookie[] = ["ab" => 2];
        $t = $r["token_csrf"];
        $url1 = $url."?".http_build_query([$t[1][0] => $t[2][0]]);
        $r = base_short($url1, 0, 0, 0, 0, $cookie, 0, $proxy);
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
       
        if ($t[1][0] == "token") {
            $method = "hcaptcha";
            $cap = request_captcha($method, $r[$method], $url1);
            $rsp = array("h-recaptcha-response" => $cap);
            $data = query_data($t, 0, $rsp);
            $r = base_short($url1,0, $data, 0, 0, $cookie, 0, $proxy);
        }
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf"];
      
        if ($t[1][1] == "ad_form_data") {
            L($coundown);
            $data = query_data($t);
            $r1 = base_short(build($url)["go"][0], 1, $data, 0, 0, $cookie, 0, $proxy)["json"];
            
            if (preg_match("#(http)#is", $r1->url)) {
              
                if ($only_sl) {
                    return $r1;
                }
                h.$r1->status;
                r();
                return $r1->url;
            }
        }
    } elseif (preg_match("#(ctr.sh|easycut.io|revcut.net|crypto-radio.eu|todaynewsview.store|shrinkme.link|faho.us|urlcut.pro|ez4short.com|bitad.org|cutlink.xyz|bitss.sbs|inlinks.online|shortino.link|sharecut.io|droplink.co|adbitfly.com|earnify.pro|btcut.io|slfly.net|info.linkzfly.xyz|_linkzfly.xyz|cfshort.xyz|flukesnips.com|freebonk.paycut.io|nx.chainfo.xyz|coinfays.com|paycut.io|linkmay.me|shrinkmy.site|www.linkswift.click|shortano.link|shortify.online|owllink.net|birdurls.com|illink.net|kotenkoshort.xyz|kyshort.xyz|zshort.io|exashorts.fun)#is", $host)) {
        
        if ($host == "exashorts.fun") {
            $redirect_url = "https://exactpay.online/";
        }
        $url = str_replace("nx.chainfo.xyz", "go.bitcosite.com", str_replace("/short/", "/", $url));
        //$cookie[] = ["ab" => 2];
        $r = base_short(str_replace("http:", "https:", $url), 0, 0, $redirect_url, 0, $cookie, 0, $proxy);
        $cookie[] = $r["cookie"];
        $url0 = urldecode($r["url6"]);
        #die(print_r($r));
        #die(print_r($r["cookie"]));
        if (!$url0) {
            return "refresh";
        }
        
        $url_parse =  $url0;
        parse_str($url_parse, $url1);
        if (!$url1["url"]) {
            unset($cookie);
            goto ulang;
        }
        L(20);
        $r = base_short($url0, 0, 0, $url, 0, $cookie);
        $cookie[] = $r["cookie"];
        $r = base_short($url1["url"]."?overrideSession=".$url, 0, 0, $url0, 0, $cookie);
        $cookie[] = $r["cookie"];
        $url1 = $r["url"] ? $r["url"] : ($r["url1"][0] ? $r["url1"][0] : "");
        #die(print_r($r));

        if (strpos($url1, "http") === false) {
          print m."mencoba generate ulang";
          sleep(2);
          goto ulang;
          r();
        }
        $knt[] = $url1;
        while(true) {
            $cookie[] = [];
            $url1 = end(array_filter($knt));
            $r = base_short($url1, 0, 0, $url1, 0, $cookie);
            $cookie[] = $r["cookie"];
            
            if ($r["status"] == 302) {
                $knt[] = $r["url"] ? $r["url"] : ($r["url1"][0] ? $r["url1"][0] : "");
                continue;
            }
            $asu[] = $r["token_csrf5"][1][0];
            $valid = end(array_filter($asu));
            #die(print_r($r));
            
            if ($r["recaptchav3"] ? $r["recaptchav3"] : "") {
                $cap = recaptchav3($r["recaptchav3"], $url1);
                $data = http_build_query([
                    "g-recaptcha-response" => $cap,
                    $r["token_csrf5"][1][0] => "true"
                ]);
            } elseif ($r["hcaptcha"] ? $r["hcaptcha"] : "") {
                $method = "hcaptcha";
                $cap = request_captcha($method, $r[$method], $url1);
                $data = http_build_query([
                    "g-recaptcha-response" => $cap,
                    "h-captcha-response" => $cap,
                    $r["token_csrf5"][1][0] => "true"
                ]);
            } elseif ($r["recaptchav2"] ? $r["recaptchav2"] : "") {
                $method = "recaptchav2";
                $cap = request_captcha($method, $r[$method], $url1);
                $data = http_build_query([
                    "g-recaptcha-response" => $cap,
                    $r["token_csrf5"][1][0] => "true"
                ]);
            } else {
                L(30);
                $data = http_build_query([
                    "no-recaptcha-noresponse" => "true",
                    $valid => "true"
                ]);
            }
            
            
            if (!$r["token_csrf5"][1][0]) {
                unset($cookie);
                
                if ($expired > 2) {
                    return "refresh";
                }
                goto ulang;
                //return "refresh";
            }
            $r = base_short($url1, 1, $data, $url1, 0, $cookie);
            
            if (preg_match("#NO_SHORTENER_LINK_FOUND#is", $r["res"])) {
                unset($cookie);
                
                if ($expired > 2) {
                    return "refresh";
                }
                goto ulang;
            }
            $cookie[] = $r["cookie"];
            $final = urldecode($r["url0"] ? $r["url0"] : ( $r["url1"][1] ? $r["url1"][1] :  ($r["url1"][0] ? $r["url1"][0] : "")));
            $knt[] = $final;
            $find = array_merge([$r["url0"]] ?? [], $r["url1"] ?? []);
            
            for ($c = 0; $c < count ($find); $c++) {
              
                if (strpos($find[$c], str_replace("/", "", $query["path"]))) {
                    $final = urldecode($find[$c]);
                    break;
                }
            }
            
            if (strpos($final, $query["path"])) {
              
                if ($method_proxy == "proxyscrape"/* || $method_proxy == "flashproxy"*/) {
                    
                    if (preg_match("#(revcut.net|faho.us|urlcut.pro|bitad.org|cutlink.xyz|inlinks.online|bitss.sbs|chainfo.xyz)#is", $host)) {
                        $proxy = 0;
                    } else {
                        mode_proxy(1);
                    }
                }
                #print_r($r);
                if (strpos($final, "&token") !== false) {
                    $step_final = explode("?url=", str_replace("&token", "?tk", $final))[1];
                } else {
                    $step_final = explode("?url=", str_replace("&tk", "?token", $final))[1];
                }
                $cookie[] = ["ab" => 2];
                $r = base_short($final, 0, 0, $url1, 0, $cookie, 0, $proxy);
                $cookie[] = $r["cookie"];
                $r = base_short(str_replace("/?", "?", $step_final), 0, 0, $final, 0, $cookie, 0, $proxy);
                $cookie[] = $r["cookie"];
                $t = $r["token_csrf"];
                #die(print_r($r));
                if (explode('"', $t[1][2])[0] == "ad_form_data") {
                    $data = data_post($t, "four");
                    L($coundown);
                    $r1 = base_short(build($step_final)["go"][0], 1, $data, $step_final, 0, $cookie, 0, $proxy)["json"];
                    #die(print_r($r1));
                    
                    if (preg_match("#(http)#is", $r1->url)) {
                        print h.$r1->status;
                        r();
                        $url = $r1->url;
                        
                        if (strpos($url, "claim.cryptolink.click")) {
                            $r = base_short($url, 0, 0, $step_final, 0, $cookie);
                            $cookie[] = $r["cookie"];
                            $t = $r["token_csrf"];
                                
                            if (explode('"', $t[1][2])[0] == "ad_form_data") {
                                $data = data_post($t, "four");
                                L($coundown);
                                $r1 = base_short(build($url)["go"][0], 1, $data, $url, 0, $cookie)["json"];
                            }
                        }
                        #die(print_r($r1));
                        if ($only_sl) {
                            return $r1;
                        }
                        return $r1->url;
                    }
                }
                return "";
            } elseif (strpos($final, "http") !== false) {
                continue;
            }
        }
    } elseif (preg_match("#(ouo.io)#is", $host)) {
        $url = str_replace("ouo.io", "ouo.press", $url);
        $run = build($url);
        $r = base_short($run["links"]);
        $cookie[] = $r["cookie"];
        $t = $r["token_csrf2"];
        $method = "recaptchav3";
        if ($r[$method]) {
            $cap = recaptchav3($r[$method], $run["links"]);
            $data = http_build_query([
                explode('"', $t[2][0])[0] => $t[3][0],
                explode('"', $t[2][1])[0] => $cap,
                "v-token" => "bx"
            ]);
            L($coundown);
            $r1 = base_short($run["go"][4],0, $data, $run["links"], 0, $cookie);
            if ($r1["url"]) {
                print h."success";
                r();
                return $r1["url"];
            }
        }
    } elseif (preg_match("#(_earnow.online)#is", $host)) {
          $r = base_short($url);
          $link_r[] = $r["url"] ? $r["url"] : ($r["url5"] ? $r["url5"] : "");
          $cookie[] = $r["cookie"];
          while(true) {
              
              #$cookie[] = array_reverse($cookie);
              $link = end(array_filter($link_r));
              $r = base_short($link, 0, 0, $link, 0, $cookie);
              $link = str_replace("http:", "https:", $r["url"] ? $r["url"] : ($r["url5"] ? $r["url5"] : ""));
              $link_r[] = $link;
              $links = end(array_filter($link_r));
              $cookie[] = $r["cookie"];
              
              if (multi_strpos($link, "/key?", "/t.co/", "/random") !== false) {
                  continue;
              }
              
              if (strpos($link, "/post/") !== false) {
                  while(true) {
                      $cookie[] = $r["cookie"];
                      $r = base_short($links, 0, 0, $links, 0, $cookie);
                      $cookie[] = $r["cookie"];
                      $t = $r["token_csrf"];
                      $method = "recaptchav2";
                      
                      if ($t) {
                        
                          if ($r["recaptchav2"]) {
                              $cap = request_captcha($method, $r[$method], $links);
                              $rsp = array(
                                  "g-recaptcha-response" => $cap
                              );
                          }
                          $data = data_post($t, "one", $rsp);
                          unset($rsp);
                          if (strpos($data, "recaptca") === false) {
                              L(60);
                          }
                      }

                      if ($r["ads"]) {
                          $cookie[] = base_short($links, 1, "dataCheck=".$r["ads"], $links, 0, $cookie)["cookie"];
                      }
                      $r = base_short($links, 1, $data, $links, 0, $cookie);
                      $cookie[] = $r["cookie"];
                      $link = $r["url"] ? $r["url"] : ($r["url5"] ? $r["url5"] : "");
                      $link_r[] = $link;
                      unset($data);
                      
                      if (strpos($link, "/key?") !== false) {
                          unset($cookie);
                          break;
                      }
                      
                      if (strpos($link, "url9j") !== false) {
                          $done = base64_decode(explode('url9j=', $link)[1]);
                          
                          if (strpos($done, explode("/", $url)[2]) !== false) {
                              print m."sl ".explode("/", $url)[2]." limit!";
                              return "refresh";
                          }
                          return $done;
                      }
                  }
              }
          }
          
          
          
          
    } elseif (preg_match("#(_rsshort.com)#is", $host)) {
        $time = time() + $seconds;
        if (json_decode(file_get_contents("data.json"))->scrapingant) {
        $api = new_save("scrapingant")["scrapingant"];
        for ($c = 0; $c < 3; $c++) {
            $r = base_short("http://api.scraperapi.com?api_key=".$api."&keep_headers=true&url=".$url);
            
            if (md5($r["res"]) ==  "2334dc46017fbf6c6e1822a69efae72a") {
                new_save("scrapingant", true);
                print m."scrapingant telah mencapai batas limit".n;
                goto ulang;
            }
            $link = $r["url2"][0];
            
            if (!$link) {
                continue;
            }
            
            if ($link) {
                break;
            }
        }
        } else {
        for ($c = 0; $c < 3; $c++) {
            $r = $r = base_short($url);
            $time = time() + $seconds;
            
            $link = $r["url"];
            
            if (!$link) {
                continue;
            }
            $cookie[] = $r["cookie"];
            $r = base_short($link, 0, 0, $link, 0, $cookie);
            
            $link = $r["url"];
            
            if (!$link) {
                continue;
            }
            $cookie[] = $r["cookie"];
            $r = base_short($link, 0, 0, $link, 0, $cookie);
            $link = $r["url"];
            
            if (!$link) {
                continue;
            }
            $cookie[] = $r["cookie"];
            $r = base_short($link, 0, 0, $link, 0, $cookie);
            
            #die(print_r($r));
            
            $link = $r["url2"][0];
            
            if (!$link) {
                continue;
            }
            
            if ($link) {
                break;
            }
        }
        }

        $link = $r["url2"][0];
        if (!$link) {
            return "refresh";
        }
        $cookie[] = $r["cookie"];
        while(true) {
            unset($coordinate);
            $r = base_short($link, 0, 0, $link, 1, $cookie);
            //print_r($r);
            
            if ($r["url"]) {
              
                if ($r["status"] == 307) {
                    return "refresh";
                }
                print h."success";
                r();
                $timer = $time - time();
                
                if ($timer >= 1) {
                    L($timer);
                }
                return $r["url"];
            }
            $link1 = $r["url1"][0];
            if (!$link1) {
                return "refresh";
            }
            $cookie[] = $r["cookie"];
            #$cookie[] = array_reverse($cookie);
            $node = executeNode($r["res"], 1);
            $node = executeNode($node["res"], 1);
            #print_r($node);
            $rs = "https://".parse_url($link1)["host"]."/";
            if ($node["token_csrf"][1][1] == "_iconcaptcha-token") {
                $data_post = data_post($node["token_csrf"], "two");
                parse_str($data_post, $ic);
                $eol = "\n";
                $boundary = "------WebKitFormBoundary";
                $content = 'Content-Disposition: form-data; name="payload"';
                $code = az_num(16);
                $data = '';
                $data .= $boundary.$code.$eol;
                $data .= $content.$eol.$eol;
                $data .= base64_encode(json_encode(["i" => 1, "a" => 1, "t" => "dark", "tk" => $ic["_iconcaptcha-token"], "ts" => round(time() * 1000)])).$eol;
                $data .= $boundary.$code.'--';re:
                $r = base_short($rs."iconcaptchar/captcharequest", 1, $data, $rs, 0, $cookie, $code);
                
                if ($r["status"] >= 400) {
                    continue;
                }
                $r = base_short($rs."iconcaptchar/captcharequest?payload=".base64_encode(json_encode(["i" => 1, "tk" => $ic["_iconcaptcha-token"], "ts" => round(time() * 1000)])), 0, 0, $rs, 0, $cookie);
                
                if ($r["status"] >= 400 or !$r["res"]) {
                    continue;
                }
                
                if (strlen($r["res"]) >= 100) {
                    $coordinate = coordinate($r["res"]);
                    
                    for ($i = 0; $i < 5; $i++) {
                        $coordinate = coordinate($r["res"], $i);
                        
                        if ($coordinate["x"]) {
                            break;
                        }
                    }
                    
                    if (!$coordinate["x"]) {
                        continue;
                    }
                }
                $eol = "\n";
                $boundary = "------WebKitFormBoundary";
                $content = 'Content-Disposition: form-data; name="payload"';
                $code = az_num(16);
                $data = '';
                $data .= $boundary.$code.$eol;
                $data .= $content.$eol.$eol;
                $data .= base64_encode(json_encode(["i" => 1, "x" => $coordinate["x"], "y" => $coordinate["y"], "w" => 320, "a" => 2, "tk" => $ic["_iconcaptcha-token"], "ts" => round(time() * 1000)])).$eol;
                $data .= $boundary.$code.'--';
                $r = base_short($rs."iconcaptchar/captcharequest", 1, $data, $rs, 0, $cookie, $code);
                
                if ($r["status"] >= 400) {
                    continue;
                }
                $rsp = array("ic-hf-se" => $coordinate["x"].", ".$coordinate["y"].",320", "ic-hf-id" => 1,"ic-hf-hp" => "");
                $data_post = data_post($node["token_csrf"], "two", $rsp);
            } else {
                $data_post = data_post($node["token_csrf"], "one");
            }
            $r = base_short($link,0, $data_post, $rs, 0, $cookie);
            $url = $r["url"];
            if (!$url) {
                continue;
            }
            $cookie[] = $r["cookie"];
            continue;
        }
    } elseif (preg_match("#(clks.pro)#is", $host)) {
        $run = build($url);
        if (file_get_contents("key_scrape")) {
            #$scrape = mode_proxy();
        }
        $time = time() + $seconds;
        $r = base_short($url);
        #$cookie[] = $r["cookie"];
        $link = str_replace(["http:", "https:"], "wss:", explode("backup", $r["url"])[0]);
        $r = base_short($run["inc"], 0, 0, $link);#, 0, $cookie, 0, $scrape);
        #die(print_r($r));
        if ($r["status"] == 302) {
            print m."shortlinks limit!".n;
            return "refresh";
        }
        
        if ($r["url"]) {
            print h."success";
            r();
            $timer = $time - time();
            if ($timer >= 1) {
                L($timer);
            }
            parse_str(explode("?", $r["url"])[1], $get);
            if (multi_strpos(base64_decode($get["get"]), "bypass", "-cut", "final", "limit") !== false) {
                print m."Shorlinks KONTOL".n;
                return "refresh";
              
            }
            if ($get["get"]) {
                return base64_decode($get["get"]);
              
            } else {
                return $r["url"];
            }
        }
    } elseif (preg_match("#(urlcorner.com)#is", $host)) {
      $r = base_short($url);
      $referer = "https://leaveadvice.com/";
      $node = executeNode($r["res"]);
      $link = $node["url"];
      if (!parse_url($link)["scheme"]) {
        return "refresh";
      }
      
      
      $cookie[] = $r["cookie"];
      parse_str(str_replace("?", "&", $link), $tk);
      $data = http_build_query(["safe_link" => $tk["tk"], "wpcls" => parse_url($link)["host"]]);
      $r = base_short($referer."conf1-srt", 1, $data, $referer, 0, $cookie);
      
      
      $link = $r["res"];
      if (!parse_url($link)["scheme"]) {
        return "refresh";
      }
      $cookie[] = $r["cookie"];
      parse_str(str_replace("?", "&", $link), $tk);
      $data = http_build_query(["safe_link" => $tk["tk"], "wpcls" => parse_url($link)["host"]]);
      $r = base_short($referer."conf2-srt", 1, $data, $referer, 0, $cookie);
      
      
      $link = $r["res"];
      if (!parse_url($link)["scheme"]) {
        return "refresh";
      }
      $cookie[] = $r["cookie"];
      $r = base_short($link, 0, 0, $referer, 0, $cookie);
      $cookie[] = $r["cookie"];
      parse_str(str_replace("?", "&", $link), $tk);
      
      $method = "hcaptcha";
          $cap = request_captcha($method,"c328fbe1-085c-4246-a274-6a11b4ae4cd7", $referer);
      $data = http_build_query(["safe_link" => $tk["tk"], 
      $method => $cap, "abv" => false, "adfl" => false
      
      ]);
      $r = base_short($referer."conf3-srt", 1, $data, $referer, 0, $cookie);
      L(60);
      #die(print_r($r));
      $link = $r["res"];
      if (!parse_url($link)["scheme"]) {
        return "refresh";
      }
      $cookie[] = $r["cookie"];
      //$cookie[] = array_reverse($cookie);
      $r = base_short($link, 0, 0, $referer, 0, $cookie);
      
      #$node = executeNode($r["res"]);
      print_r($r);
      

 
      #die(print_r($node));
    } elseif (preg_match("#(mgnet.xyz|1bit.space)#is", $host)) {
        $time = time() + $seconds;
        $r = base_short($url);
        $cookie[] = $r["cookie"];
        $link = explode("https:", parse_url($r["url"])["path"])[1];
        #die(print($link));
        if ($link) {
            $r1 = base_short($r["url"], 0, 0, $url, 0, $cookie);
           
            if ($r1["url"]) {
                base_short($r1["url"], 0, 0, $url, 0, $cookie);
                print h."success";
                r();
                $timer = $time - time();
                
                if ($timer >= 1) {
                    L($timer);
                }
                return "https:".$link;
            }
        } else {
            $fix = explode("url=", $url)[1];
            if (preg_match("#(http)#is", $fix)) {
                $timer = $time - time();
                
                if ($timer >= 1) {
                    L($timer);
                }
                return $fix;
            }
            return "refresh";
      }
    } elseif (preg_match("#(adrinolinks.com)#is", $host)) {
      $path = str_replace("/", "",parse_url($url)["path"]);
      $r = base_short($url,0, $data, $url);
      $url = $r["url"];
      $parse = parse_url($url);
      if ($parse["query"] !== "link=".$path) {
        return "refresh";
      }
      
      $cookie[] = $r["cookie"];
      $host = "https://".$parse["host"];
      $r = base_short($url, 0, 0, $host, 0, $cookie);
      $cookie[] = $r["cookie"];
      $data = "newwpsafelink4=".$path;
      $r = base_short($host,0, $data, $host, 0, $cookie);
      $hash = $r["url1"];
      for ($i = 0; $i < count($hash); $i++) {
        if (preg_match("#(open.php)#is", $hash[$i])) {
          $code = $hash[$i];
          break;
        }
      }
      if (!$code) {
        return "refresh";
      }
      $cookie[] = $r["cookie"];
      $r = base_short($host.$code, 0, 0, $host, 0, $cookie);
      if ($r["url"]) {
        L(20);
        print h."success";
        r();
        return $r["url"];
      }
    } elseif (preg_match("#(link4m.com)#is", $host)) {
        $parse = parse_url($url);
        $r = base_short(str_replace("link4m.com", "link4m.com/go", $url));
        $cookie[] = $r["cookie"];
        $method = "recaptchav2";
        $cap = request_captcha($method, $r[$method], $url);
        $data = http_build_query(
            array(
                "g-recaptcha-response" => $cap,
                "alias" => str_replace("/", "", $parse["path"])
            )
        );
        $r2 = base_short(str_replace($parse["path"], "/links/check-captcha", $url), 0, $data, 0, 0, $cookie)["json"];
        
        if ($r2->success == true) {
            L(15);
            return $r2->url;
        }
    } elseif (preg_match("#(adbx.pro|adbits.xyz|adbits.pro|v2p.icu)#is", $host)) {
        $r = base_short($url);
        $link = $r["url"];
        
        if (!preg_match("#(http)#is", $link)) {
            return "refresh";
        }
        $cookie[] = $r["cookie"];
        $r = base_short($link, 0, 0, 0, 0, $cookie);
        $link = $r["url"];
        
        if (!preg_match("#(http)#is", $link)) {
            return "refresh";
        }
        $cookie[] = $r["cookie"];
        $r = base_short($link, 0, 0, $link, 0, $cookie);
        $link = $r["url"];
        
        if (!preg_match("#(http)#is", $link)) {
            return "refresh";
        }
        $cookie[] = $r["cookie"];
        while(true) {
          
           # $cookie[] = array_reverse($cookie);
            $r = base_short($link, 0, 0, $link, 0, $cookie);
            $cookie[] = $r["cookie"];
            $t = $r["token_csrf"];
            $t4 = $r["token_csrf4"];
           # die(file_put_contents("instan.html", $r["res"]));
            #die(print_r($r));
            if (!$t[1][0]) {
                return "refresh";
                
            } elseif ($t[2][2] == 1) {

                if ($t4[1][0] == "antibot_number_0") {
                    $rsp = array(
                        $t4[1][0] => substr(preg_replace("/[^0-9]/", "", $t4[2][0]), 0, preg_replace("/[^0-9]/", "", $r["only"]))
                    );
                } else {
                    $method = "hcaptcha";
                    $cap = request_captcha($method, $r[$method], $link);
                    $rsp = array(
                        "g-recaptcha-response" => $cap,
                        "h-captcha-response" => $cap
                    );
                }
                $data = data_post($t, "two", $rsp);
                $r = base_short($link, 0, $data, $link, 0, $cookie);
                $cookie[] = $r["cookie"];
                
            } else {
                L(30);
                $data = data_post($t, "one");
                $r = base_short($link, 0, $data, $link, 0, $cookie);
                $cookie[] = $r["cookie"];
                $t = $r["token_csrf"];
               // print_r($r);
                if (!$t[1][1]) {
                  
                    if (preg_match("#(http)#is", $r["url"])) {
                        print h."success";
                        r();
                        return $r["url"];
                    }
                }
            }
            if (!preg_match("#(http)#is", $r["url"])) {
                return "refresh";
            }
        }
    } elseif (preg_match("#(tmearn.net)#is", $host)){
        $url = str_replace("tmearn.net/link", "blogmado.com", $url);
        $referer = "https://tmposts.com";
        $r = base_short($url, 0, 0, $referer);
        $link = $r["url"];
        
        if (!preg_match("#(http)#is", $link)) {
            return "refresh";
        }
        $cookie[] = $r["cookie"];
        $r = base_short($link, 0, 0, $link, 0, $cookie);
        $t = $r["token_csrf"];
        $t3 = $r["token_csrf3"];
        
        if (!$t[1][0]) {
          return "refresh";
        }
        $cookie[] = $r["cookie"];
        $method = "recaptchav2";
        $cap = request_captcha($method, $r[$method], $link);
        $rsp = array(
          "g-recaptcha-response" => $cap,
          $t[1][0] => $t[2][0]
        );
        $data = data_post($t3, "null", $rsp);
        $r = base_short($link, 0, $data, $link, 0, $cookie);
        $url8 = $r["url8"];
        
        if (!preg_match("#(http)#is", $url8)) {
            return "refresh";
        }
        return $url8;
    } elseif (preg_match("#(cxxxxcc)#is", $host)){
    
    } else {
      
        if ($separator) {
            return "skip";
            
        } else {
            return "refresh";
        }
    }
}


function query_data($data, $delete = 0, $plus = 0) {
    $query_data = [];

    foreach ($data[1] as $index => $name) {
        $data_name = explode('"', $name)[0];
        $array_count[] = $data_name;
        $value = explode('"', $data[2][$index])[0];
        $del = (string) $delete;
        
        if (array_count_values($array_count)[$data_name] >= 2) {
            break;
        }

        if ($delete) {
            if ($index == $del[0] || $index == $del[1] || $index == $del[2]) {
                $value = "";
            }
        }
        $query_data[$data_name] = $value;
            
        }
    
        if ($plus) {
            $query_data = array_merge($query_data, $plus);
        }
        return str_replace(["deleted", ""], "", http_build_query($query_data));
}

function data_post($t, $type, $array = 0) {
    if ($type ==  "null") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0]
        );
    } elseif ($type ==  "one") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1]
        );
    } elseif ($type ==  "two") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2]
        );
    } elseif ($type ==  "three") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3]
        );
    } elseif ($type ==  "four") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4]
        );
    } elseif ($type ==  "four2") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => "",
            explode('"', $t[1][2])[4] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4]
        );
    } elseif ($type ==  "five") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5]
        );
    } elseif ($type ==  "five2") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => "",
            explode('"', $t[1][2])[4] => $t[2][2],   
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5]
        );
    } elseif ($type ==  "six") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5],
            explode('"', $t[1][6])[0] => $t[2][6],
        );
    } elseif ($type ==  "seven") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5],
            explode('"', $t[1][6])[0] => $t[2][6],
            explode('"', $t[1][7])[0] => $t[2][7],
        );
    } elseif ($type ==  "eight") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5],
            explode('"', $t[1][6])[0] => $t[2][6],
            explode('"', $t[1][7])[0] => $t[2][7],
            explode('"', $t[1][8])[0] => $t[2][8],
        );
    } elseif ($type ==  "nine") {
        $data = array(
            explode('"', $t[1][0])[0] => $t[2][0],
            explode('"', $t[1][1])[0] => $t[2][1],
            explode('"', $t[1][2])[0] => $t[2][2],
            explode('"', $t[1][3])[0] => $t[2][3],
            explode('"', $t[1][4])[0] => $t[2][4],
            explode('"', $t[1][5])[0] => $t[2][5],
            explode('"', $t[1][6])[0] => $t[2][6],
            explode('"', $t[1][7])[0] => $t[2][7],
            explode('"', $t[1][8])[0] => $t[2][8],
            explode('"', $t[1][9])[0] => $t[2][9],
        );
    }
    if ($array) {
        $build = http_build_query(array_merge($data, $array));
    } else {
        $build = http_build_query($data);
    }
    return str_replace(["deleted", ""], "", $build);
}





function config() {
    $config[] = "fly";
    $config[] = "fly1";
    $config[] = "fly2";
    $config[] = "fly3";
    $config[] = "fly4";
    $config[] = "fly5";
    $config[] = "Linksfly";
    $config[] = "Linksfly1";
    $config[] = "linksfly2";
    $config[] = "URLHives";
    $config[] = "Linkfly";
    $config[] = "Linksfly.me";
    $config[] = "clickfly";
    $config[] = "Flyclick";
    $config[] = "clicksflyme";
    $config[] = "clicksfly.me";
    $config[] = "Urlfly";
    $config[] = "Urlsfly";
    $config[] = "Urlsfly.me";
    $config[] = "Shortfly";
    $config[] = "Shortsfly";
    $config[] = "Shortsfly.me";
    $config[] = "Wefly";
    $config[] = "Wefly.me";
    $config[] = "TryLink";
    $config[] = "Tri2lnk";
    $config[] = "Tri2link";
    $config[] = "Try2link";
    $config[] = "try2link.com";
    $config[] = "shorti";
    $config[] = "Shortiio";
    $config[] = "Shorti.io";
    $config[] = "Owlink";
    $config[] = "Owllink";
    $config[] = "owllink.net";
    $config[] = "owllink-net";
    $config[] = "illink";
    $config[] = "illink.net";
    $config[] = "Bird";
    $config[] = "BirdUrl";
    $config[] = "BirdURLs";
    $config[] = "Birdsurl";
    $config[] = "birdurls.com";
    $config[] = "birdsurls.com";
    $config[] = "Link1s";
    $config[] = "link1s.com";
    $config[] = "ShrinkEarn";
    $config[] = "shrinkearn-com";
    $config[] = "shrinkearn.com";
    $config[] = "SheraLinks";
    $config[] = "AdLink";
    $config[] = "adlink.click";
    $config[] = "Links.link";
    $config[] = "LinksFly.l";
    $config[] = "LinksFly.link";
    $config[] = "LinksFlylink";
    $config[] = "Lksfly";
    $config[] = "LFly";
    $config[] = "Chaininfo";
    $config[] = "chainfo";
    $config[] = "chainfo.xyz";
    $config[] = "Clkst";
    $config[] = "Clk.st";
    $config[] = "Insfly";
    $config[] = "insfly.pw";
    $config[] = "Adrevlinks";
    $config[] = "Ezshort";
    $config[] = "Ez4";
    $config[] = "Ez4Short";
    $config[] = "ez4shortx";
    $config[] = "Shrinkme";
    $config[] = "Shrink.me";
    $config[] = "linksly-co";
    $config[] = "linksly.co";
    $config[] = "Linksly";
    $config[] = "Linkslypw";
    $config[] = "Lsly";
    $config[] = "Shortest";
    $config[] = "Hatelink";
    $config[] = "Mitly";
    $config[] = "mitlyus";
    $config[] = "mitly.us";
    $config[] = "clkSH";
    $config[] = "clk";
    $config[] = "Clk-sh";
    $config[] = "clk.sh";
    $config[] = "Cut-Urls";
    $config[] = "Exe";
    $config[] = "exe-io";
    $config[] = "exeio";
    $config[] = "Exe.io";
    $config[] = "CPLink";
    $config[] = "Mtraffics";
    $config[] = "Megaurl";
    $config[] = "Megaurl.in";
    $config[] = "megaurl.io";
    $config[] = "Megafly";
    $config[] = "Megafly.in";
    $config[] = "Powclick";
    $config[] = "Earnify";
    $config[] = "Earnifypro";
    $config[] = "cuty-io";
    $config[] = "Cuty";
    $config[] = "Cuti.io";
    $config[] = "cuty.io";
    $config[] = "Cutyio";
    $config[] = "Usalink";
    $config[] = "usalink-io";
    $config[] = "usalink.io";
    $config[] = "Shrinkme";
    $config[] = "Shrinkme.io";
    $config[] = "shrinkme-io";
    $config[] = "shrinkmel";
    $config[] = "ShrinkmeLink";
    $config[] = "shrinkme.link";
    $config[] = "Beycoin";
    $config[] = "Goldly";
    $config[] = "goldly.cc";
    $config[] = "okoo";
    $config[] = "Forexly";
    $config[] = "forexlt.cc";
    $config[] = "Insurancely";
    $config[] = "insurancly";
    $config[] = "insurancly.cc";
    $config[] = "botfly";
    $config[] = "botfly.me";
    $config[] = "shrink.pe";
    $config[] = "limkdam";
    $config[] = "linkdam";
    $config[] = "linkdam.me";
    $config[] = "vielink";
    $config[] = "oii";
    $config[] = "oii.io";
    $config[] = "Bestlink";
    $config[] = "1short";
    $config[] = "1shorten.com";
    $config[] = "CCurl";
    $config[] = "ccurl.net";
    $config[] = "adbull";
    $config[] = "adbull.net";
    $config[] = "dashfree";
    $config[] = "dash-free";
    $config[] = "dash-free.com";
    $config[] = "tmearn";
    $config[] = "tmearn.net";
    $config[] = "hrshort";
    $config[] = "hrshort.com";
    $config[] = "exfoary";
    $config[] = "ex-foary";
    $config[] = "ex-foary.com";
    $config[] = "Clicksfly";
    $config[] = "Clicksfly.";
    $config[] = "clicksflycom";
    $config[] = "Clickflcom";
    $config[] = "Clicksfly.com";
    $config[] = "Genlink";
    $config[] = "ouo";
    $config[] = "revly";
    $config[] = "CryptoShorty";
    $config[] = "ctr";
    $config[] = "ctrsh";
    $config[] = "ctr.sh";
    $config[] = "todaynewsview";
    $config[] = "todaynewsview.store";
    $config[] = "easycut";
    $config[] = "easycut.io";
    $config[] = "easycut-io";
    $config[] = "fc";
    $config[] = "fclc";
    $config[] = "fc-lc";
    $config[] = "fc.lc";
    $config[] = "TeraFlyOwoo";
    $config[] = "TeraFlyOgoo";
    $config[] = "TeraFlyOmoo";
    $config[] = "TeraFlyOtoo";
    $config[] = "TeraFlyOroo";
    $config[] = "TeraFly/Owoo";
    $config[] = "TeraFly/Ogoo";
    $config[] = "TeraFly/Omoo";
    $config[] = "TeraFly/Otoo";
    $config[] = "TeraFly/Oroo";
    $config[] = "Panylink";
    $config[] = "Panyflay";
    $config[] = "PanyShort";
    $config[] = "panyshort.link";
    $config[] = "Cashlinko";
    $config[] = "viewfr-com";
    $config[] = "viewfr.com";
    $config[] = "viewfr";
    $config[] = "TinyGo-co";
    $config[] = "TinyGo";
    $config[] = "Tiny.go";
    $config[] = "Tiny.co";
    $config[] = "tinygo.co";
    $config[] = "wez-info";
    $config[] = "wez.info";
    $config[] = "wez";
   // $config[] = "DropLink";
    $config[] = "Oscut";
    $config[] = "KyShort";
    $config[] = "RevCut";
    $config[] = "RevCut.net";
    $config[] = "revly.click";
    $config[] = "URLCut";
    $config[] = "EazyUrl";
    $config[] = "FAHO";
    $config[] = "Faho.Us";
    $config[] = "ClockAd";
    $config[] = "ClockAds";
    $config[] = "Clockads.in";
    $config[] = "Bitss";
    $config[] = "Bitad";
    $config[] = "Bitad.org";
    $config[] = "LinkHives";
    $config[] = "Adbitfly";
    $config[] = "Adbitfly.com";
    $config[] = "ShtFly";
    $config[] = "Adshort";
    $config[] = "Adshort.co";
    $config[] = "clik.pw";
    #$config[] = "shortyearn";
    #$config[] = "shortyearn.com";
    //$config[] = "doshrink";
    //$config[] = "doshrink.com";*/
    $config[] = "linkjust.com";
    $config[] = "Linkjust";
    $config[] = "clks";
    $config[] = "clk";
    $config[] = "clkspro";
    $config[] = "clkspro";
    $config[] = "Clkpro";
    $config[] = "clks.pro";
    $config[] = "Loll";
    $config[] = "Lollty";
    $config[] = "Lollty.com";
    $config[] = "Cryptosh";
    $config[] = "Cryptosh.pro";
    $config[] = "FoxyLinks";
    $config[] = "10Short";
    $config[] = "10Short.com";
    $config[] = "cashurl.win";
    $config[] = "shortplus.xyz";
    $config[] = "urlpay";
    $config[] = "urlpay.in";
    $config[] = "1bitSpace";
    $config[] = "1bit.Space";
    $config[] = "Mgnet";
    $config[] = "Mgnet.xyz";
    $config[] = "reshort";
    $config[] = "rss";
    $config[] = "rs";
    $config[] = "rsshort";
    $config[] = "RSSshort";
    $config[] = "RSShorTcom";
    $config[] = "rsshort.com";
    $config[] = "Rsshorteasy";
    $config[] = "Paylinks";
    $config[] = "Paylinks.cloud";
    $config[] = "Shortsme";
    $config[] = "Shortsme.in";
    //$config[] = "adrinolinks";
    //$config[] = "adrinolinks.com";
    $config[] = "v2p";
    $config[] = "V2pay";
    $config[] = "V2PEasyShortlink";
    $config[] = "View2Pay";
    $config[] = "v2p.icu";
    $config[] = "adbits";
    $config[] = "adbits.pro";
    $config[] = "adbits.xyz";
    $config[] = "Urlcash";
    $config[] = "Urlcash.site";
    $config[] = "Short2money";
    $config[] = "Short2money.com";
    $config[] = "24pays";
    $config[] = "24pays.top";
    $config[] = "icutlink";
    $config[] = "icutlink.com";
    $config[] = "cutlink";
    $config[] = "adbx";
    $config[] = "adbx.pro";
    $config[] = "c2g";
    $config[] = "c2g.at";
    $config[] = "Freeltc.top";
    $config[] = "Freeltc";
    $config[] = "link4m";
    $config[] = "Adcorto";
    $config[] = "Adcorto.co";
    $config[] = "link4m.com";
    $config[] = "onelinks.nl";
    $config[] = "onelink";
    $config[] = "onelinks";
    $config[] = "teralinks";
    $config[] = "teralinks.in";
    $config[] = "EarnFey-Short";
    $config[] = "crypto-radio";
    $config[] = "SwiftLink";
    $config[] = "SwiftLink.com";
    $config[] = "inlinks";
    $config[] = "Earnow";
    $config[] = "shortino";
    $config[] = "sharecut";
    $config[] = "sharecut.io";
    $config[] = "share";
    $config[] = "mslinks";
    $config[] = "bonklinks";
    $config[] = "MSfaucet";
    $config[] = "linkz";
    $config[] = "flukesnips";
    $config[] = "Favelink";
    $config[] = "Favelink.top";
    $config[] = "coinfays";
    $config[] = "coinfays.com";
    $config[] = "wdu";
    $config[] = "addurl";
    $config[] = "freebonk.paycut.io";
    $config[] = "freebonk";
    $config[] = "flukesnips.com";
    $config[] = "flukesnips";
    $config[] = "Closead-blockerR";
    $config[] = "Closeadblockercut";
    $config[] = "CloseadBlockerf";
    $config[] = "Closeadblockercut";
    $config[] = "cutsme";
    $config[] = "cutsme.xyz";
    $config[] = "easylink";
    $config[] = "kotenkoshort";
    $config[] = "kotenkoshort.xyz";
    $config[] = "exashorts";
    $config[] = "exashorts.fun";
    $config[] = "zshort";
    $config[] = "zshort.io";
    $config[] = "btcut";
    $config[] = "btcut.io";
    return $config;
}