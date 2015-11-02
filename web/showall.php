<p>
    <b>Table <i>eng_word</i>:</b>
</p>
<table border='1'>
    <tr id="table_header">
        <td><b>#</b></td>
        <td><b>eng_word</b></td>
        <td><b>#</b></td>
        <td><b>ua_word</b></td>
        <td><b>
                <small>edit</small>
            </b></td>
    </tr>
    <?php
    //var_dump($_POST['response']);
    //var_dump($response);

    $arr = $response;
    print "<tr>";
    $eng_word = '';
    $id_ua = 0;
    $id = 0;
    foreach ($arr as $key => $value) {
        foreach ($arr[$key] as $keyfield => $valuefield) {
            if ($keyfield == 'id_en') {
                print "<td>" . $valuefield . " </td>";
            }
            if ($keyfield == 'eng_word') {
                $eng_word = $valuefield;
                print "<td>" . $valuefield . " </td>";
            }
            if ($keyfield == 'id_ua') {
                $id_ua = $valuefield;
            }
            if ($keyfield == 'id_1') {
                print "<td>" . $valuefield . " </td>";
                $id = $valuefield;
            }
            if ($keyfield == 'ua_word') {
                print "<td>" . $valuefield . " </td>";
                echo "<td><a href=edit.php?update=1&eng_word=$eng_word&id_ua=$id_ua&id_1=$id&ua_word=$valuefield  style='color: olivedrab' title='edit translation'>edit</a></td>";
            }
        };
        print "</tr>";
    }
    ?>
</table>