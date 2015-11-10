<p>
    <b>Table <i>eng_word</i>:</b>
</p>
<table border='1'>
    <tr id="table_header">
        <th><b>#</b></th>
        <th><b>eng word</b></th>
        <th><b>#</b></th>
        <th><b>ua/ru word</b></th>
        <th><b>example</b></th>
        <th><b>
                <small>edit</small>
            </b>
        </th>
    </tr>
    <?php
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
                $ua_word = $valuefield;
            }
            if ($keyfield == 'example') {
                print "<td>" . $valuefield . " </td>";
                $example = $valuefield;

                echo '<td><a href="./view/edit.php?action=update&eng_word='.$eng_word.'&id_ua='.$id_ua.'&id_1='.$id.'&ua_word='.$ua_word.'&example='.urlencode($example).'" style=\'color: olivedrab\' title=\'edit translation\'>edit</a></td>';
            }


        };
        print "</tr>";
    }
    ?>
</table>
<form method="post" action="../index.php">
    <p>Remove <i>english</i> word with id:
        <input type="hidden" name="action" value="remove">
        <input type="text" name="id_en" maxlength="2" size="2">
        <input type="submit" value="remove">
    </p>
</form>