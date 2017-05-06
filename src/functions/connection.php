<?php 

function connection()
{
	return new \PDO('mysql:dbname=SEU_BANCO;host=SEU_HOST', 'SEU_USER', 'SUA_SENHA');
}