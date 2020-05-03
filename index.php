<!DOCTYPE html>
<html lang="en" class="theme-dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
  <title>Safadômetro</title>
</head>
<body>
<div class="header">
  <div class="header-right">
    <a onclick="toggleTheme()"><i class="fas fa-adjust"></i></a>
    <script>
        function setTheme(themeName) {
            localStorage.setItem('theme', themeName);
            document.documentElement.className = themeName;
        }

        function toggleTheme() {
            if (localStorage.getItem('theme') === 'theme-light') {
                setTheme('theme-dark');
            } else {
                setTheme('theme-light');
            }
        }

        (function () {
            if (localStorage.getItem('theme') === 'theme-light') {
                setTheme('theme-light');
            } else {
                setTheme('theme-dark');
            }
        })();
    </script>
  </div>
</div>
  <div class="text">
    <h1>SAFADÔMETRO</h1><br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam fuga ipsam iusto ducimus obcaecati voluptatibus incidunt corporis facere suscipit. Praesentium assumenda dolores nesciunt iure exercitationem? Omnis amet ipsam voluptatibus maiores!</p>
  </div>
  <div class="container">
    <div class="calculator">
      <p>Preencha com sua data de nascimento (DD/MM/AAAA).</p>
      <form id="safadometro" name="formteste" action="" method="post">
        <input name="dia" min="1" max="31" oninput="maxLengthCheck(this)" maxlength = "2" placeholder="Dia" type="number" value="<? echo $dia ?>" required/>
        <input name="mes" min="1" max="12" oninput="maxLengthCheck(this)" maxlength = "2" placeholder="Mês" type="number" value="<? echo $mes ?>" required/>
        <input name="ano" min="1900" max="2020" oninput="maxLengthCheck(this)" maxlength = "4" placeholder="Ano" type="number" value="<? echo $ano ?>" required/>
        <input name="calcular" class="button" type="submit" value="Ver Resultado"/>
        <input type="hidden" name="oculto" value="efetuar"/>
        <script>
          function maxLengthCheck(object)
          {
            if (object.value.length > object.maxLength)
              object.value = object.value.slice(0, object.maxLength)
          }
        </script>
      </form>
    </div>
    <div class="result">
      <h1>Resultado:</h1><br>
      <?php
      if ($_POST && $_POST["oculto"] == "efetuar") {
        $a     = $_POST["dia"];
        $b     = $_POST["mes"];
        $c     = $_POST["ano"];
        $sinal = $_POST["oculto"];
        switch ($sinal){
          case $sinal == "efetuar":
          $total = $b+($c/1000)*(50-$a);
          $anjo = 100 - ($b +($c/1000)*(50-$a));
          break;
        }
        echo "<div class='safado'><h3>Safado(a): <br />$total %</h3></div><br>";
        echo "<div class='santo'><h3>Anjo(a): <br />$anjo %</h3></div>";
      }
      ?>
    </div>
    <div class="footer">
      <p>© Filipe Moreno <i class="fa fa-code"></i> Feito com <i class="fas fa-heart"></i></p>
    </div>
  </div>
</body>
</html>