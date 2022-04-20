<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $path_to_file = asset('storage/csv') . '/phoneshop_san_pham.csv';

        $content = $this->LAM_read_csv($path_to_file);
        // $content = json_encode($content);
        // $this->structure($content);
        echo '[ <br>';
        foreach($content as $row) {
            echo '[';
            foreach($row as $key => $val) {
                if($key=='updated_at') {
                    echo "'" . $key . "' => '" . $val . "'";
                } else if(is_numeric($val)) {
                    echo "'" . $key . "' => " . $val . ', ';
                } else {
                    echo "'" . $key . "' => '" . $val . "', ";
                }
            }
            echo '], <br>';
        }
        echo '<br>]';
        // echo __DIR__;
        // echo $_SERVER['DOCUMENT_ROOT'];
        
    }

    public function LAM_read_csv($path_to_file)
    {
        $content = [];
        $index = [];
        $raw_data = fopen($path_to_file, 'r');
        $line = 0;

        //Handle CSV content
        while (!feof($raw_data)) {
            // $dong = fgets($raw_data);
            // $row = explode(',', $dong, 26);

            $row = fgetcsv($raw_data);

            if($line == 0) {
                $index = $row;
            } else {
                $column = count($index);
                $row_content = [];
                for($i = 0 ; $i < $column ; $i++) {
                    if( count($row) ==0) continue;
                    $row_content[$index[$i]] = $row[$i];
                }
                $content[] = $row_content;
            }
            $line++;
        }

        fclose($raw_data);

        return $content;
    }
    public function structure($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    public function editor()
    {
        return view('test.test');
    }
}
