<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção com Pesquisa</title>
    
    <!-- Importação do jQuery e Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>
        /* Definição do estilo básico da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        h3 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #fff;
            color: #333;
            margin-bottom: 20px;
        }

        select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .select2-container--default .select2-selection--single {
            height: 46px;  /* Ajusta a altura do campo */
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 0 12px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 46px;
        }

        /* Estilo para o botão de pesquisa */
        .info-text {
            font-size: 14px;
            color: #888;
            text-align: center;
        }

        .info-text a {
            color: #4CAF50;
            text-decoration: none;
        }

        .info-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Escolha uma opção</h3>
        
        <!-- Campo de pesquisa -->
        <input type="text" id="search" placeholder="Pesquise uma opção..." autocomplete="off">
        
        <!-- Select para exibir os resultados -->
        <select id="selectOptions">
            <option value="">Selecione...</option>
        </select>
        
        <!-- Texto informativo -->
        <div class="info-text">
            <p>Digite algo para buscar opções.</p>
        </div>
    </div>
    
    <script>
        // Inicializando o select2 para estilo de pesquisa
        $(document).ready(function() {
            $('#selectOptions').select2();

            // Função de pesquisa AJAX
            $('#search').on('keyup', function() {
                var query = $(this).val();

                if (query.length > 2) {
                    // Realiza a requisição AJAX para buscar as opções no servidor
                    $.ajax({
                        url: 'buscar.php',  // Arquivo PHP que vai buscar os dados no banco
                        method: 'GET',
                        data: { query: query },
                        success: function(data) {
                            var options = JSON.parse(data);  // Espera-se que os dados venham em formato JSON
                            $('#selectOptions').empty();  // Limpa as opções existentes
                            $('#selectOptions').append('<option value="">Selecione...</option>');  // Coloca a opção inicial
                            
                            // Adiciona as novas opções
                            options.forEach(function(option) {
                                $('#selectOptions').append('<option value="' + option.id + '">' + option.login + '</option>');
                            });
                            
                            // Reinicia o Select2 para aplicar as novas opções
                            $('#selectOptions').trigger('change');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
