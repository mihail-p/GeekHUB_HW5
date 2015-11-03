<?php
if (count($response)>=1) {
    ?>
    <p>
        <b>Find <i>eng_word</i>:</b>
    </p>

    <table border='1'>
        <tr id="table_header">
            <td>eng word</td>
            <td>ua/ru word</td>
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
                }
                if ($keyfield == 'eng_word') {
                    $eng_word = $valuefield;
                    print "<td><b>" . $valuefield . " </b></td>";
                }
                if ($keyfield == 'id_ua') {
                    $id_ua = $valuefield;
                }
                if ($keyfield == 'id_1') {
                    $id = $valuefield;
                }
                if ($keyfield == 'ua_word') {
                    print "<td>" . $valuefield . " </td>";
                }
            };
            print "</tr>";
        }
        ?>
    </table>
    Add one more translation
    <form method="POST" action="./view/addOne.php">
        <input type="hidden" name="id_1" value="<?php echo $id; ?>">
        <input type="submit" value="add">
    </form>
    <?php
} else {
    echo '<p>word not found</p>';
}
