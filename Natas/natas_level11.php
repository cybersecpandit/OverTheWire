<?php

$defaultdata = array( "showpassword"=>"no", "bgcolor"=>"#ffffff");

function xor_encrypt($in, $key) {
    $key = $key;
    $text = $in;
    $outText = '';

    // Iterate through each character
    for($i=0;$i<strlen($text);$i++) {
    $outText .= $text[$i] ^ $key[$i % strlen($key)];
    }

    return $outText;
}

$cookie = base64_decode('MGw7JCQ5OC04PT8jOSpqdmkgJ25nbCorKCEkIzlscm5oKC4qLSgubjY=');
$known_plaintext = json_encode($defaultdata);

print "Known Plain Text - to get the KEY\n";
$actual_key = xor_encrypt($known_plaintext, $cookie);
print "$actual_key\n";

$new_data = array( "showpassword"=>"yes", "bgcolor"=>"#ffffff");
$new_plaintext = json_encode($new_data);
$new_ciphertext = base64_encode(xor_encrypt($new_plaintext, $actual_key));

print "$new_ciphertext\n";

?>