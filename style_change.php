<html>
<head>
    <?php
    //ccsのスタイルの設定
    //もしGETメソッドで値を取得できたら変更
    $style = "red";
    if ($_GET["style"]) {
        $style = $_GET["style"];
    }

    //cssのファイルをcssディレクトリから取り出して配列に格納
    $files = array();
    #stylesディレクトリを開く#
    $dh = opendir("css");
    while (false !== ($file = readdir($dh))) {
        #.ccsのファイルがあったら、.cssを削除し、配列に入れる#
        if (preg_match("/[.]css$/", $file)) {
            $file = preg_replace("/[.]css$/", "", $file);
            $files[] = $file;
        }
    }
    ?>
    <!--スタイルの指定-->
    <style type="text/css" media="all">@import url(css/<?php echo($style); ?>.css);</style>
</head>
<body>
    <h3><?php echo($style)?>のスタイルが選択されています</h3>
    <br>
    <div></div>
    <br>
    <form method="get">
        <select name="style">
            <?php foreach ($files as $file) { ?>
                    <option value="<?php echo($file); ?>"
                    <?php echo($file == $style ? "selected" : ""); ?>
                    <?php //間にHTML要素が入るとしたのoptionの閉カッコが認識されなくなってしまう?>
                    >
                    <?php echo($file); ?></option>
            <!--foreachの閉かっこ-->
            <?php } ?>
        </select>
        <input type="submit" value="選択">
    </form>
</body>
</html>

