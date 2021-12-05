<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Ficha de empresa</title>
</head>
<table class="table table-hover">
<thead>
  <tr>
    <th colspan="4">Ficha de empresa</th>
    <th>Código: 101010101010</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td rowspan="5">Logo</td>
    <td>Nombre</td>
    <td colspan="3">{{$company->name}}</td>
  </tr>
  <tr>
    <td>Dirección</td>
    <td colspan="3">{{$company->address}}</td>
  </tr>
  <tr>
    <td>Población</td>
    <td>{{$company->city}}</td>
    <td>CIF/NIF</td>
    <td>{{$company->cif}}</td>
  </tr>
  <tr>
    <td colspan="2">Persona de Contacto: </td>
    <td colspan="2">Cargo: Gerente</td>
  </tr>
  <tr>
    <td colspan="2">Correo electrónico: {{$company->email}}</td>
    <td colspan="2">Teléfono: {{$company->phone}}</td>
  </tr>
  <tr>
    <td colspan="5">Plazo de entrega: {{$delivery_term->description}} &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      Descuentos: {{$discount->name}}<br>Portes: {{$transport->price}}<br>Condiciones de pago: {{$payment_terms->description}}<br>Entidad bancaria: {{$bank_entity->name}}</td>
  </tr>
</tbody>
</table>
</body>
</html>