<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Registrar-se</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

            <?php
            
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];

                    $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");

                    if(mysqli_num_rows($verify_query) != 0){
                        echo "<div class='message'> <p>Esse e-mail já está em uso, tente outro e-mail</p></div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Voltar</button>";
                    }
                    else{
                        mysqli_query($conn, "INSERT INTO users(Username, Email, Age, Password) VALUES('$username','$email','$age','$password')") or die("Ocorreu um erro.");
                        echo "<div class='message'> <p>Nova conta criada com sucesso!</p></div><br>";
                        echo "<a href='index.php'><button class='btn'>Fazer login</button>";
                    }
                }else{

                
            
            ?>

            <header>Registrar-se</header>
            <form action="" method="POST">
                <div class="field input">
                    <label for="username">Nome de Usuário</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Idade</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Registrar" required>
                </div>
                <div class="links">
                    Já tem uma conta? <a href="index.php">Faça login.</a>
                </div>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>