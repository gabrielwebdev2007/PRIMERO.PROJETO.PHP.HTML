<?php
//atributos
class Fornecedor {
    private $nomeFantasia;
    private $cnpj;
    private $contato;
    private $prazoEntrega;
//métado construtor
    public function __construct($nome, $cnpj, $contato, $prazo) {
        $this->nomeFantasia = $nome;
        $this->cnpj = $cnpj;
        $this->contato = $contato;
        $this->prazoEntrega = $prazo;
    }
//métado exibirDaDos
    public function exibirDados() {
        return "<h3>Dados do Fornecedor</h3>" .
               "<strong>Nome:</strong> {$this->nomeFantasia}<br>" .
               "<strong>CNPJ:</strong> {$this->cnpj}<br>" .
               "<strong>Contato:</strong> {$this->contato}<br>" .
               "<strong>Prazo:</strong> {$this->prazoEntrega} dias";
    }
}
//atributos
class Produto {
    private $nome;
    private $marca;
    private $categoria;
    private $preco;
//métado construtor
    public function __construct($nome, $marca, $categoria, $preco) {
        $this->nome = $nome;
        $this->marca = $marca;
        $this->categoria = $categoria;
        $this->preco = (float)$preco;
    }
//métado exibirDaDos
    public function exibirInformacoes() {
        $precoFormatado = number_format($this->preco, 2, ',', '.');
        return "<h3>Dados do Produto</h3>" .
               "<strong>Produto:</strong> {$this->nome}<br>" .
               "<strong>Marca:</strong> {$this->marca}<br>" .
               "<strong>Categoria:</strong> {$this->categoria}<br>" .
               "<strong>Preço:</strong> R$ {$precoFormatado}";
    }
}
//atributos
class Cliente {
    private $nome;
    private $email;
//métado construtor
    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }
//métado exibirDaDos
    public function exibirDados() {
        return "<h3>Dados do Cliente</h3>" .
               "<strong>Nome:</strong> {$this->nome}<br>" .
               "<strong>Email:</strong> {$this->email}";
    }
}
//atributos
class Venda {
    private $idVenda;
    private $cliente;
//métado construtor
    public function __construct($id, $cliente) {
        $this->idVenda = $id;
        $this->cliente = $cliente;
    }
//métado exibirDaDos
    public function exibirDados() {
        return "<h3>Resumo da Venda</h3>" .
               "<strong>ID da Venda:</strong> {$this->idVenda}<br>" .
               "<strong>Cliente:</strong> {$this->cliente}";
    }
}
//objeto
echo "<div style='font-family: Arial; padding: 20px; border: 1px solid #ccc; background: #e9ecef;'>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica qual formulário foi enviado com base nos campos preenchidos
    if (!empty($_POST['nomeFantasia'])) {
        $obj = new Fornecedor($_POST['nomeFantasia'], $_POST['cnpj'], $_POST['contato'], $_POST['prazoEntrega']);
        echo $obj->exibirDados();
 } elseif (!empty($_POST['nomeProduto'])) {
        $obj = new Produto($_POST['nomeProduto'], $_POST['marca'], $_POST['categoria'], $_POST['preco']);
        echo $obj->exibirInformacoes();
 } elseif (!empty($_POST['nomeCliente'])) {
        $obj = new Cliente($_POST['nomeCliente'], $_POST['emailCliente']);
        echo $obj->exibirDados();
} elseif (!empty($_POST['idVenda'])) {
        $obj = new Venda($_POST['idVenda'], $_POST['clienteNome']);
        echo $obj->exibirDados();
} else {
        echo "Nenhum dado válido recebido.";
    }
} else {
    echo "Aguardando envio de formulário...";
}
echo "<br><br><a href='html.html'>Voltar</a></div>";
?>