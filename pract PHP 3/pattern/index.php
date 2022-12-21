<form action="" method="get" class="MyClass">
    <div class="form-group">
        <label for="number">number 1:</label>
        <input type="text" name="a" id="number" class="form-control">
        <label for="number">expression:</label>
        <input type="text" name="c" id="number" class="form-control">
    </div>
    <div class="form-group">
        <label for="number">number 2:</label>
        <input type="text" name="b" id="number" class="form-control">
    </div>
    <div class="form-group">
        <table>
            <tr>
                <td>
                    <input type="radio" value="+" name="*" id="+" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value="-" name="*" id="-" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value="*" name="*" id="*" class="buttonRadio">
                </td>
                <td>
                    <input type="radio" value="/" name="*" id="/" class="buttonRadio">
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
<body>
<?php
if (isset($_GET['a']) && isset($_GET['b'])) {
    $number1 = (int)$_GET["b"];
    $number2 = (int)$_GET["a"];
    $operator = $_GET['*'];
    eval("\$number1 = $number1 $operator $number2;");
    echo "Result:" . $number1;
}
if (isset($_GET['c'])) {
    $leftOperand = "";
    $rightOperand = "";
    foreach (explode(" ", $_GET['c']) as $letter) {
        if ($letter === '=') break;
        $leftOperand .= $letter;
    }
    foreach (array_reverse(explode(" ", $_GET['c'])) as $letter) {
        if ($letter === '=') break;
        $rightOperand .= $letter;
    }
    $leftOperandInt = 0;
    $rightOperandInt = 0;
    eval("\$leftOperandInt = $leftOperand;");
    eval("\$rightOperandInt = $rightOperand;");
    if ($leftOperandInt === $rightOperandInt) {
        echo "Expression: True";
    } else echo "Expression: False";
}
?>
</body>
