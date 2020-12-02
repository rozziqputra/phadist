<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>

<table class="table table-bordered">
  <thead>
    <tr>
      <tr>
      <th>No</th>
      <th>Barang</th>
      <th>Harga</th>
      <th>jumlah</th>
      <th>Kasir</th>
      <th>Waktu</th>
    </tr>
    </tr>
  </thead>
  <tbody>
<?php $no=1;?>
<?php foreach ($this->cart->contents() as $m):?>
 <tr>
   <td><?=$no;?></td>
   <td><?=$m['name']?></td>
   <td><?=$m['price']?></td>
   <td><?=$m['qty']?></td>
   <td><?=$m['id_user']?></td>
   <td><?=$m['date']?></td>
 </tr>
  <tr class="bg-secondary text-white">
        <th colspan="5">Total Belanja</th>
        <th colspan="2">Rp<?=number_format($this->cart->total())?></th>
  </tr>
<?php $no++;?>
<?php endforeach ;?>

  </tbody>
</table>

</body>
</html>

<?php
var_dump($id);

?>

 