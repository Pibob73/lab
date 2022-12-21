<form action="" method="get" class="MyClass">
    <div class="form-group">
        <label for="number">number 1:</label>
        <input type="text" name="a" id="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="number">number 2:</label>
        <input type="text" name="b" id="number" class="form-control">
    </div>
    <div class="form-group">
        <table>
            <tr>
                <td>
                    <input type="radio" value = "+" name="*" id="+" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value = "-" name="*" id="-" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value = "*" name="*" id="*" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value = "/" name="*" id="/" class="buttonRadio">
                </td>
            </tr>
            <tr>
                <td>
                    <label>+</label>
                </td>

                <td>
                    <label>-</label>
                </td>

                <td>
                    <label>*</label>
                </td>

                <td>
                    <label>/</label>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <input type="submit" value="input" class="btn-primary">
    </div>
</form>>
<?php if(true):?>
<body>
<?php if(isset($_GET['a']) && isset($_GET['b'])){
    $b = (int)$_GET["b"];
    $a = (int)$_GET["a"];
    $operator = $_GET['*'];
    eval("\$b = $a $operator $b;");
    echo "Result:".$b;
}?>
</body>
<?php endif;?>