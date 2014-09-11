<?php
//http://pooform.dev:8080/
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Configurando o autoload
define('CLASS_DIR','../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$di = require '../scripts/instance.php';
$di->set('label',new \FABIANO\Form\Tipo\Label());
$di->set('text',new \FABIANO\Form\Tipo\Text());
$di->set('textarea',new \FABIANO\Form\Tipo\TextArea());
$di->set('radio',new \FABIANO\Form\Tipo\Radio());
$di->set('select',new \FABIANO\Form\Tipo\Select());
$di->set('submit',new \FABIANO\Form\Tipo\Submit());
$di->set('resetform',new \FABIANO\Form\Tipo\ResetForm());
$di->set('request',new \FABIANO\Form\Request());
$di->set('validator',new \FABIANO\Form\Validator());



$form = new \FABIANO\Form\GeraForm($di);

$form->setAction('mailto:teste@teste.com');
$form->setMetodo('GET');

//print_r($form->getDi()->get('label'));

$form->createField($form->getDi()->get('label')->setLabel('Nome')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($form->getDi()->get('text')->setId('nome')->setType('text')->setName('nome')->setRequired(true)->setPlaceholder('Nome'));
$form->createField($form->getDi()->get('label')->setLabel('Email')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('text')->setId('email')->setType('text')->setName('email')->setRequired(true)->setPlaceholder('Email'));

/*


$form->createField($di->get('label')->setLabel('Mensagem')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('textarea')->setValue(''));
$form->createField($di->get('label')->setLabel('Sexo')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('radio')->setType('radio')->setName('sexo')->setValue('Masculino')->setChecked(true));
$form->createField($di->get('radio')->setType('radio')->setName('sexo')->setValue('Feminino'));
$form->createField($di->get('label')->setLabel('Estados')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('select')->setOption(array("pr" => "Parana", "sc" => "Santa Catarina"))->setSelected('')->setName('Estados'));
//$form->createField($di->get('label')->setLabel('Informativo')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('radio')->setType('checkbox')->setName('info')->setValue('Receber informativo em seu e-mail')->setChecked(true));
$form->createField($di->get('submit')->setType('submit')->setValue('Enviar formulário')->setStyle('display:block; clear:both; margin:10px 0 0 0'));
$form->createField($di->get('resetform')->setType('reset')->setValue('Apagar')->setStyle('display:block; clear:both; margin:10px 0 0 0'));*/

$form->render();
