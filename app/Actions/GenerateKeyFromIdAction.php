<?php

namespace App\Actions;

class GenerateKeyFromIdAction
{
        public function handle($id)
        {
            if ($id < 16777216) {
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVYHNTZFIO', mt_rand(1,4))), 1, 4).strtoupper(dechex($id));
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVYHNTZFIO', mt_rand(1,3))), 1, 3).strtoupper(dechex($id));
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVYHNTZFIO', mt_rand(1,2))), 1, 2).strtoupper(dechex($id));
                } elseif ($string_length == 5) {
                    $key = substr(str_shuffle(str_repeat('ADGJMPSVYHNTZFIO', mt_rand(1,1))), 1, 1).strtoupper(dechex($id));
                }
            } elseif ($id >= 16777216 && $id < 33554432) {
                $id = $id - 16777215;
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('BEKQW', mt_rand(1,4))), 1, 4).strtoupper(dechex($id));
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('BEKQW', mt_rand(1,3))), 1, 3).strtoupper(dechex($id));
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('BEKQW', mt_rand(1,2))), 1, 2).strtoupper(dechex($id));
                } elseif ($string_length == 5) {
                    $key = substr(str_shuffle(str_repeat('BEKQW', mt_rand(1,1))), 1, 1).strtoupper(dechex($id));
                }
            } else {
                $id = $id - 33554431;
                $string_length = strlen(strtoupper(dechex($id)));
                if ($string_length == 2) {
                    $key = substr(str_shuffle(str_repeat('CLRUX', mt_rand(1,4))), 1, 4).strtoupper(dechex($id));
                } elseif ($string_length == 3) {
                    $key = substr(str_shuffle(str_repeat('CLRUX', mt_rand(1,3))), 1, 3).strtoupper(dechex($id));
                } elseif ($string_length == 4) {
                    $key = substr(str_shuffle(str_repeat('CLRUX', mt_rand(1,2))), 1, 2).strtoupper(dechex($id));
                } elseif ($string_length == 5) {
                    $key = substr(str_shuffle(str_repeat('CLRUX', mt_rand(1,1))), 1, 1).strtoupper(dechex($id));
                }
            }
            return $key;
        }
}
