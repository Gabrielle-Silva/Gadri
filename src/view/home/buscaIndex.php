<form action="get">
    <select name="finalidade" id="finalidade">
        <option value="finalidade">Finalidade</option>
        <option value="compra">Compra</option>
        <option value="locacao">Locação</option>
    </select>
    <select name="tipo" id="tipo">
        <option value="tipo">Tipo</option>
        <option value="apartamento">Apartamento</option>
        <option value="casa">Casa</option>
        <option value="terreno">Terreno</option>
    </select>
    <input type="text" placeholder="O que deseja encontrar">
    <button type="button" onclick="window.location.href = '/src/view/painel/painelBuscaImoveis.php'">BUSCAR</button>
</form>