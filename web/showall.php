<p>
    <b>Table <i>eng_word</i>:</b>
</p>
<table border='1'>
    <tr id="table_header">
        <td><b>#</b></td>
        <td><b>eng_word</b></td>
    </tr>
    <?php
    //var_dump($_POST['response']);
    //var_dump($response);

    $arr = $response;
    print "<tr>";
    foreach ($arr as $key => $value) {
        foreach ($arr[$key] as $keyfield => $valuefield) {
            print "<td>" . $valuefield . " </td>";
        };
        print "</tr>";
    }
    ?>
</table>