<?php include("includes/connect.php") ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Bootstrap Admin Theme</title>

        <!-- Imports -->
        <?php include("includes/links.php") ?>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include("includes/navbar.php") ?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="col col-lg-12">
                            <h1 class="page-header">Cadastrar Imóvel</h1>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <label for="sel1">Finalidade:</label>
                            <select class="form-control" id="sel1">
                                <?php
                                $result = mysqli_query($conexao, "SELECT descricao FROM finalidade");
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                    echo "<option>$row[0]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="col col-lg-6 col-md-12 col-sm-12">
                            <label for="sel1">Tipo:</label>
                            <select class="form-control" id="sel1">
                                <?php
                                $result = mysqli_query($conexao, "SELECT descricao FROM tipo");
                                while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
                                    echo "<option>$row[0]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Título:</label>
                            <input class="form-control" name="titulo" placeholder="Insira um título">
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Descrição:</label>
                            <textarea class="form-control" name="descricao" placeholder="Descreva o imóvel"></textarea>
                        </div>

                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Estado:</label>
                            <select class="form-control" id="estado">
                                <option value="0">Selecione um Estado</option>
                                <?php
                                $result = mysqli_query($conexao, "SELECT id, nome FROM estados");
                                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Cidade:</label>
                            <select class="form-control" id="cidade">
                                <option value="0">Selecione uma Cidade</option>
                                <!-- Ajax -->
                            </select>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Endereço:</label>
                            <input id="endereco" class="form-control" name="endereco" placeholder="Informe o endereço">
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <div id="map" style="width: 100%; height: 300px"></div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Referência:</label>
                            <input class="form-control" name="referencia" placeholder="Informe uma referencia">
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <br>
                            <label for="sel1">Valor R$:</label>
                            <input class="form-control" value="0.00" type="number" step="0.01" name="valor" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Imports -->
        <?php include("includes/imports.php") ?>

        <script>
            $(document).ready(function () {
                $("#estado").change(function () {
                    $.getJSON('../sql/cidades.php', {id: $(this).val(), ajax: 'true'}, function (j) {
                        var options = '<option value="0">Selecione uma Cidade</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].descricao + '</option>';
                        }
                        $('#cidade').html(options).show();
                    });
                });

                $("#endereco").change(function () {
                    if ($(this).val() != "")
                        carregarNoMapa($("#endereco").val());

                });
            });


            function carregarNoMapa(endereco) {
                geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();

                            $('#endereco').val(results[0].formatted_address);

                            var location = new google.maps.LatLng(latitude, longitude);
                            marker.setPosition(location);
                            map.setCenter(location);
                            map.setZoom(16);
                        }
                    }
                });
            }

            var map;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 8
                });
                geocoder = new google.maps.Geocoder();
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                });
            }
        </script>

    </body>

</html>
