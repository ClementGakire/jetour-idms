@extends('layouts.app')

@if(Auth::user()->id == 1 || strpos(Auth::user()->role_id, 'Roadmap Deployment') !== false)
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Roadmap</title>

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700"
      rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="./invoice1.css" />
    <style>
      body{
        font-size: 18px !important;
        zoom: 130%;
      }
      .table,
      thead,
      tbody,
      td,
      th,
      tr {
            border: 1px solid #4c4c4c;
          }
    </style>
  </head>
  <body style="padding-top:80px;" onload="window.print()">
    <section class="back">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="invoice-wrapper">
              <div class="invoice-bottom">
                <div class="row py-4">
                  <div class="col-xs-6">
                   <img src=" {{asset('images/Logo.png')}}" width="250">
                  </div>
                  <div class="col-xs-6">
                    <h1>PREMIER TRANSPORT SERVICES</h1>
                    <hr>
                  </div>
								</div>
                <div class="row py-4">
                  <div class="col-xs-6">
                   
                    <h4><b>Roadmap Number: OPNS 2021/00..................</b></h4>
                  </div>
                </div>
                <div class="row py-4">
                  <div class="col-xs-12">
                    <h3 class="text-center"><b>ROADMAP/FEUILLE DE ROUTE</b></h3>
                    <h3 class="text-center"><b>URUPAPURO RURANGA IMIKORESHEREZE Y'IMODOKA</b></h3>
                  </div>
                </div>
                <div class="row py-4">
                  <div class="col-xs-6">
                    <h3><b>Number of Days/Iminsi imodoka yakoze:........ </b></h3>
                  </div>
                </div>
                <div class="row justify-content-between py-4">
                  <div class="col-xs-6">
                    <h3><b>Amatariki yo gutangira ............./............./2021</b></h3>
                  </div>
                  <div class="col-xs-6 ">
                    <h3 class="text-right"><b> Amatariki yo gusoza ............./............./2021 </b></h3>
                  </div>
                </div>
                <div class="row justify-content-between py-4">
                  <div class="col-xs-4">
                    <h3><b>Ikigo agiyemo</b></h3>
                    <br>
                    <hr class="text-dark">
                  </div>
                  <div class="col-xs-4">
                    <h3 class="text-center"><b> Urwego </b></h3>
                    <br>
                    <hr>
                  </div>
                   <div class="col-xs-4">
                    <h3 class="text-right"><b> Plate No </b></h3>
                    <br>
                    <hr>
                  </div>
                </div>
                  <div class="col-md-12 col-sm-12 py-4">
                    <div class="">
                      <table class="table py-4 border border-dark" height="800" bordercolor="#ff00ff">
                        <thead>
                          <tr>
                            <td class="align-middle"><b>
                              N<sup><u>o</u></sup>
                            </b></td>
                            <td><b>Itariki</b><span></span><span></span><span></span><span></span></td>
                            <td><b>Aho Agiye</b><span></span><span></span><span></span><span></span></td>
                            <td><b>Isaha yo<br />Gutangira</b></td>
                            <td><b>Isaha yo<br />Gusoza</b></td>

                            <td><b>Umukono</b></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><h3>1</h3></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr style="height: 40px"></tr>
                        </tbody>
                      </table>
                      <br>
                      <br>
                      <h4><b>UMUKONO N'AMAZINA Y'UMUSHOFERI/TEL ..................................................................................................................................................</b></h4><br><br>
                      <h4><b>UMUKONO N'AMAZINA Y'UHAGARARIYE UBUTUMWA/TEL .....................................................................................................................</b></h4><br><br>
                      <h4><b>UMUKONO N'AMAZINA Y'UMUKOZI WA PTS ...................................................................................................................................................</b></h4>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- jquery slim version 3.2.1 minified -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
      crossorigin="anonymous"
    ></script>

    <!-- Latest compiled and minified JavaScript -->
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

@endif
