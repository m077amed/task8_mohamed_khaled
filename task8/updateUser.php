<?php
require('./connection.php');
$user = getUserDetails($contanier, $id);
function getUserDetails($contanier, $id) {
    return  $sqlFile = $contanier->query("SELECT * FROM users WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
}
function getUsers($contanier){
    $sqlFile = $contanier->query('SELECT * FROM users');
    return  $sqlFile->fetchAll(PDO::FETCH_ASSOC);
}
var_dump($user);
?>
<form action="">
    <input type="text" name="name" value="<?= $user['name']; ?>">
    <input type="text" name="email" value="<?= $user['email']; ?>">
    <input type="text" name="gender" value="<?= $user['gender']; ?>">
    <input type="text" name="salary" value="<?= $user['salary']; ?>">
    <button>save</button>
</form>