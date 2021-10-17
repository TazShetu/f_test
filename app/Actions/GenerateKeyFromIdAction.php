<?php

namespace App\Actions;

class GenerateKeyFromIdAction
{
        public function handle($id)
        {
            if ($id < 16777216) {
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVY', mt_rand(1,3))), 1, 3).$id;
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVY', mt_rand(1,2))), 1, 2).$id;
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVY', mt_rand(1,1))), 1, 1).$id;
                } elseif ($string_length == 5) {
                    $key = 'Z'.$id;
                }
            } elseif ($id >= 16777216 && $id < 33554432) {
                $id = $id - 16777215;
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('BEHKNQTWZ', mt_rand(1,3))), 1, 3).$id;
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('BEHKNQTWZ', mt_rand(1,2))), 1, 2).$id;
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('BEHKNQTWZ', mt_rand(1,1))), 1, 1).$id;
                } elseif ($string_length == 5) {
                    $key = 'Z'.$id;
                }
            } else {
                $id = $id - 33554431;
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('CFILORUX', mt_rand(1,3))), 1, 3).$id;
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('CFILORUX', mt_rand(1,2))), 1, 2).$id;
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('CFILORUX', mt_rand(1,1))), 1, 1).$id;
                } elseif ($string_length == 5) {
                    $key = 'Z'.$id;
                }
            }
            return $key;
        }
}
