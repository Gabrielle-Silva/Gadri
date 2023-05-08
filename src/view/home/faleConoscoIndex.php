<h2 class="faleconoscoTitle">FALE CONOSCO</h2>

<form id="fale-conosco" method="POST" action="/src/Controller/emailController.php" enctype="multipart/form-data">
    <input type="hidden" name="action" value="receber">
    <label for="nome">Nome</label><input type="text" id="nome" name="nome">
    <label for="email">Email</label><input type="text" id="email" name="email">
    <label for="assunto">Assunto</label><input type="text" id="assunto" name="assunto">
    <label for="mensagem">Mensagem</label><textarea type="text" id="mensagem" name="mensagem"></textarea>
    <button type="submit" id="enviar">Enviar</button>
</form>