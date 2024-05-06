<?php
namespace App\Helper;

class Helper {
    public static function hexToRgb($hexValue) {
        $apiUrl = "https://api.hy-tech.my.id/api/hex-to-rgb?hex={$hexValue}";
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }

    public static function rgbToHex($rgbHexValue) {
        $apiUrl = "https://api.hy-tech.my.id/api/rgb-to-hex/{$rgbHexValue}";
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }

    public static function textToBinary($binaryValue) {
        $apiUrl = "https://api.hy-tech.my.id/api/text-to-binary?text={$binaryValue}";
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }

    public static function binaryToText($binaryTextValue) {
        $apiUrl = "https://api.hy-tech.my.id/api/binary-to-text?binary=" . urlencode($binaryTextValue);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $jsonData = curl_exec($ch);
        curl_close($ch);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }    
    
    public static function strengthPassword($strengthValue) {
        $apiUrl = "https://api.hy-tech.my.id/api/password-strength?password={$strengthValue}";
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }

    public static function textTobase64($base64Value) {
        $apiUrl = "https://api.hy-tech.my.id/api/text-to-base64?text={$base64Value}";
        $jsonData = file_get_contents($apiUrl);
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
        return json_decode($jsonData, true);
    }

    public static function chatbot($question) {
        $apiUrl = "https://api.hy-tech.my.id/api/gemini/" . urlencode($question);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $jsonData = curl_exec($ch);
        curl_close($ch);
    
        if ($jsonData === false) {
            return "Error: Unable to fetch data from the API.";
        }
    
        $response = json_decode($jsonData, true);
        return isset($response['text']) ? $response['text'] : "No answer found.";
    }
}
?>
