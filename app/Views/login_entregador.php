  <style>
    .form-container {
  background-color: rgba(255, 255, 255, 0.8); /* Define a cor de fundo com transparência */
  padding: 20px;
  margin-top: 20px;
  border-radius: 10px; /* Arredonda as bordas */
}

  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="form-container">
          <h2>Tela de Entregador</h2>
          <form id="login-form">
            <div class="form-group">
              <label for="username">Usuário:</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="userType" value="entregador" required checked style="display:none;"></label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#login-form').submit(function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        var formData = $(this).serialize(); // Obtém os dados do formulário
        $('#loading-overlay').show();
        $.ajax({
          url: '<?= base_url('enter') ?>', // Altere o caminho para a página que receberá os dados
          type: 'POST',
          data: formData,
          success: function(response) {
        $('#loading-overlay').hide();

            // Processa a resposta da página
            if (response == 'logado-B'){
            window.location.href = "<?= base_url('central/painel')?>";
            return;
            }else if(response == 'logado-E'){
            window.location.href = "<?= base_url('entregador')?>";

            }else{
            alert(response);}
          },
          error: function(jqXHR, textStatus, errorThrown) {
        $('#loading-overlay').hide();

        // Imprime o erro no console
        console.error("Status:", jqXHR.status);
        console.error("Erro do servidor:", jqXHR.responseText);
        alert('Ocorreu um erro durante a solicitação ao servidor.');
      }
        });
      });
    });
  </script>
