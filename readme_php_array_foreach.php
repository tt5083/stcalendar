<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 style="background-color: lightgreen;">１．　一個字串陣列來儲存多個名字</h2>
    <h3>字串：$nameList = ['John', 'Christine', 'Teddy', 'Grace'];</h3>
    輸出內容==>>
    <?php
    $nameList = ['John', 'Christine', 'Teddy', 'Grace'];

    //以$i為$nameList這個陣列的索引值
    $i = 0;

    while ($i < count($nameList)) {
        echo "Name：" . $nameList[$i] . "\n";
        $i++;
    }
    unset($nameList);
    ?>
    <br /><br />
    <h2 style="background-color: lightgreen;">２．　一個分數列表來儲存幾位同學的分數</h2>
    <h3>字串：$scores = [77, 93, 82, 56];</h3>
    輸出內容==>>
    <?php
    $scores = [77, 93, 82, 56];
    $i = 0;

    while ($i < count($scores)) {
        echo $scores[$i] . " ";
        $i++;
    }
    unset($scores);
    ?>
    <br /><br />
    <h2 style="background-color: lightgreen;">３．　PHP的陣列儲存內容可以是單一的Value，也可以是Key和Value的搭配。</h2>
    <h2>　　　除了整數之外，也可以用字串來當作索引值</h2>
    <h3>字串：</h3>
    $scores['John']=77;<br>
    $scores['Christine'] = 93;<br>
    $scores['Teddy'] = 82;<br>
    $scores['Grace'] = 56;<br>
    </h3><br />
    輸出內容==>>
    <?php
    $scores['John'] = 77;
    $scores['Christine'] = 93;
    $scores['Teddy'] = 82;
    $scores['Grace'] = 56;

    echo $scores['John'] . " ";
    echo $scores['Christine'] . " ";
    echo $scores['Teddy'] . " ";
    echo $scores['Grace'];
    unset($scores);
    ?>
    <h2 style="background-color: lightgreen;">３．　foreach的用法。</h2>
    <h2>　　　索引陣列資料結構裡的元素</h2>
    <div style="text-align: center">
        <h3>字串：</h3>
        $scores['John'] = 77;<br />
        $scores['Christine'] = 93;<br />
        $scores['Teddy'] = 82;<br />
        $scores['Grace'] = 56;<br />
        </h3>
    </div>
    <br />
    <div style="text-align: center">輸出內容==>>
        <br />
        <?php
        $scores['John'] = 77;
        $scores['Christine'] = 93;
        $scores['Teddy'] = 82;
        $scores['Grace'] = 56;

        foreach ($scores as $name => $score) {
            echo "$name's score is $score\n" . "<br />";
        }
        unset($scores);
        ?>
    </div>
    <h3>
        foreach ($scores as $name => $score)<br />as: 關鍵字，表示將陣列元素賦值給後面的變數。
    </h3>
</body>

</html>