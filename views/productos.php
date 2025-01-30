<?php
// productos.php

header('Content-Type: application/json');

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "creativepagina");
if ($mysqli->connect_error) {
    echo json_encode(["success" => false, "error" => "Error de conexión a la base de datos."]);
    exit;
}

// Obtener parámetros del POST
$filter = json_decode($_POST['filter'] ?? '{}', true);
$page = intval($_POST['page'] ?? 1);

// Parámetros para el filtrado de precios
$whereClauses = [];
if (!empty($filter['price'])) {
    $priceConditions = [];
    foreach ($filter['price'] as $range) {
        list($min, $max) = explode('-', $range);
        $priceConditions[] = "(precio >= $min AND precio AND precio_descuento <= $max)";
    }
    $whereClauses[] = '(' . implode(' OR ', $priceConditions) . ')';
}

// Construir cláusula WHERE
$where = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Configuración de la paginación
$itemsPerPage = 10;
$offset = ($page - 1) * $itemsPerPage;

// Obtener total de productos
$totalQuery = "SELECT COUNT(*) as total FROM productos $where";
$totalResult = $mysqli->query($totalQuery);
$total = $totalResult->fetch_assoc()['total'];

// Obtener productos con el filtro y la paginación
$query = "SELECT productos.id_producto, nombre, precio, precio_descuento, fotos_producto.foto_protada FROM productos INNER JOIN fotos_producto ON productos.id_producto = fotos_producto.id_producto $where LIMIT $offset, $itemsPerPage";
$result = $mysqli->query($query);

$products = [];
while ($row = $result->fetch_assoc()) {
    $row['foto_protada'] = str_replace('\\', '/', $row['foto_protada']);
    $products[] = $row;
}

// Calcular datos de paginación
$totalPages = ceil($total / $itemsPerPage);
$pagination = [
    "currentPage" => $page,
    "previousPage" => $page > 1 ? $page - 1 : null,
    "nextPage" => $page < $totalPages ? $page + 1 : null,
    "pages" => []
];
for ($i = 1; $i <= $totalPages; $i++) {
    $pagination['pages'][] = [
        "number" => $i,
        "active" => $i === $page
    ];
}

// Respuesta JSON
echo json_encode([
    "success" => true,
    "products" => $products,
    "pagination" => $pagination
]);

$mysqli->close();
