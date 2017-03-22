<?php include("pages/includes/connect.php") ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh">
        <title>SB Admin 2</title>

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">		
        <link href="dist/css/shop-homepage.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="dist/slider/css/slider.css" rel="stylesheet">
        <link href="dist/css/material-design-switch.css" rel="stylesheet">
        <link href="vendor/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

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
                    <a class="navbar-brand" href="#">Imobi</a>
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
                        <li>
                            <a href="pages/login.php">Login</a>
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
                    <form id="form" action="filtro.php" method="POST">
					
						<div class="panel panel-default">
                            <div class="panel-heading">Código do imóvel</div>
                            <div class="panel-body">
                                <select name="codigoImovel" data-live-search="true" class="form-control selectpicker" id="codigoImovel" multiple>
                                    <option value='Todos' selected>Todos</option>
                                    <?php
                                    $result = mysqli_query($conexao, "SELECT codigo FROM imovel ORDER BY codigo");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                        echo "<option name='codigoImovel' value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>                                
                            </div>
                        </div>
					
                        <div class="panel panel-default">
                            <div class="panel-heading">Finalidade</div>
                            <div class="panel-body">
                                <select name="finalidade" data-live-search="true" class="form-control selectpicker" id="finalidade" multiple>
                                    <option value='Todos' selected>Todos</option>
                                    <?php
                                    $result = mysqli_query($conexao, "SELECT id, descricao FROM finalidade ORDER BY descricao");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                        echo "<option name='finalidade' value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>                                
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Tipo</div>
                            <div class="panel-body">
                                <select name="tipo" data-live-search="true" class="form-control selectpicker" id="tipo" multiple>
                                    <option value='Todos' selected>Todos</option>
                                    <?php
                                    $result = mysqli_query($conexao, "SELECT id, descricao FROM tipo ORDER BY descricao");
                                    while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
                                        echo "<option name='tipo' value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Estado / Cidade</div>
                            <div class="panel-body">

                                <label for="estado">Estado:</label>
                                <select name="estado" data-live-search="true" class="form-control selectpicker" id="estado">
                                    <option value="" selected>Selecione um Estado</option>
                                    <?php
                                    $result = mysqli_query($conexao, "SELECT id, nome FROM estados");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                        echo "<option name='estado' value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                                </select>								
                                <br>
                                <br>
                                <label for="cidade">Cidade:</label>
                                <select name="cidade" data-live-search="true" class="form-control selectpicker" id="cidade">
                                    <option value="0" selected>Selecione uma Cidade</option>
                                    <!-- Ajax -->
                                </select>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Valor</div>
                            <div class="panel-body">                           
                                <!-- <div class="slider" style="width: 100%;"></div> -->
                                <label for="valorMin">De:</label>
                                <input name="valorMin" id="valorMin" type="number" class="form-control" placeholder="De" min="0" step=".001" value="0">
                                <br>
                                <label for="valorMax">Até:</label>
                                <input name="valorMax" id="valorMax" type="number" class="form-control" placeholder="Até" min="0" step=".001" value="10.000">
                            </div>                        
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Cômodos</div>
                            <div class="panel-body">                            
                                
                                <!--<label for="qtdQuartos">Quartos</label>-->
                                <select name="qtdQuartos" class="form-control selectpicker" id="qtdQuartos">
                                    <option name="qtdQuartos" selected>Todos</option>
                                    <option name="qtdQuartos">1</option>
                                    <option name="qtdQuartos">2</option>
                                    <option name="qtdQuartos">3</option>
                                    <option name="qtdQuartos">4+</option>                                 
                                </select>								
                                <br>
                                <br>
								<!--<label for="qtdSuites">Suítes</label>-->
                                <select name="qtdSuites" class="form-control selectpicker" id="qtdSuites">
                                    <option name="qtdSuites" selected>Todos</option>
                                    <option name="qtdSuites">1</option>
                                    <option name="qtdSuites">2</option>
                                    <option name="qtdSuites">3</option>
                                    <option name="qtdSuites">4+</option>                                 
                                </select>
                                <br>
                                <br>
                                <!--<label for="qtdBanheiros">Banheiros</label>-->                             
                                <select name="qtdBanheiros" class="form-control selectpicker" id="qtdBanheiros">
                                    <option name="qtdBanheiros" selected>Todos</option>
                                    <option name="qtdBanheiros">1</option>
                                    <option name="qtdBanheiros">2</option>
                                    <option name="qtdBanheiros">3</option>
                                    <option name="qtdBanheiros">4+</option>                                 
                                </select>
                                <br>
                                <br>
                                <!--<label for="qtdVagaGaragem">Vagas de garagem</label>-->
                                <select name="qtdVagaGaragem" class="form-control selectpicker" id="qtdVagaGaragem">
                                    <option name="qtdVagaGaragem" selected>Todos</option>
                                    <option name="qtdVagaGaragem">1</option>
                                    <option name="qtdVagaGaragem">2</option>
                                    <option name="qtdVagaGaragem">3</option>
                                    <option name="qtdVagaGaragem">4+</option>                                 
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							Filtrar
						</button> 
                    </form>
                </div>
				
                <!---------- FINAL FILTRO ----------->
				
                <!---------- INICIO CAROUSEL ----------->
                <div class="col-md-9">

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
                    <!---------- FINAL CAROUSEL ----------->

                    <!---------- INICIO POPULAR ANUNCIOS ----------->
                    <div class="row">
                        <?php
                        $result = mysqli_query($conexao, "SELECT * FROM imovel");
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
echo "                                <div class='col-sm-4 col-lg-4 col-md-4'>";
echo "                                    <div class='thumbnail'>";
echo "                                        <img src='imagens/fundoIndexTeste.png' alt=''>";
echo "                                        <div class='caption'>";
echo "                                            <h4 class='pull-right'>R$ $row[7]</h4>";
echo "                                            <h4><a href='detalhes.php?id=$row[0]'>$row[2]</a>";
echo "                                            </h4>";
echo "                                            <p>$row[3]</p>";
echo "                                        </div>";
echo "                                        <div class='ratings'>";
echo "                                            <p class='pull-right'>15 reviews</p>";
echo "                                            <p>";
echo "                                                <span class='glyphicon glyphicon-star'></span>";
echo "                                                <span class='glyphicon glyphicon-star'></span>";
echo "                                                <span class='glyphicon glyphicon-star'></span>";
echo "                                                <span class='glyphicon glyphicon-star'></span>";
echo "                                                <span class='glyphicon glyphicon-star'></span>";
echo "                                            </p>";
echo "                                        </div>";
echo "                                    </div>";
echo "                                </div>";
                        }
                        ?>
                    </div>
                    <!---------- FINAL POPULAR ANUNCIOS ----------->
                    
                </div>
            </div>
        </div>        

        <div class="container">
            
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </footer>
            
        </div>
        
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/metisMenu/metisMenu.min.js"></script>        
        <script src="dist/slider/js/bootstrap-slider.js"></script> 
        <script src="vendor/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>        

        <script language="javascript">
            $(document).ready(function () {

                $('.slider').slider({
                    max: 100000,
                    step: 1.00,
                    handle: 'triangle'
                });

                $("#comboEstado").change(function () {
                    $.getJSON('ajax/cidades.php', {id: $(this).val(), ajax: 'true'}, function (j) {
                        var options = '<option value="">Selecione uma Cidade</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].descricao + '</option>';
                        }
                        $('#comboCidade').html(options).show();
                        $("#comboCidade").selectpicker('refresh');
                    });

                });

                $("#submit").click(function () {
                    $("#form").validate({
                        errorClass: "erro-class"
                    });
                    if ($("#form").valid()) {
                        $("#form").submit(function (e) {
                            e.preventDefault();
                            $.ajax({
                                url: "../ajax/addImovel.php",
                                method: "POST",
                                data: $("#form").serialize()
                            }).done(function () {
                                toastr.success("Imóvel cadastrado!");
                                // TODO
                            })
                        });
                    }
                });

                $('.combobox').combobox();


            })
        </script>

    </body>
</html>
