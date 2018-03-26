        <!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <img src="../../gomo.jpg" class="img-rounded" alt="Gomo Learning"> 
  <h2>Product feedback</h2>
  <p>At gomo, we are continually working to enhance our product suite and welcome all customer feedback to help us prioritise and improve the features and functionality available with the gomo solution</p>                                                                                      
           
       <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>Date[v]</th>
        <th>Name</th>
        <th>Email Address</th>
        <th>Nature of feedback</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($feedbacks as $feedback){
      ?>
      <tr>
         <td><?php echo date_format($feedback->created_at,'d/m/y'); ?></td>
        <td><?php echo ucfirst($feedback->first_name) .' '.ucfirst($feedback->last_name); ?></td>
        <td><?php echo $feedback->email; ?></td>
        <td><?php
          switch($feedback->feedback_nature){
            case 1: echo 'Feature request';break;
            case 2: echo 'General feedback';break;
            case 3: echo 'Bug';break;
          }
          ?></td>
        <td><?php echo $feedback->details; ?></td>
      </tr>
      <?php }
       ?>
      
    </tbody>
  </table>
   {!! BootForm::open(['store' => 'FeedbackController@export','method'=>'post','route'=>'feedbackexport']); !!} 
        
       
        {!! BootForm::submit('Export');!!}
      
        {!!  BootForm::close(); !!}
  </div>
</div>

</body>
</html>

       




      
     