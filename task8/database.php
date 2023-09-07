<?Php
session_start();
$contanier  =   new PDO('mysql:host=localhost;dbname=php', 'root', '');
if (isset($_GET['user_id']) && (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != $_GET['user_id'])) {
    deleteUser($contanier, $_GET['user_id']);
    $_SESSION['user_id'] = $_GET['user_id'];
}
$users = getUsers($contanier);
require('./users.php');
function getUsers($contanier) {
    $sqlFile = $contanier->query('SELECT * FROM users');
    return  $sqlFile->fetchAll(PDO::FETCH_ASSOC);
}
function deleteUser($contanier, $id) {
    $sqlFile =  $contanier->prepare("DELETE FROM users where id = $id");
    return $sqlFile->execute();
}
