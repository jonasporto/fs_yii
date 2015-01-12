<?php 

echo "<h3> Estabelecimento </h3>";
echo $estabelecimento->id.'<br/>';
echo $estabelecimento->nome.'<br/>';
echo $estabelecimento->descricao.'<br/><br/>';
echo "<hr/>";

echo "<h3> Emails </h3>";
foreach ($estabelecimento->emails as $email) {
	echo $email->id.'<br/>';
	echo $email->endereco.'<br/><br/>';

}
echo "<hr/>";

echo "<h3> Telefone </h3>";
foreach ($estabelecimento->enderecos as $endereco) {
	echo $endereco->id.'<br/>';
	echo $endereco->logradouro.'<br/>';
	echo $endereco->complemento.'<br/>';
	echo $endereco->cep.'<br/>';
	echo $endereco->numero.'<br/>';
	echo $endereco->cidade.'<br/>';
	echo $endereco->estado.'<br/><br/>';

}
echo "<hr/>";


?>