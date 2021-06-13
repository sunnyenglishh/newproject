<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body { 
  font-size: 140%; 
}

h2 {
  text-align: center;
  padding: 20px 0;
  text-decoration: ctype_upper;
}

table caption {
	padding: .5em 0;
}
th{
    width: 600px;
}
tb{
    height: 20px;

}

/* table.dataTable 
 {
 
  padding-left: auto;
  margin:auto;
} */

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}</style>
</head>
<body>

<h2>COMPANY LIST</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
       
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>logo</th>
            <th>Website</th>
          </tr>
        </thead>
        <tbody>   

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
            <tr>
               <td><?php echo e($company->id); ?></td>
               <td><?php echo e($company->Name); ?></td>
               <td><?php echo e($company->email); ?></td>
               <td> <img src="<?php echo e($company->logo); ?>"  height="75" width="90" alt=""> </td>
               <td><?php echo e($company->website); ?></td>
               </tr>
               
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

         
        </tbody>
        <tfoot>
          <tr>
           
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
   
</body>
</html>


<script>$('#myTable').DataTable( {
    responsive: true
} );</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\newproject\resources\views/home.blade.php ENDPATH**/ ?>