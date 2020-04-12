<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 21.04.17
 * Time: 17:03
 */

namespace app\models;


use app\modules\admin\models\Settings;
use SendGrid;

class Helper
{
    public static function sitename(){
        return Settings::findOne(1)->sitename;
    }

    public static function PreviewFormat($text, $limit){
        $text = htmlspecialchars_decode($text);
        $text = strip_tags(html_entity_decode($text));
        $array = explode(' ', $text);
        $array = array_splice($array, 0, $limit);
        $text = implode(' ', $array).'...';
        return '<p>'.$text.'</p>';
    }

    public static function generateID($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getCountry($ip){

        $url = "http://ipinfo.io/{$ip}";
        $ch1 = curl_init($url);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch1);
        curl_close($ch1);
        $info = json_decode( $content );
        $country = $info->country;

        $names        = file_get_contents( "http://country.io/names.json" );
        $decrypt     = json_decode( $names );

        $countryname = $decrypt->$country;

        return $countryname;
    }

    public static function RandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public static function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        self::rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }

    public static function convertDecimal($decimal){
        return rtrim((string) $decimal, '0');
    }

    public static function sendEmail($from, $sender, $subject, $to, $text){
        $from = new SendGrid\Email($from, $sender);
        $to = new SendGrid\Email(substr($to, 0, strpos($to, "@")), $to);
        $content = new SendGrid\Content("text/html", $text);
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $sg = new \SendGrid('key_goes_here');
        $sg->client->mail()->send()->post($mail);
    }

    public static function preview($text, $limit){
        $text = strip_tags($text, '<br>');
        $text = mb_substr($text, 0, $limit);
        return $text.'...';
    }

    public static function template($template, $name, $link, $password, $img){
        $template = file_get_contents(\Yii::$app->basePath.'/web/emails/'.$template.'.html');
        $replace = [
            '{{NAME}}' => $name,
            '{{LINK}}' => $link,
            '{{PASSWORD}}' => $password,
            '{{IMG}}' => $img
        ];
        $template = str_replace(array_keys($replace), $replace, $template);
        return $template;
    }

}