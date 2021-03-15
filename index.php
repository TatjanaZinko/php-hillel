<?php
/*
 * First Task
 */
function factory(... $functions) {
    foreach ($functions as $func) {
        $func();
    }
}

factory(function() {
        echo 'test1<br>';
    },
    function() {
        echo 'test2<br>';
    },
    function() {
        echo 'test3<br>';
    });

/*
 * Second Task
 */

$file = "resource.txt";
$content = [1, 'key'=>'test2','test3'];

function write_csv(string $file_name, array $text) {
    $current_file = fopen($file_name, "w");
    fputcsv ($current_file, $text);
    fclose($current_file);
}
write_csv($file, $content);

/*
 * Third Task
 */
function read_csv(string $file_name) {
    $current_file = fopen($file_name, "r");
    $data = fgetcsv ($current_file, 1000);
    fclose($current_file);
    var_export($data);
    return $data;

}
read_csv($file);
?>
