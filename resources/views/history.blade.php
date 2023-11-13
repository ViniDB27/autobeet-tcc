<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
</head>
<body>
    <nav class="nav-extended white" style="padding: 0 30px">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo black-text text-darken-2">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text text-darken-2"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html" class="black-text text-darken-2" >Diagnóstico</a></li>
                <li><a href="badges.html" class="black-text text-darken-2" >Histórico</a></li>
                <li><a href="collapsible.html" class="black-text text-darken-2" >Meus Dados</a></li>
                <li><a href="collapsible.html" class="black-text text-darken-2" >Relatório</a></li>
                <li><a href="collapsible.html" class="black-text text-darken-2" >Sobre</a></li>
            </ul>
        </div>
    </nav>

    <!-- Modal Structure -->
    <form id="modal-file-upload" class="modal" action="{{ route('history.store')  }}" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <h4>Envie o arquivo do novo diagnóstico</h4>
            <div class="file-field input-field">
                @csrf
                <div class="btn blue">
                    <span>Arquivo</span>
                    <input type="file" name="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Envie seu arquivo">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat blue white-text">Enviar</button>
        </div>
    </form>

    <div class="container center-align" style="min-height: 600px; margin-top: 100px;" >
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data e Hora</th>
                    <th>CategoriaX</th>
                    <th>CategoriaY</th>
                    <th>Ritmo</th>
                    <th>Certeza</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>01/01/2023</td>
                    <td>cat x</td>
                    <td>cat y</td>
                    <td>ritmo z</td>
                    <td>75%</td>
                    <td><span class="btn light-green darken-2">Correto</span></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>01/01/2023</td>
                    <td>cat x</td>
                    <td>cat y</td>
                    <td>ritmo z</td>
                    <td>75%</td>
                    <td><span class="btn light-green darken-2">Correto</span></td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>01/01/2023</td>
                    <td>cat x</td>
                    <td>cat y</td>
                    <td>ritmo z</td>
                    <td>75%</td>
                    <td><span class="btn light-green darken-2">Correto</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container right-align" style="margin-top: 20px;">
        <button id="btn-modal-file-upload" class="waves-effect waves-light btn btn-large modal-trigger blue">Novo Diagnóstico</button>
    </div>

    <footer class="page-footer white">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="black-text text-darken-2">Footer Content</h5>
                    <p class="grey-text text-darken-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="black-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-darken-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-darken-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-darken-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-darken-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright black">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal-file-upload');
            const buttonModal = document.getElementById('btn-modal-file-upload');
            const instance = M.Modal.init(modal);


            buttonModal.addEventListener('click',(e) => {
                instance.open()
            });

        });
    </script>
</body>
</html>
