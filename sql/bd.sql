/* caso execute esse bloco para testar devemos alterar o arquivo
xampp/phpmyadmin/config.inc.php com o seguinte:

$cfg['Servers'][$i]['host'] = 'localhost';

$cfg['Servers'][$i]['user'] = 'root'; // substitua 'root' pelo seu nome de usuário, utilizamos no php > root

$cfg['Servers'][$i]['password'] = 'listafy123'; // substitua por sua senha, usamos no php > listafy123

$cfg['Servers'][$i]['AllowNoPassword'] = false; // defina como 'false' se você estiver usando uma senha

-----------------------------------------------------------------

ou apenas altere o seguinte bloco de código:

$cfg['Servers'][$i]['auth_type'] = 'http'; // substitua 'config' por 'http'

$cfg['Servers'][$i]['AllowNoPassword'] = false; // defina como 'false' se você estiver usando uma senha

-acesse o phpmyadmin pelo link: http://localhost/phpmyadmin/index.php

-insira o user 'root' e a senha 'listafy123' e clique em 'entrar'

 */

alter user 'root'@'localhost' identified by 'listafy123';
flush privileges;

/* -------------------------------------------------------- */

create database listafy;

use listafy;

create table usuarios (
    id_usuario int auto_increment primary key,
    email varchar(100) not null,
    senha varchar(100) not null
    nome varchar(100) not null,
);

create table todo (
    id_nota int auto_increment primary key,
    conteudo_nota varchar(100) not null,
    titulo_nota varchar(20) not null,
    data_criacao date not null,
    id_usuario int not null,
    foreign key (id_usuario) references usuarios(id_usuario)
);