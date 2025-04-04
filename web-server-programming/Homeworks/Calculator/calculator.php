<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Калькулятор</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: black;
        }

        .calculator {
            background-color: grey;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .display {
            margin-bottom: 10px;
        }

        .display input {
            width: 90%;
            padding: 10px;
            font-size: 18px;
            text-align: right;
            border-color: black;
            border-radius: 5px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 5px;
        }

        .buttons button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #ff9800;
            cursor: pointer;
        }

        .buttons button:hover {
            background-color: #ddd;
        }

        .buttons .operator {
            background-color: #ff9800;
            color: black;
        }

        .buttons .operator:hover {
            background-color: #e68a00;
        }

        .buttons .equal {
            background-color: green;
            color: black;
            grid-column: span 2;
            
        }

        .buttons .equal:hover {
            background-color: green;
        }

        .buttons .clear {
            background-color: red;
            color: black;
        }

        .buttons .clear:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form method="post">
            <div class="display">
                <input type="text" name="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : '0'; ?>" readonly>
            </div>
            <div class="buttons">
                <button type="button" onclick="appendToDisplay('7')">7</button>
                <button type="button" onclick="appendToDisplay('8')">8</button>
                <button type="button" onclick="appendToDisplay('9')">9</button>
                <button type="button" class="operator" onclick="appendToDisplay('/')">/</button>
                <button type="button" onclick="appendToDisplay('4')">4</button>
                <button type="button" onclick="appendToDisplay('5')">5</button>
                <button type="button" onclick="appendToDisplay('6')">6</button>
                <button type="button" class="operator" onclick="appendToDisplay('*')">*</button>
                <button type="button" onclick="appendToDisplay('1')">1</button>
                <button type="button" onclick="appendToDisplay('2')">2</button>
                <button type="button" onclick="appendToDisplay('3')">3</button>
                <button type="button" class="operator" onclick="appendToDisplay('-')">-</button>
                <button type="button" onclick="appendToDisplay('0')">0</button>
                <button type="button" onclick="appendToDisplay('.')">.</button>
                <button type="submit" class="equal" name="calculate">=</button>
                <button type="button" class="operator" onclick="appendToDisplay('+')">+</button>
                <button type="submit" class="clear" name="clear">C</button>
            </div>
        </form>
    </div>
    <script>
        function appendToDisplay(value) {
            const display = document.querySelector('input[name="display"]');
            if (display.value === '0' && value !== '.') {
                display.value = value;
            } else {
                display.value += value;
            }
        }
    </script>

    <?php
    if (isset($_POST['calculate'])) {
        $expression = $_POST['display'];
        $result = calculate($expression);
        echo '<script>document.querySelector("input[name=\'display\']").value = "' . $result . '";</script>';
    }

    if (isset($_POST['clear'])) {
        echo '<script>document.querySelector("input[name=\'display\']").value = "0";</script>';
    }


    function calculate($expression) {

        $tokens = tokenize($expression);

        $rpn = shuntingYard($tokens);

        $result = evaluateRPN($rpn);

        return $result;
    }


    function tokenize($expression) {
        $tokens = preg_split('/([\+\-\*\/\(\)])/', $expression, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $tokens = array_map('trim', $tokens);
        $tokens = array_filter($tokens);

        return $tokens;
    }

    function shuntingYard($tokens) {
      $outputQueue = [];
      $operatorStack = [];
      $precedence = [
          '+' => 2,
          '-' => 2,
          '*' => 3,
          '/' => 3
      ];

      foreach ($tokens as $token) {
          if (is_numeric($token)) {
              $outputQueue[] = $token;
          } elseif (isset($precedence[$token])) {
              while (!empty($operatorStack) && isset($precedence[$operatorStack[count($operatorStack) - 1]]) && $precedence[$token] <= $precedence[$operatorStack[count($operatorStack) - 1]]) {
                  $outputQueue[] = array_pop($operatorStack);
              }
              $operatorStack[] = $token;
          } elseif ($token == '(') {
              $operatorStack[] = $token;
          } elseif ($token == ')') {
              while (!empty($operatorStack) && $operatorStack[count($operatorStack) - 1] != '(') {
                  $outputQueue[] = array_pop($operatorStack);
              }
              array_pop($operatorStack); 
          }
      }

      while (!empty($operatorStack)) {
          $outputQueue[] = array_pop($operatorStack);
      }

      return $outputQueue;
    }

    function evaluateRPN($rpn) {
        $stack = [];

        foreach ($rpn as $token) {
            if (is_numeric($token)) {
                $stack[] = $token;
            } else {
                $operand2 = array_pop($stack);
                $operand1 = array_pop($stack);

                switch ($token) {
                    case '+':
                        $stack[] = $operand1 + $operand2;
                        break;
                    case '-':
                        $stack[] = $operand1 - $operand2;
                        break;
                    case '*':
                        $stack[] = $operand1 * $operand2;
                        break;
                    case '/':
                        if ($operand2 == 0) {
                            return "Error: Division by zero";
                        }
                        $stack[] = $operand1 / $operand2;
                        break;
                }
            }
        }

        return array_pop($stack);
    }


    ?>
</body>
</html>