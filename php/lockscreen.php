<?php
        session_start();
        $usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>SAS Monitor</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                <!-- Bootstrap 3.3.5 -->
                <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
                <link href="../dist/css/jquery.gritter.css" rel="stylesheet">
                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
        </head>
        <body class="hold-transition lockscreen">
                <!-- Automatic element centering -->
                <div class="lockscreen-wrapper">
                        <div class="lockscreen-logo">
                                <a href="index2.html"><b>Lock</b>Screen</a>
                        </div>
                        <!-- User name -->
                        <div class="lockscreen-name" style="font-family:ubuntu; color:white;"><?php echo $_SESSION['nome_usuario'];?></div>
                        <!-- START LOCK SCREEN ITEM -->
                        <div class="lockscreen-item">
                                <!-- lockscreen image -->
                                <div class="lockscreen-image">
                                        <?php
                                                include ('../php/functionFoto.php');
                                                function fotoPerfil($foto) {
                                                        echo  "<img src=\"$foto\"class=\"img-circle\"height=\"128px\"width=\"128px\"\/><br>";
                                                }
                                                fotoPerfil($image);
                                        ?>
                                </div>
                                <!-- /.lockscreen-image -->
                                <!-- lockscreen credentials (contains the form) -->
                                <form class="lockscreen-credentials" id="confirmarUsuarioLogado" method="post">
                                        <div class="input-group">
                                                <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario;?>"  class="form-control" placeholder="Usuario">
                                                <input type="password" class="form-control" id="senha" name="senha" placeholder="password">
                                                <div class="input-group-btn">
                                                        <button class="btn" type="submit"><i class="fa fa-arrow-right text-muted"></i></button>
                                                </div>
                                        </div>
                                </form><!-- /.lockscreen credentials -->
                        </div><br><!-- /.lockscreen-item -->
                        <div class="help-block text-center" style="font-family:ubuntu; color:white;">
                                Digite sua senha para recuperar a sua sessão
                        </div>
                        <div class="text-center">
                                <a href="/chamados/">Ou entre com um usuário diferente</a>
                        </div>
                </div><!-- /.center -->
                <!-- jQuery 2.1.4 -->
                <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
                <!-- Bootstrap 3.3.5 -->
                <script src="../bootstrap/js/bootstrap.min.js"></script>
                <script src="../bootstrap/js/bootstrap.min.js"></script>
                <script src="../dist/js/jquery.gritter.min.js"></script>
                <script src="../dist/js/jquery.validate.min.js"></script>


                <script type="text/javascript">
                jQuery(document).ready(function () {
        //Script para logar via ajax
        $('#confirmarUsuarioLogado').validate({
                submitHandler: function( form ){
                        var dados = $( form ).serialize();
                        $.ajax({
                                type: "POST",
                                url: "/chamados/php/confirmarUsuarioLogado.php",
                                data: dados,
                                success: function( data ) {
                                        if (data == true) {
                                                jQuery.gritter.add({
                                                        title: 'Conexão Estabelecida !',
                                                        text: 'Redirecionando pagina..',
                                                        class_name: 'growl-success',
                                                        image: ../'dist/img/shield-ok-icon.png',
                                                        sticky: false,
                                                        time: '2000',
                                                });
                                                window.setTimeout("location.href='/chamados/pages/index.php'",1000);
                                        }else if(data == false) {
                                                jQuery.gritter.add({
                                                        title: 'Usuário ou Senha Incorretos',
                                                        text: 'Acesso Negado !',
                                                        class_name: 'growl-danger',
                                                        image: '../dist/img/shield-error-icon.png',
                                                        sticky: false,
                                                        time: '2000',
                                                });
                                                window.setTimeout("location.href='/chamados/'",1000);
                                        }
                                }
                        });
                        return false;
                }
        });
});</script>

</html>