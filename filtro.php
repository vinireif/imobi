<?php include("pages/includes/connect.php");

if(!isset($_POST['codigoImovel']) || !isset($_POST["finalidade"]) || 
   !isset($_POST['tipo']) || !isset($_POST['estado']) || !isset($_POST['cidade']) ||
   !isset($_POST['valorMin']) || !isset($_POST['valorMax']) || !isset($_POST['qtdQuartos']) || 
   !isset($_POST['qtdSuites']) || !isset($_POST['qtdBanheiros']) || !isset($_POST['qtdVagaGaragem'])){
   
	header("location: index.php");
}

$codigoImovel = $_POST["codigoImovel"];
$finalidade = $_POST["finalidade"];
$tipo = $_POST["tipo"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$valorMin = $_POST["valorMin"];
$valorMax = $_POST["valorMax"];
$qtdQuartos = $_POST["qtdQuartos"];
$qtdSuites = $_POST["qtdSuites"];
$qtdBanheiro = $_POST["qtdBanheiros"];
$qtdVagaGaragem = $_POST["qtdVagaGaragem"];

$select = "SELECT * FROM imovel WHERE ";

if(strpos($codigoImovel, 'Todos')){
	//$select .= " codigo=$codigoImovel AND ";
	echo $codigoImovel;
}

if($finalidade !== "Todos"){
	//$select .= "idFinalidade in =$codigoImovel AND ";
	
	//campo1 in ('Venda', 'Aluguel'...);
}
//$result = mysqli_query($conexao, "SELECT * FROM imovel WHERE id=$id");
//$anuncio = mysqli_fetch_array($result, MYSQLI_NUM);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Imobi - Pesquisa</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">		
    <link href="dist/css/shop-homepage.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/slider/css/slider.css" rel="stylesheet">
    <link href="dist/css/material-design-switch.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Imobi</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!---------- INICIO FILTRO ----------->
            <div class="col-md-3">
                
				<div class="panel panel-default">
					<div class="panel-heading">Finalidade</div>
					<div class="panel-body">
						<select name="idTipo" data-live-search="true" class="form-control selectpicker" id="comboFinalidade" disabled>
							<?php
							$result = mysqli_query($conexao, "SELECT * FROM finalidade WHERE id=$anuncio[12]");
							while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
								echo "<option value='$row[1]'>$row[1]</option>";
							}
							?>
						</select>                                
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Tipo</div>
					<div class="panel-body">
						<select name="idTipo" data-live-search="true" class="form-control selectpicker" id="comboTipo" disabled>
							<?php
							$result = mysqli_query($conexao, "SELECT * FROM tipo WHERE id=$anuncio[13]");
							while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
								echo "<option value='$row[1]'>$row[1]</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Localidade</div>
					<div class="panel-body">

						<label for="estado">Estado:</label>
						<select name="idEstado" data-live-search="true" class="form-control selectpicker" id="comboEstado" disabled>
							<?php
							$result = mysqli_query($conexao, "SELECT c.nome,e.nome FROM imovel i, cidades c, estados e WHERE i.idCidade = c.id AND c.estados_id = e.id AND i.idCidade = $anuncio[4]");
							
							while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								echo "<option value='$row[1]'>$row[1]</option>";
							}
							?>	                                
						</select>								
						<br>
						<br>
						<label for="cidade">Cidade:</label>
						<select name="idCidade" data-live-search="true" class="form-control selectpicker" id="comboCidade" disabled>                                
							<?php
							$result = mysqli_query($conexao, "SELECT c.nome,e.nome FROM imovel i, cidades c, estados e WHERE i.idCidade = c.id AND c.estados_id = e.id AND i.idCidade = $anuncio[4]");
							
							while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
								echo "<option value='$row[0]'>$row[0]</option>";
							}
							?>								
						</select>
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">Cômodos</div>
					<div class="panel-body">                            

						<!--<label for="qtdQuartos">Quartos</label>-->
						<select class="form-control selectpicker" id="qtdQuartos" disabled>
							<option><?= $anuncio[14]?></option>                                  
						</select>
						<br>
						<br>
						<!--<label for="qtdSuites">Suítes</label>-->
						<select class="form-control selectpicker" id="qtdSuites" disabled>
							<option><?= $anuncio[15]?></option>        
						</select>
						<br>
						<br>
						<!--<label for="qtdBanheiros">Banheiros</label>-->                             
						<select class="form-control selectpicker" id="qtdBanheiros" disabled>
							<option><?= $anuncio[16]?></option>                                   
						</select>
						<br>
						<br>
						<!--<label for="qtdVagaGaragem">Vagas de garagem</label>-->
						<select class="form-control selectpicker" id="qtdVagaGaragem" disabled>
							<option><?= $anuncio[17]?></option>                               
						</select>
					</div>
				</div>
				
				<button type="button" class="btn btn-primary pull-right" onclick="window.location='index.php'">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					Voltar
				</button>
				
            </div>

            <!---------- FINAL FILTRO ----------->


            <div class="col-md-9">

                <div class="thumbnail">
                    <!--<img class="img-responsive" src="http://placehold.it/800x300" alt="">-->
                    <div class="row carousel-holder">

                        <div class="col-md-12">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                    <div class="item">
                                        <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="caption-full">
                        <h4 class="pull-right">R$ <?= $anuncio[7]?></h4>
                        <h4><a href="#"><?= $anuncio[2]?></a>
                        </h4>                        
                        <p><?= $anuncio[3]?></p>                        
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/metisMenu/metisMenu.min.js"></script>        
	<script src="dist/slider/js/bootstrap-slider.js"></script> 
	<script src="vendor/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>        

	<script language="javascript">
		$(document).ready(function () {
                    
                    $('.combobox').combobox();


		})
	</script>

</body>

</html>
